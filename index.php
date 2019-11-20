<?php

/* 
 * * * * * * * * * * * * * * * *
 * Info system in local network
 * * * * * * * * * * * * * * * *
 */

header("Content-Type: text/html; charset=utf-8");

define('IS_DEBUG', false);
define('INFO_KEY', false);
define('INFO_ROOT', str_replace('\\', '/', dirname(__FILE__)));
define('ERROR_PAGE', INFO_ROOT .'/view/pages/error.tpl');
define('INFO_PAGE', INFO_ROOT .'/view/pages/info.tpl');

if(IS_DEBUG) { include INFO_ROOT .'/logic/debug.php'; }
include INFO_ROOT .'/logic/user.php';
include INFO_ROOT .'/logic/main.php';

?>