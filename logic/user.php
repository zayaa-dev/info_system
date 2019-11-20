<?php

if(!defined('INFO_KEY'))
{
	header("HTTP/1.1 404 Not Found");
	exit(file_get_contents(ERROR_PAGE));
}

class User 
{
	
	function __construct() 
	{
		$this->mac_address_ = "Unknown";
	}

	public function init()
	{
		static $mac_format = "/[\d|A-F]{2}\:[\d|A-F]{2}\:[\d|A-F]{2}\:[\d|A-F]{2}\:[\d|A-F]{2}\:[\d|A-F]{2}/i";
		$cmd_arp = "arp -na | grep -w " .$_SERVER['REMOTE_ADDR'];

		exec($cmd_arp, $result_arp);

		if(empty($result_arp)) { return false; }

		preg_match($mac_format, $result_arp[0], $this->mac_address_);
		$this->mac_address_ = $this->mac_address_[0];
		
		return ($this->mac_address_ === "Unknown") ? false : true;
	}
	
	public function getIpAddress()
	{
		return $_SERVER['REMOTE_ADDR'];
	}
	
	public function getMacAddress()
	{
		return $this->mac_address_;
	}
	
	private $mac_address_ = "Unknown";
}

?>