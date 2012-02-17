<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */

require_once("coreincs.inc");

class Kingdom{
	private $Kingdom;
	private $Superkingdom;
	private $KingdomCustom1;
	private $KingdomCustom2;

	private function __construct()
	{
	}

	public function getKingdom(){
		return $this->Kingdom;
	}

	public function getSuperkingdom(){
		return $this->Superkingdom;
	}

	public function getKingdomCustom1(){
		return $this->KingdomCustom1;
	}

	public function getKingdomCustom2(){
		return $this->KingdomCustom2;
	}

}

?>