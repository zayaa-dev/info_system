<?php

if(!defined('INFO_KEY'))
{
	header("HTTP/1.1 404 Not Found");
	exit(file_get_contents(ERROR_PAGE));
}

ini_set('display_errors', 1);
error_reporting(E_ALL);
	
function dbg(&$var, $exit = false) 
{
	static $num = 0;
	++$num;
?>
<div style="background-color:#FFFF33; width:80%; padding-left:20px; margin-left:5%; border:1px solid">
	
	<h3 style="color:#0000CC">TRACE № <?php echo $num; ?>.</h3>
	
<?php
	$trace = debug_backtrace();
	$old = $var; 
	$var = microtime();
	$vname = false;
	$vstring = '<b style="color:blue">'; 
	
	foreach($GLOBALS as $key => $val)
	{
		if($val === $var) { $vname = $key; }
	}

	if(empty($vname) && isset($_POST))
	{
		foreach($_POST as $key => $val)
		{
			if($val === $var)
			{
				$vname = '_POST[<span style="color:red" >"'. $key .'"</span>]';
			}
		}
	}
	elseif(empty($vname) && isset($_GET))
	{
		foreach($_GET as $key => $val)
		{
			if($val === $var)
			{
				$vname = '_GET[<span style="color:red" >"'. $key .'"</span>]';
			}
		}
	}
	elseif(empty($vname) && isset($_SESSION))
	{
		foreach($_SESSION as $key => $val) 
		{
			if($val === $var)
			{
				$vname = '_SESSION[<span style="color:red" >"'. $key .'"</span>]';
			}
		}
	}
	elseif(empty($vname) && isset($_COOKIE))
	{
		foreach($_COOKIE as $key => $val)
		{
			if($val === $var)
			{
				$vname = '_COOKIE[<span style="color:red" >"'. $key .'"</span>]';
			}
		}
	}

	$var = $old; 

	if(empty($vname) && empty($var))
	{
		$vstring .= '&nbsp;</b><b style="color:red">The variable is not defined in function</b><br>';
	}
	elseif(empty($var))
	{
		$vstring .= '&nbsp;</b><b style="color:red">The variable is not defined or empty</b><br>';
	}
	elseif(empty($vname))
	{
		$vstring .= '&nbsp;</b><b style="color:green">It was not possible to define a variable name</b><br>';
	}
	else
	{
		$vstring .=  '$'. $vname .'</b><b style="color:green"> = </b>';
	}

	echo '<b>File: </b><b style="color:#CC0066">'. $trace[0]['file'] .'</b><br>';
	echo !empty($trace[1]['class'])?'<b>Class: </b><b style="color:#CC0066">'. $trace[1]['class'] .'</b><br>':NULL;
	echo (!empty($trace[1]['function'])?
		 '<b>Function: </b><b style="color:#CC0066">'. $trace[1]['function']:'<b>GLOBALS') .'</b><br>';
	echo  '<b>Line: </b><b style="color:#CC0066">'. $trace[0]['line'] .' </b><br><br>';
		  
	echo $vstring .'<pre>';
	
	if(is_array($var)) 
	{
		print_r($var); 
	}
	elseif(!empty($var))
	{
		var_dump($var); 
	}
?>	</pre>
</div>
<?php 
	if($exit) { exit(); }
}
?>
