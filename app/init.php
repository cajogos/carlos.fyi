<?php

// Determine if in Development mode (localhost)
$localhost = !(strstr($_SERVER['HTTP_HOST'], 'carlos.fyi') !== false);
define('DEV_MODE', $localhost);
if (DEV_MODE)
{
	ini_set('display_errors', DEV_MODE);
	ini_set('display_startup_errors', DEV_MODE);
	error_reporting(E_ALL);
}

// Start the session
session_start();

// Add the app_config.php file
require $_SERVER['DOCUMENT_ROOT'] . '/../../config/app_config.php';

// Composer autoloader
require $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

// Load custom classes
spl_autoload_register(function ($class_name)
{
	// Check if Class
	$location = $_SERVER['DOCUMENT_ROOT'] . '/../classes/' . $class_name . '.php';
	if (file_exists($location))
	{
		require_once $location;
	}
	else
	{
		// Check if Controller
		$location = $_SERVER['DOCUMENT_ROOT'] . '/../controllers/' . $class_name . '.php';
		if (file_exists($location))
		{
			require_once $location;
		}
		else
		{
			// Check if Element
			$location = $_SERVER['DOCUMENT_ROOT'] . '/../elements/' . $class_name . '.php';
			if (file_exists($location))
			{
				require_once $location;
			}
			else
			{
				throw new Exception('Could not find class: ' . $class_name);
			}
		}
	}
});