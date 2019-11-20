<?php

if(!defined('INFO_KEY'))
{
	header("HTTP/1.1 404 Not Found");
	exit(file_get_contents(ERROR_PAGE));
}

$user = new User;
$user->init() ? include_once INFO_PAGE : include_once ERROR_PAGE;

?>