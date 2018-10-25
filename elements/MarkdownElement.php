<?php

use Cajogos\Biscuit\Element as Element;

class MarkdownElement extends Element
{
	private $parsedown = null;
	private $file = null;

	public function __construct()
	{
		$this->parsedown = new Parsedown();
	}

	public function setFile($file)
	{
		$this->file = $file;
	}

	public function getString()
	{
		$file_contents = @file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/../templates/markdown/' . $this->file . '.md');

		if ($file_contents !== false)
		{
			return $this->parsedown->text($file_contents);
		}
		return 'Markdown file not found!';
	}
}