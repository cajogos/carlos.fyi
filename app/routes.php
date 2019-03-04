<?php

$router = new AltoRouter();

// Home
$router->map('GET', '/', 'IndexController::display', 'index');

// Contact
$router->map('GET', '/contact', 'ContactController::display', 'contact');

// Skills
$router->map('GET', '/skills', 'SkillsController::display', 'skills');

// Timeline
$router->map('GET', '/timeline', 'TimelineController::display', 'timeline');

// Bitcoin
$router->map('GET', '/crypto', 'CryptoController::display', 'crypto');
$router->map('GET', '/bitcoin', 'CryptoController::redirect', 'bitcoin');

// Minesweeper
$router->map('GET', '/minesweeper', 'MinesweeperController::display', 'minesweeper');


use \Cajogos\Biscuit\Template as Template;

/** 404 Page **/
function handle404Page()
{
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
	$tpl = Template::create('404-splash.tpl');
	$tpl->assign('page_title', '404 Not Found - Carlos Ferreira - All Things Developer');
	$tpl->assign('title', '404 - Not Found :(');
	$tpl->assign('subtitle', 'Oops! Looks like whatever you were looking for can not be found... <a href="/">Please try again</a>. You will be redirected in 1 minute...');
	$tpl->display();
}

/** Handle Routing **/
function handleRouting(AltoRouter $router)
{
	$match = $router->match();
	if ($match && is_callable($match['target']))
	{
		call_user_func_array($match['target'], $match['params']);
	}
	else
	{
		handle404Page();
	}
}


handleRouting($router);