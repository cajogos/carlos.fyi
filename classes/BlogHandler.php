<?php

class BlogHandler
{
	/**
	 * @var string
	 */
	private $files_location = null;

	/**
	 * @var string
	 */
	private $location_authors = null;

	/**
	 * @var string
	 */
	private $location_categories = null;

	/**
	 * @var string
	 */
	private $location_posts = null;

	/**
	 * @var string
	 */
	private $location_content = null;

	private function __construct()
	{
		$this->files_location = $_SERVER['DOCUMENT_ROOT'] . '/../blog/';
		$this->location_authors = $this->files_location . 'authors/';
		$this->location_categories = $this->files_location . 'categories/';
		$this->location_posts = $this->files_location . 'posts/';
		$this->location_content = $this->files_location . 'content/';
	}

	/**
	 * @var BlogHandler
	 */
	private static $instance = null;

	/**
	 * @return BlogHandler
	 */
	private static function get()
	{
		if (is_null(self::$instance))
		{
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * @param {string} $author_id
	 * @return array
	 * @throws BlogHandlerException
	 */
	private function get_author_data($author_id)
	{
		$json_file = "{$this->location_authors}{$author_id}.json";
		try
		{
			return $this->get_json_data($json_file);
		}
		catch (BlogHandlerException $e)
		{
		}
		throw new BlogHandlerException("Invalid author ID provided: $author_id", BlogHandlerException::ERROR_INVALID_AUTHOR_ID);
	}

	/**
	 * @param {string} $category_id
	 * @return array
	 * @throws BlogHandlerException
	 */
	private function get_category_data($category_id)
	{
		$json_file = "{$this->location_categories}{$category_id}.json";
		try
		{
			return $this->get_json_data($json_file);
		}
		catch (BlogHandlerException $e)
		{
		}
		throw new BlogHandlerException("Invalid category ID provided: $category_id", BlogHandlerException::ERROR_INVALID_CATEGORY_ID);
	}

	/**
	 * @param {string} $post_id
	 * @return array
	 * @throws BlogHandlerException
	 */
	private function get_post_data($post_id)
	{
		$json_file = "{$this->location_posts}{$post_id}.json";
		try
		{
			return $this->get_json_data($json_file);
		}
		catch (BlogHandlerException $e)
		{
		}
		throw new BlogHandlerException("Invalid post ID provided: $post_id", BlogHandlerException::ERROR_INVALID_POST_ID);
	}

	/**
	 * @param {string} $json_file
	 * @return array
	 * @throws BlogHandlerException
	 */
	private function get_json_data($json_file)
	{
		$json = @file_get_contents($json_file);
		$data = json_decode($json, true);
		if (empty($data))
		{
			throw new BlogHandlerException('Empty data retrieved from JSON file.', BlogHandlerException::ERROR_NO_JSON_DATA);
		}
		return $data;
	}

	/**
	 * @param {string} $post_id
	 * @return string
	 * @throws BlogHandlerException
	 */
	private function get_post_content($post_id)
	{
		$file_name = "{$this->location_content}{$post_id}.md";
		$contents = @file_get_contents($file_name);
		if (empty($contents))
		{
			throw new BlogHandlerException("Did not find .md file for $post_id!", BlogHandlerException::ERROR_NO_POST_CONTENT_FOUND);
		}
		return $contents;
	}

	/**
	 * @param {string} $author_id
	 * @return BlogAuthor
	 * @throws BlogHandlerException
	 */
	public static function getBlogAuthorById($author_id)
	{
		$handler = self::get();
		$author_data = $handler->get_author_data($author_id);
		return BlogAuthor::create($author_id, $author_data);
	}

	/**
	 * @param {string} $category_id
	 * @return BlogCategory
	 * @throws BlogHandlerException
	 */
	public static function getBlogCategoryById($category_id)
	{
		$handler = self::get();
		$category_data = $handler->get_category_data($category_id);
		return BlogCategory::create($category_id, $category_data);
	}

	/**
	 * @param {string} $post_id
	 * @return BlogPost
	 * @throws BlogHandlerException
	 */
	public static function getBlogPostById($post_id)
	{
		$handler = self::get();
		$post_data = $handler->get_post_data($post_id);
		return BlogPost::create($post_id, $post_data);
	}

	/**
	 * @param {string} $post_id
	 * @return string
	 * @throws BlogHandlerException
	 */
	public static function getPostContentById($post_id)
	{
		$handler = self::get();
		return $handler->get_post_content($post_id);
	}
}