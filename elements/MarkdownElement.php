<?php

use BaseElement as Element;

class MarkdownElement extends Element
{
	private $parsedown = null;
	private $file = null;

	private $contents = null;

	public function __construct()
	{
		$this->parsedown = new Parsedown();
	}

	public function setFile($file)
	{
		$this->file = $file;
	}

	public function exists()
	{
		try
		{
			$this->load_contents();
		}
		catch (Exception $e)
		{
			return false;
		}
		return true;
	}

	private function load_contents()
	{
		if (is_null($this->contents))
		{
			$this->contents = @file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/../templates/markdown/' . $this->file . '.md');
			if ($this->contents === false)
			{
				throw new Exception('File does not exist!');
			}
		}
	}

	public function getString()
	{
		try
		{
			$this->load_contents();
		}
		catch (Exception $e)
		{
			return null;
		}

		$parsed = $this->parsedown->text($this->contents);
		return $parsed;
	}
}