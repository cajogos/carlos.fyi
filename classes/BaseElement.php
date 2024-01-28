<?php

abstract class BaseElement
{
	public static function get()
	{
		return new static();
	}

	/**
	 * @throws Exception
	 * @returns string
	 */
	public function getString()
	{
		throw new \Exception('getString function not called in element: ' . get_class($this));
	}
}