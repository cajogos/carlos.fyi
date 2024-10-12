<?php

class APIResponse
{
	private $result;

	public function __construct()
	{
		$this->result = array();
	}

	public function setResult($result)
	{
		$this->result = $result;
	}

	public function displayResult()
	{
		header('Content-type: application/json');
		echo json_encode($this->result);
		exit;
	}
}