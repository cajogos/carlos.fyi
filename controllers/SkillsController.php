<?php

use \Cajogos\Biscuit\Controller as Controller;
use \Cajogos\Biscuit\Template as Template;

class SkillsController extends Controller
{
	public static function display()
	{
		$tpl = Template::create('pages/skills.tpl');
		$tpl->assign('page_title', 'What I can do');
		$tpl->assign('page_id', 'skills');
		$tpl->assign('social_title', 'What I Can Do | Carlos Ferreira - All Things Developer from London');
		$tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');
		$tpl->display();
	}
}