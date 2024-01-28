<?php

use \Cajogos\Biscuit\Template as Template;

class SiteHandler
{
	private $router = null;

	private $routes = array();

	private function __construct()
	{
		$this->router = new AltoRouter();
	}

	private static $instance = null;

	public static function get()
	{
		if (is_null(self::$instance))
		{
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function addRoute($method, $route, $target, $name = null)
	{
		$this->routes[] = array(
			'method' => $method,
			'route' => $route,
			'target' => $target,
			'name' => $name
		);
	}

	public function handleRouting()
	{
		foreach ($this->routes as $route)
		{
			$this->router->map($route['method'], $route['route'], $route['target'], $route['name']);
		}

		$match = $this->router->match();
		if ($match && is_callable($match['target']))
		{
			call_user_func_array($match['target'], $match['params']);
		}
		else
		{
			self::handle404Page();
		}
	}

	public static function handle404Page()
	{
		header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
		$tpl = Template::create('404-splash.tpl');
		$tpl->assign('page_title', '404 Not Found - Carlos Ferreira - All Things Developer');
		$tpl->assign('title', '404 - Not Found :(');
		$tpl->assign('subtitle', 'Oops! Looks like whatever you were looking for can not be found... <a href="/">Please try again</a>. You will be redirected in 1 minute...');
		$tpl->display();
	}

}
