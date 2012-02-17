<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */

require_once("coreincs.inc");

class Group{
	private $GroupName;
	private $ShortName;
	private $MemberNumber;

	private function __construct()
	{
	}

	public function getGroupName(){
		return $this->GroupName;
	}

	public function getShortName(){
		return $this->ShortName;
	}

	public function getMemberNumber(){
		return $this->MemberNumber;
	}

}



?>