<?php

use \Cajogos\Biscuit\Controller as Controller;
use \Cajogos\Biscuit\Template as Template;

class MainController extends Controller
{
	public static function displayIndex()
	{
		$tpl = Template::create('pages/index.tpl');
		$tpl->assign('page_title', 'Welcome');
		$tpl->assign('page_id', 'index');
		$tpl->assign('social_title', 'Carlos Ferreira - All Things Developer from London');
		$tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');
		$tpl->assign('age', Utils::getage('20-05-1994'));
		$tpl->display();
	}

	public static function displayContact()
	{
		$tpl = Template::create('pages/contact.tpl');
		$tpl->assign('page_title', 'Get In Touch');
		$tpl->assign('page_id', 'contact');
		$tpl->assign('social_title', 'Contact Carlos Ferreira - All Things Developer from London');
		$tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');
		$tpl->display();
	}

	public static function displaySkills()
	{
		$tpl = Template::create('pages/skills.tpl');
		$tpl->assign('page_title', 'What I can do');
		$tpl->assign('page_id', 'skills');
		$tpl->assign('social_title', 'What I Can Do | Carlos Ferreira - All Things Developer from London');
		$tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');
		$tpl->display();
	}

	public static function displayTimeline()
	{
		$tpl = Template::create('pages/timeline.tpl');
		$tpl->assign('page_title', 'My Life Events');
		$tpl->assign('page_id', 'timeline');
		$tpl->assign('social_title', 'My Life Events | Carlos Ferreira - All Things Developer from London');
		$tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');
		$tpl->display();
	}

	public static function displayRubiksCube()
	{
		$tpl = Template::create('pages/rubiks-cube.tpl');
		$tpl->assign('page_title', 'How to solve 3x3 Rubik\'s Cube');
		$tpl->assign('page_id', 'rubiks-cube');
		$tpl->assign('social_title', 'How to solve the 3x3 Rubik\'s Cube with Carlos Ferreira');
		$tpl->assign('social_desc', 'Learn how to solve the Rubik\'s Cube with the most simplified guide.');
		$tpl->display();
	}

	public static function displayMinesweeper()
	{
		$tpl = Template::create('pages/minesweeper.tpl');
		$tpl->assign('page_title', 'Play Minesweeper in your browser');
		$tpl->assign('page_id', 'minesweeper');
		$tpl->assign('social_title', 'Minesweeper in your Browser for Free | Carlos Ferreira');
		$tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');
		$tpl->display();
	}
}
