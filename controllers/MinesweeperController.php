<?php

class MinesweeperController extends Controller
{
	public static function display()
	{
		$tpl = Template::create('pages/minesweeper.tpl');
		$tpl->assign('page_title', 'Play Minesweeper in your browser');
		$tpl->assign('page_id', 'minesweeper');
		$tpl->assign('social_title', 'Minesweeper in your Browser for Free | Carlos Ferreira');
		$tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');
		$tpl->display();
	}
}