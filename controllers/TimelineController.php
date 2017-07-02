<?php

class TimelineController extends Controller
{
	public static function display()
	{
		$tpl = Template::create('pages/timeline.tpl');
		$tpl->assign('page_title', 'My Life Events');
		$tpl->assign('page_id', 'timeline');
		$tpl->assign('social_title', 'My Life Events | Carlos Ferreira - All Things Developer from London');
		$tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');
		$tpl->display();
	}
}