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
$router->map('GET', '/bitcoin', 'BitcoinController::display', 'bitcoin');


/** 404 Page **/
function handle404Page()
{
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
	$tpl = Template::create('404-splash.tpl');
	$tpl->assign('page_title', '404 Not Found - Carlos Ferreira - All Things Developer');
	$tpl->assign('title', '404 - Not Found :(');
	$tpl->assign('subtitle', 'Oops! Looks like whatever you were looking for can not be found... Please try again later . You will be redirected in 10 seconds...');
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