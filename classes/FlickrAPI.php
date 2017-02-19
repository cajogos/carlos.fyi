<?php

class FlickrAPI
{
	const CACHE_KEY_VERSION = 'flickr_v001';
	const BASE_URI = 'https://api.flickr.com/services/rest/';
	const MAX_PHOTO_WIDTH = 2000;

	private $guzzle_client = null;

	public function __construct()
	{
		$this->guzzle_client = new GuzzleHttp\Client(['base_uri' => self::BASE_URI]);
	}

	public static function getRandomFromFavorites($username)
	{
		// Get user information from username
		$user = self::findByUsername($username);
		// Get the user's favourite lists
		$favorites = self::getPublicFavouritesList($user->nsid);
		// Get a random photo from given
		$photos = $favorites->photo;
		$chosen_photo = $photos[mt_rand(0, count($photos) - 1)];
		// Get photo's owner information
		$user_info = self::getUserInfo($chosen_photo->owner);
		// Get photo sizes
		$photo_sizes = self::getPhotoSizes($chosen_photo->id);
		// Work out the widest (biggest) image
		$img_src = $photo_showcase_url = '';
		$widest = 0;
		foreach ($photo_sizes->size as $photo)
		{
			if ($photo->width > $widest)
			{
				if ($photo->width >= self::MAX_PHOTO_WIDTH)
				{
					break;
				}
				$photo_showcase_url = $photo->url;
				$img_src = $photo->source;
				$widest = $photo->width;
			}
		}
		// Build the result
		$result = array();
		$result['photo_title'] = $chosen_photo->title;
		$result['photo_src'] = $img_src;
		$result['photo_showcase'] = $photo_showcase_url;
		$result['owner_username'] = $user_info->username->_content;
		$real_name = isset($user_info->realname) ? $user_info->realname->_content : null;
		$result['owner_realname'] = $real_name;
		$result['url_photos'] = $user_info->photosurl->_content;
		$result['url_profile'] = $user_info->profileurl->_content;
		return $result;
	}

	public static function getPhotoSizes($photo_id)
	{
		// https://www.flickr.com/services/api/flickr.photos.getSizes.html
		// api_key (Required) - Your API application key. See here for more details.
		// photo_id (Required) - The id of the photo to fetch size information for.
		$cache_key = self::CACHE_KEY_VERSION . '_photosizes_' . $photo_id;
		$sizes = TempCache::get($cache_key);
		if (!is_null($sizes))
		{
			return $sizes;
		}
		$instance = new self();
		$query = array();
		$query['api_key'] = FLICKR_API_KEY;
		$query['method'] = 'flickr.photos.getSizes';
		$query['format'] = 'json';
		$query['nojsoncallback'] = 1;
		$query['photo_id'] = $photo_id;
		$response = $instance->guzzle_client->get(self::BASE_URI, ['query' => $query]);
		$body = (string) $response->getBody();
		$json_data = json_decode($body);
		$sizes = $json_data->sizes;
		TempCache::put($cache_key, $sizes, TempCache::TIME_1_DAY);
		return $sizes;
	}

	public static function getPublicFavouritesList($user_id)
	{
		// https://www.flickr.com/services/api/flickr.favorites.getPublicList.html
		// api_key (Required) - Your API application key. See here for more details.
		// user_id (Required) - The user to fetch the favorites list for.
		// min_fave_date (Optional) - Minimum date that a photo was favorited on. The date should be in the form of a unix timestamp.
		// max_fave_date (Optional) - Maximum date that a photo was favorited on. The date should be in the form of a unix timestamp.
		// extras (Optional) - A comma-delimited list of extra information to fetch for each returned record. Currently supported fields are: description, license, date_upload, date_taken, owner_name, icon_server, original_format, last_update, geo, tags, machine_tags, o_dims, views, media, path_alias, url_sq, url_t, url_s, url_q, url_m, url_n, url_z, url_c, url_l, url_o
		// per_page (Optional) - Number of photos to return per page. If this argument is omitted, it defaults to 100. The maximum allowed value is 500.
		// page (Optional) - The page of results to return. If this argument is omitted, it defaults to 1.
		$cache_key = self::CACHE_KEY_VERSION . '_pubfavs_' . $user_id;
		$photos = TempCache::get($cache_key);
		if (!is_null($photos))
		{
			return $photos;
		}
		$instance = new self();
		$query = array();
		$query['api_key'] = FLICKR_API_KEY;
		$query['method'] = 'flickr.favorites.getPublicList';
		$query['format'] = 'json';
		$query['nojsoncallback'] = 1;
		$query['user_id'] = $user_id;
		$response = $instance->guzzle_client->get(self::BASE_URI, ['query' => $query]);
		$body = (string) $response->getBody();
		$json_data = json_decode($body);
		$photos = $json_data->photos;
		TempCache::put($cache_key, $photos, TempCache::TIME_5_MIN);
		return $photos;
	}

	public static function getUserInfo($user_id)
	{
		// https://www.flickr.com/services/api/flickr.people.getInfo.html
		// api_key (Required) - Your API application key. See here for more details.
		// user_id (Required) - The NSID of the user to fetch information about.
		$cache_key = self::CACHE_KEY_VERSION . '_userinfo_' . $user_id;
		$person = TempCache::get($cache_key);
		if (!is_null($person))
		{
			return $person;
		}
		$instance = new self();
		$query = array();
		$query['api_key'] = FLICKR_API_KEY;
		$query['method'] = 'flickr.people.getInfo';
		$query['format'] = 'json';
		$query['nojsoncallback'] = 1;
		$query['user_id'] = $user_id;
		$response = $instance->guzzle_client->get(self::BASE_URI, ['query' => $query]);
		$body = (string) $response->getBody();
		$json_data = json_decode($body);
		$person = $json_data->person;
		TempCache::put($cache_key, $person, TempCache::TIME_1_WEEK);
		return $person;
	}

	public static function findByUsername($username)
	{
		// https://www.flickr.com/services/api/flickr.people.findByUsername.html
		// api_key (Required) - Your API application key. See here for more details.
		// username (Required) - The username of the user to lookup.
		$cache_key = self::CACHE_KEY_VERSION . '_username_' . $username;
		$user_data = TempCache::get($cache_key);
		if (!is_null($user_data))
		{
			return $user_data;
		}
		$instance = new self();
		$query = array();
		$query['api_key'] = FLICKR_API_KEY;
		$query['method'] = 'flickr.people.findByUsername';
		$query['format'] = 'json';
		$query['nojsoncallback'] = 1;
		$query['username'] = $username;
		$response = $instance->guzzle_client->get(self::BASE_URI, ['query' => $query]);
		$body = (string) $response->getBody();
		$json_data = json_decode($body);
		$user_data = $json_data->user;
		TempCache::put($cache_key, $user_data, TempCache::TIME_1_WEEK);
		return $user_data;
	}
}