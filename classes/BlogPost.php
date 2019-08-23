<?php

class BlogPost
{
	/**
	 * @var string
	 */
	private $id = null;

	/**
	 * @var string
	 */
	private $headline = null;

	/**
	 * @var string
	 */
	private $description = null;

	/**
	 * @var string
	 */
	private $author = null;

	/**
	 * @var string
	 */
	private $featured_image = null;

	/**
	 * @var array
	 */
	private $categories = array();

	/**
	 * @var string
	 */
	private $date_published = null;

	/**
	 * @var string
	 */
	private $date_updated = null;

	/**
	 * @var string
	 */
	private $content = null;

	private function __construct($post_id, $data)
	{
		$this->id = $post_id;
		$this->headline = (string)$data['headline'];
		$this->description = (string)$data['description'];
		$this->author = (string)$data['author'];
		$this->featured_image = (string)$data['featuredImage'];
		$this->categories = (array)$data['categories'];
		$this->date_published = (string)$data['datePublished'];
		$this->date_updated = (string)$data['dateUpdated'];
	}

	/**
	 * @param {string} $post_id
	 * @param {array} $data
	 * @return BlogPost
	 */
	public static function create($post_id, $data)
	{
		$instance = new self($post_id, $data);
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
	public function getHeadline()
	{
		return $this->headline;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @return BlogAuthor
	 * @throws BlogHandlerException
	 */
	public function getAuthor()
	{
		return BlogHandler::getBlogAuthorById($this->author);
	}

	/**
	 * @return string
	 */
	public function getFeaturedImage()
	{
		return $this->featured_image;
	}

	/**
	 * @return BlogCategory[]
	 * @throws BlogHandlerException
	 */
	public function getCategories()
	{
		$categories = array();
		foreach ($this->categories as $category_id)
		{
			$categories[] = BlogHandler::getBlogCategoryById($category_id);
		}
		return $categories;
	}

	/**
	 * @return string
	 */
	public function getDatePublished()
	{
		return $this->date_published;
	}

	/**
	 * @return string
	 */
	public function getDateUpdated()
	{
		return $this->date_updated;
	}

	/**
	 * @return string
	 * @throws BlogHandlerException
	 */
	public function getContent()
	{
		if (is_null($this->content))
		{
			$this->load_content();
		}
		return $this->content;
	}

	/**
	 * @throws BlogHandlerException
	 */
	private function load_content()
	{
		$content = BlogHandler::getPostContentById($this->id);
		$parser = new Parsedown();
		$this->content = $parser->text($content);
	}

	/**
	 * @return string
	 */
	public function getURL()
	{
		return BlogLink::getPostURL($this);
	}


}