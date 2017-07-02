<?php

class IndexController extends Controller
{
	public static function display()
	{
		$tpl = Template::create('pages/index.tpl');
		$tpl->assign('page_title', 'Welcome');
		$tpl->assign('page_id', 'index');
		$tpl->assign('social_title', 'Carlos Ferreira - All Things Developer from London');
		$tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');
		$tpl->display();
	}
}