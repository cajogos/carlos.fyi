<?php

abstract class Element
{
	public static function get()
	{
		return new static();
	}

	public function getString()
	{
		throw new Exception('getString function not called in element: ' . get_class($this));
	}
}