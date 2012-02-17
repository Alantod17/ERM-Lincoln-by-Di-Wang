<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */

require_once("coreincs.inc");

class Phylum{
	private $Phylum;
	private $Subkingdom;
	private $Kingdom ;
	private $PhylumCustom1;
	private $PhylumCustom2;

	private function __construct()
	{
	}

	public function getPhylum(){
		return $this->Phylum;
	}

	public function getSubkingdom(){
		return $this->Subkingdom;
	}

	public function getKingdom(){
		return $this->Kingdom;
	}

	public function getPhylumCustom1(){
		return $this->PhylumCustom1;
	}

	public function getPhylumCustom2(){
		return $this->PhylumCustom2;
	}

}

?>