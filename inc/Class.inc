<?php

/**
 * Comp315 2011
 */

require_once("coreincs.inc");

class Classes{

	private $Class;
	private $Subphylum;
	private $Phylum;
	private $ClassCustom1;
	private $ClassCustom2;

	private function __construct()
	{
	}

	public function getClass(){
		return $this->Class;
	}

	public function getSubphylum(){
		return $this->Subphylum;
	}

	public function getPhylum(){
		return $this->Phylum;
	}

	public function getClassCustom1(){
		return $this->ClassCustom1;
	}

	public function getClassCustom2(){
		return $this->ClassCustom2;
	}




}

?>