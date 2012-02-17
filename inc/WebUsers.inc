<?php

/**
 * Comp315 2011
 */

require_once("coreincs.inc");

class WebUsers{

	private $UserName;
	private $Password;
	private $SecureLevel;
	private $Person;


	private function __construct()
	{
	}

	public function getUserName(){
		return $this->UserName;
	}

	public function getPassword(){
		return $this->Password;
	}

	public function getSecureLevel(){
		return $this->SecureLevel;
	}

	public function getPerson(){
		return $this->Person;
	}


}

?>