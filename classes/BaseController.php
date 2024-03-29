<?php

abstract class BaseController
{
	public static function get()
	{
		return new static();
	}

	public static function display()
	{
		throw new \Exception('No display function has been called from ' . get_class(static::get()));
	}
}