<?php

// Contact Script
require_once '../../app/init.php';

$api_response = new APIResponse();

$result = array();
$result['status'] = 'fail';
if ($_POST)
{
	$name = Request::getPostVariable('name');
	$email = Request::getPostVariable('email');
	$subject = Request::getPostVariable('subject');
	$location = Request::getPostVariable('location');
	$message = Request::getPostVariable('message');

	// Simple check to see if required values were sent in the post
	if (is_null($name) || is_null($email) || is_null($subject) || is_null($message))
	{
		$result['message'] = 'Request failed, please refresh the page and try again...';
		$api_response->setResult($result);
		$api_response->displayResult();
	}

	// Name validation
	$name = Validator::cleanUpPostValue($name);
	if (empty($name))
	{
		$result['message'] = 'Name provided is empty!';
		$api_response->setResult($result);
		$api_response->displayResult();
	}

	// Email validation
	$email = Validator::cleanUpPostValue($email);
	if (empty($email))
	{
		$result['message'] = 'Email address is empty!';
		$api_response->setResult($result);
		$api_response->displayResult();
	}
	if (!Validator::validateEmail($email))
	{
		$result['message'] = 'The provided email (' . $email . ') is not valid.';
		$api_response->setResult($result);
		$api_response->displayResult();
	}

	// Subject validation
	$subject = Validator::cleanUpPostValue($subject);
	if (empty($subject))
	{
		$result['message'] = 'Subject is empty!';
		$api_response->setResult($result);
		$api_response->displayResult();
	}

	// Location clean-up (not required, so empty value is ok)
	$location = Validator::cleanUpPostValue($location);

	// Message validation
	$message = Validator::cleanUpPostValue($message);
	if (empty($message))
	{
		$result['message'] = 'Message is empty, please write a message!';
		$api_response->setResult($result);
		$api_response->displayResult();
	}

	// Build email message
	$body = '<html><body>';
	$body .= '<p><strong>Name:</strong> ' . $name . '</p>';
	$body .= '<p><strong>Email:</strong> ' . $email . '</p>';
	$body .= '<p><strong>Location:</strong> ' . $location . '</p>';
	$body .= '<p><strong>Subject:</strong> ' . $subject . '</p>';
	$body .= '<p><strong>Message:</strong></p><pre>' . $message . '</pre>';
	$body .= '</body></html>';

	// Prepare the email
	$to_email = 'carlosferreira1994@gmail.com'; // Send it to myself ;)
	$subject = 'carlos.fyi: ' . $subject;

	$headers = array();
	$headers[] = 'From: ' . $name . ' <' . $email . '>';
	$headers[] = 'Reply-To: ' . $email;
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';
	$headers = implode("\r\n", $headers);

	if (!mail($to_email, $subject, $body, $headers))
	{
		$result['message'] = 'The email failed to send! :( Please let me know tweet @carlos_tweets so I can have a look. Thanks!';
		$api_response->setResult($result);
		$api_response->displayResult();
	}
	$result['status'] = 'success';
	$result['message'] = 'Your message has been sent to me! I will get back to you ASAP! Ping me on Twitter or other contact methods if you do not hear from within 2 days.';
	$api_response->setResult($result);
	$api_response->displayResult();
}

$result['code'] = 501;
$result['message'] = 'POST was not processed!';
$api_response->setResult($result);
$api_response->displayResult();