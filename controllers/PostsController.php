<?php

use \Cajogos\Biscuit\Controller as Controller;
use \Cajogos\Biscuit\Template as Template;

class PostsController extends Controller
{
	public static function displayPost($post_id = null)
	{
		$markdown_el = MarkdownElement::get();
		$markdown_el->setFile($post_id);

		if (!$markdown_el->exists())
		{
			return handle404Page();
		}

		$page_title = 'Post by Me';
		switch ($post_id)
		{
			case 'great-day':
				$page_title = 'A Great Day at the Office Summary';
				break;
		}

		$tpl = Template::create('pages/post.tpl');
		$tpl->assign('page_title', $page_title);
		$tpl->assign('page_id', 'post');
		$tpl->assign('social_title', $page_title . ' Carlos Ferreira');
		$tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');
		$tpl->addElement('markdown_el', $markdown_el);
		$tpl->display();
	}
}