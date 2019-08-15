<?php

use \Cajogos\Biscuit\Controller as Controller;
use \Cajogos\Biscuit\Template as Template;

class BlogController extends Controller
{
	public static function displayBlogHome()
	{
		echo 'BLOG HOME';
		exit;
	}

	public static function displayBlogAuthor($author_id)
	{
		echo 'BLOG AUTHOR: ';
		var_dump($author_id);
		exit;
	}

	public static function displayBlogCategory($category_id)
	{
		echo 'BLOG CATEGORY: ';
		var_dump($category_id);
		exit;
	}

	public static function displayBlogPost($post_id)
	{
		echo 'BLOG POST: ';
		var_dump($post_id);
		exit;
	}
}
