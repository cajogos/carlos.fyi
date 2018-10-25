<?php

use \Cajogos\Biscuit\Controller as Controller;
use \Cajogos\Biscuit\Template as Template;

class ContactController extends Controller
{
	public static function display()
	{
		$tpl = Template::create('pages/contact.tpl');
		$tpl->assign('page_title', 'Get In Touch');
		$tpl->assign('page_id', 'contact');
		$tpl->assign('social_title', 'Contact Carlos Ferreira - All Things Developer from London');
		$tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');
		$tpl->display();
	}
}