<?php

class BlogHandlerException extends \Exception
{
	const ERROR_INVALID_AUTHOR_ID = 601;
	const ERROR_INVALID_CATEGORY_ID = 602;
	const ERROR_INVALID_POST_ID = 603;
	const ERROR_NO_JSON_DATA = 604;
	const ERROR_NO_POST_CONTENT_FOUND = 605;
}