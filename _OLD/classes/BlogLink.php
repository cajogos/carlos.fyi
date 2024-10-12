<?php

use League\Uri\Components\HierarchicalPath;
use League\Uri\Exceptions\SyntaxError;
use League\Uri\Uri;

class BlogLink
{
	/**
	 * @param bool $live
	 * @return Uri
	 * @throws SyntaxError
	 */
	private static function get_root_url($live = false)
	{
		if ($live === true)
		{
			$url = Uri::new('https://carlos.fyi/blog');
			return $url;
		}
		else
		{
			$url = Uri::new("http://{$_SERVER['HTTP_HOST']}/blog");
			return $url;
		}
	}

	/**
	 * @param bool $live
	 * @return string
	 */
	public static function getHomeURL($live = false)
	{
		return (string) self::get_root_url($live);
	}

	/**
	 * @param bool $live
	 * @return string
	 */
	public static function getFeedURL($live = false)
	{
		$url = self::get_root_url($live);
		$url = $url->withPath(HierarchicalPath::fromUri($url)
			->append('feed'));
		return (string) $url;
	}

	/**
	 * @param BlogPost $post
	 * @param bool $live
	 * @return string
	 */
	public static function getPostURL(BlogPost $post, $live = false)
	{
		$url = self::get_root_url($live);
		$url = $url->withPath(HierarchicalPath::fromUri($url)
			->append($post->getID()));
		return (string) $url;
	}

	/**
	 * @param BlogCategory $category
	 * @return string
	 */
	public static function getCategoryURL(BlogCategory $category)
	{
		$url = self::get_root_url();
		$url = $url->withPath(HierarchicalPath::fromUri($url)
			->append('category')
			->append($category->getID()));
		return (string) $url;
	}

	/**
	 * @param BlogAuthor $author
	 * @return string
	 */
	public static function getAuthorURL(BlogAuthor $author)
	{
		$url = self::get_root_url();
		$url = $url->withPath(HierarchicalPath::fromUri($url)
			->append('author')
			->append($author->getID()));
		return (string) $url;
	}
}
