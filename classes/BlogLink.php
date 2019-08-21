<?php

class BlogLink
{
	/**
	 * @return \Purl\Url
	 */
	private static function get_root_url()
	{
		$url = \Purl\Url::fromCurrent();
		$url->path = null;
		$url->path->add('blog');
		return $url;
	}

	/**
	 * @return string
	 */
	public static function getHomeURL()
	{
		$url = self::get_root_url();
		return $url->getUrl();
	}

	/**
	 * @param BlogPost $post
	 * @return string
	 */
	public static function getPostURL(BlogPost $post)
	{
		$url = self::get_root_url();
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