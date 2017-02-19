<?php

class GitHubAPI
{
	const BASE_URI = 'https://api.github.com/';

	private static $instance = null;

	private $guzzle_client;

	private function __construct()
	{
		$this->guzzle_client = new GuzzleHttp\Client(['base_uri' => self::BASE_URI]);
	}

	public static function get()
	{
		if (is_null(self::$instance))
		{
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function getUserRepos($username)
	{
		$cache_key = 'github_repos_v1112';
		$repos = TempCache::get($cache_key);
		if (!is_null($repos))
		{
			return $repos;
		}
		$repos = array();
		try
		{
			$uri = self::BASE_URI . 'users/' . $username . '/repos';

			$headers = ['User-Agent', 'cajogos'];
			$query = ['client_id' => GITHUB_CLIENT_ID, 'client_secret' => GITHUB_CLIENT_SECRET, 'sort' => 'updated'];

			$response = $this->guzzle_client->get($uri, ['headers' => $headers, 'query' => $query]);
			$body = (string) $response->getBody();
			$json_data = json_decode($body);

			foreach ($json_data as $object)
			{
				$cur_repo = array();
				$cur_repo['name'] = $object->name;
				$cur_repo['full_name'] = $object->full_name;
				$cur_repo['owner'] = $object->owner->login;
				$cur_repo['repo_url'] = $object->html_url;
				$cur_repo['description'] = $object->description;
				$cur_repo['stars'] = $object->stargazers_count;
				$cur_repo['watchers'] = $object->watchers_count;
				$cur_repo['language'] = $object->language;
				$repos[] = $cur_repo;
			}
		}
		catch (Exception $e){}

		TempCache::put($cache_key, $repos, TempCache::TIME_HALF_HOUR);
		return $repos;
	}
}