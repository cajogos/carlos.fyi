<?php

use BaseController as Controller;
use BaseTemplate as Template;

class BlogController extends Controller
{
	public static function displayBlogHome()
	{
		$tpl = Template::create('blog/home.tpl');
		$tpl->display();
	}

	/**
	 * @param {string} $author_id
	 */
	public static function displayBlogAuthor($author_id)
	{
		try
		{
			$author = BlogHandler::getBlogAuthorById($author_id);
		}
		catch (BlogHandlerException $e)
		{
			if ($e->getCode() === BlogHandlerException::ERROR_INVALID_AUTHOR_ID)
			{
				self::sendToBlogHome();
			}
		}

		$tpl = Template::create('blog/author.tpl');
		$tpl->assign('author_id', $author->getID());
		$tpl->assign('author_display_name', $author->getDisplayName());
		$tpl->display();
	}

	/**
	 * @param {string} $category_id
	 */
	public static function displayBlogCategory($category_id)
	{
		try
		{
			$category = BlogHandler::getBlogCategoryById($category_id);
		}
		catch (BlogHandlerException $e)
		{
			if ($e->getCode() === BlogHandlerException::ERROR_INVALID_CATEGORY_ID)
			{
				self::sendToBlogHome();
			}
		}

		$tpl = Template::create('blog/category.tpl');
		$tpl->assign('category_id', $category->getID());
		$tpl->assign('category_page_title', $category->getPageTitle());
		$tpl->display();
	}

	/**
	 * @param {string} $post_id
	 * @throws BlogHandlerException
	 */
	public static function displayBlogPost($post_id)
	{
		try
		{
			$post = BlogHandler::getBlogPostById($post_id);
		}
		catch (BlogHandlerException $e)
		{
			if ($e->getCode() === BlogHandlerException::ERROR_INVALID_POST_ID)
			{
				self::sendToBlogHome();
			}
		}

		$published_date = strtotime($post->getDatePublished());

		$tpl = Template::create('blog/post.tpl');

		$tpl->assign('post', $post);
		$tpl->assign('author', $post->getAuthor());
		$tpl->assign('categories', $post->getCategories());
		$tpl->assign('published_date', $published_date);
		$tpl->assign('page_title', $post->getHeadline() . ' | Carlos.fyi Blog');
		$tpl->assign('post_content', $post->getContent());
		$tpl->display();
	}

	public static function displayBlogFeed()
	{
		$posts = BlogHandler::getAllActivePosts();
		$xml = BlogRSS::generateForPosts($posts);

		header('Content-type: application/xml; charset=UTF-8');
		echo $xml;
		exit;
	}

	public static function sendToBlogHome()
	{
		Request::redirect('/blog', false);
	}
}
