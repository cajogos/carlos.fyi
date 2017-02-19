<?php

class Request
{
	public static function getGetVariable($key)
	{
		if (isset($_GET[$key]))
		{
			return $_GET[$key];
		}
		return null;
	}

	public static function getPostVariable($key)
	{
		if (isset($_POST[$key]))
		{
			return $_POST[$key];
		}
		return null;
	}
}