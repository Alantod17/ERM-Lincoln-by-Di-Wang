<?php


/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */

require_once("coreincs.inc");

class Genus{

	private $Genus;
	private $Tribe;
	private $Family;
	private $Subfamily;
	private $GenusCustom1;
	private $GenusCustom2;
	private $GenusCustom3;

	private function __construct()
	{
	}

	public function getGenus(){
		return $this->Genus;
	}

	public function getTribe(){
		return $this->Tribe;
	}

	public function getFamily(){
		return $this->Family;
	}

	public function getSubfamily(){
		return $this->Subfamily;
	}

	public function getGenusCustom1(){
		return $this->GenusCustom1;
	}

	public function getGenusCustom2(){
		return $this->GenusCustom2;
	}

	public function getGenusCustom3(){
		return $this->GenusCustom3;
	}



}
?>