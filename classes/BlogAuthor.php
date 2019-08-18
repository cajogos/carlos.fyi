<?php

class BlogAuthor
{
	/**
	 * @var string
	 */
	private $id = null;

	/**
	 * @var string
	 */
	private $display_name = null;

	/**
	 * @var string
	 */
	private $avatar = null;

	/**
	 * @var string
	 */
	private $bio = null;

	/**
	 * @var array
	 */
	private $posts = array();

	/**
	 * @var string
	 */
	private $twitter_handle = null;

	private function __construct($author_id, $data)
	{
		$this->id = $author_id;
		$this->display_name = (string) $data['displayName'];
		$this->avatar = (string) $data['avatar'];
		$this->bio = (string) $data['bio'];
		$this->posts = (array) $data['posts'];
		$this->twitter_handle = (string) $data['twitter'];
	}

	/**
	 * @param {string} $author_id
	 * @param {array} $data
	 * @return BlogAuthor
	 */
	public static function create($author_id, $data)
	{
		$instance = new self($author_id, $data);
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
	public function getDisplayName()
	{
		return $this->display_name;
	}

	/**
	 * @return string
	 */
	public function getURL()
	{
		return BlogLink::getAuthorURL($this);
	}
}