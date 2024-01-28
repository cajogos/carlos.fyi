<?php

class Validator
{
	public static function cleanUpPostValue($value)
	{
		$value = trim($value);
		$value = strip_tags($value);
		return $value;
	}

	public static function validateEmail($email)
	{
		return (filter_var($email, FILTER_VALIDATE_EMAIL) !== false);
	}
}