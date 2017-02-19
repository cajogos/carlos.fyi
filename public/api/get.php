<?php

require_once '../../app/init.php';

$api_reponse = new APIResponse();
$result = array();

$info = Request::getGetVariable('info');

if ($info === 'githubrepos')
{
	$gh_api = GitHubAPI::get();
	$repos = $gh_api->getUserRepos('cajogos');
	if (count($repos) === 0)
	{
		$result['code'] = 102;
		$result['message'] = 'Failed to get repositories!';
	}
	else
	{
		$result['code'] = 200;
		$result['repos'] = $repos;
	}
}
else if ($info === 'background')
{
	$flickr_api = FlickrAPI::getRandomFromFavorites('cajogos');
	$result['code'] = 200;
	$result['background_data'] = $flickr_api;
}
else
{
	$result['code'] = 100;
	$result['message'] = 'Invalid API call';
}

$api_reponse->setResult($result);
$api_reponse->displayResult();