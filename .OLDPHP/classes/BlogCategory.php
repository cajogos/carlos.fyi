<?php

class BlogCategory
{
	/**
	 * @var string
	 */
	private $id = null;

	/**
	 * @var string
	 */
	private $page_title = null;

	/**
	 * @var string
	 */
	private $description = null;

	/**
	 * @var array
	 */
	private $featured_posts = array();

	private function __construct($category_id, $data)
	{
		$this->id = $category_id;
		$this->page_title = (string)$data['pageTitle'];
		$this->description = (string)$data['description'];
		$this->featured_posts = (array)$data['featuredPosts'];
	}

	/**
	 * @param {string} $category_id
	 * @param {array} $data
	 * @return BlogCategory
	 */
	public static function create($category_id, $data)
	{
		$instance = new self($category_id, $data);
		return $instance;
	}

	/**
	 * @return string
	 */
	public function getID()
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getPageTitle()
	{
		return $this->page_title;
	}

	/**
	 * @return string
	 */
	public function getURL()
	{
		return BlogLink::getCategoryURL($this);
	}
}