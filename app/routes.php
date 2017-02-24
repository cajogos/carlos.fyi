<?php

function handleIndexPage()
{
	$tpl = Template::create('pages/index.tpl');
	$tpl->assign('page_title', 'Welcome');
	$tpl->assign('page_id', 'index');
	$tpl->assign('social_title', 'Carlos Ferreira - All Things Developer from London');
	$tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');
	$tpl->display();
}

function handleContactPage()
{
	$tpl = Template::create('pages/contact.tpl');
	$tpl->assign('page_title', 'Get In Touch');
	$tpl->assign('page_id', 'contact');
	$tpl->assign('social_title', 'Contact Carlos Ferreira - All Things Developer from London');
	$tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');
	$tpl->display();
}

function handleSkillsPage()
{
	$tpl = Template::create('pages/skills.tpl');
	$tpl->assign('page_title', 'What I can do');
	$tpl->assign('page_id', 'skills');
	$tpl->assign('social_title', 'Carlos Ferreira - All Things Developer from London');
	$tpl->assign('social_desc', 'Name is Carlos and I like making things. Check out my website to know what I can do.');
	$tpl->display();
}



/** 404 Page **/
function handle404Page()
{
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
	$tpl = Template::create('404-splash.tpl');
	$tpl->assign('page_title', '404 Not Found - Carlos Ferreira - All Things Developer');
	$tpl->assign('title', '404 - Not Found :(');
	$tpl->assign('subtitle', 'Oops! Looks like whatever you were looking for can not be found... Please try again later. You will be redirected in 10 seconds...');
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