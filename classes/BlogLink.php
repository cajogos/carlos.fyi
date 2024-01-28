<?php

class BlogLink
{
	/**
	 * @param bool $live
	 * @return \Purl\Url
	 */
	private static function get_root_url($live = false)
	{
		if ($live === true)
		{
			$url = \Purl\Url::parse('https://carlos.fyi/blog');
			return $url;
		}
		else
		{
			$url = \Purl\Url::fromCurrent();
			$host = $_SERVER['HTTP_HOST'];
			if (strstr($host, ':') !== false)
			{
				$host = explode(':', $host, 2);
				$url->set('port', $host[1]);
			}

			$url->path = null;
			$url->path->add('blog');
			return $url;
		}
	}

	/**
	 * @param bool $live
	 * @return string
	 */
	public static function getHomeURL($live = false)
	{
		$url = self::get_root_url($live);
		return $url->getUrl();
	}

	/**
	 * @param bool $live
	 * @return string
	 */
	public static function getFeedURL($live = false)
	{
		$url = self::get_root_url($live);
		$url->path->add('feed');
		return $url->getUrl();
	}

	/**
	 * @param BlogPost $post
	 * @param bool $live
	 * @return string
	 */
	public static function getPostURL(BlogPost $post, $live = false)
	{
		$url = self::get_root_url($live);
		$url->path->add($post->getID());
		return $url->getUrl();
	}

	/**
	 * @param BlogCategory $category
	 * @return string
	 */
	public static function getCategoryURL(BlogCategory $category)
	{
		$url = self::get_root_url();
		$url->path->add('category')->add($category->getID());
		return $url->getUrl();
	}

	/**
	 * @param BlogAuthor $author
	 * @return string
	 */
	public static function getAuthorURL(BlogAuthor $author)
	{
		$url = self::get_root_url();
		$url->path->add('author')->add($author->getID());
		return $url->getUrl();
	}
}