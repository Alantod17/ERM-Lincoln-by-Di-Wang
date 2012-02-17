<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */


require_once("coreincs.inc");

class Family{

	private $Family;
	private $Superfamily;
	private $Order;
	private $Suborder;
	private $FamilyCustom1;
	private $FamilyCustom2;
	private $FamilyCustom3;


	private function __construct()
	{
	}

	public function getFamily(){
		return $this->Family;
	}

	public function getSuperfamily(){
		return $this->Superfamily;
	}

	public function getOrder(){
		return $this->Order;
	}

	public function getSuborder(){
		return $this->Suborder;
	}

	public function getFamilyCustom1(){
		return $this->FamilyCustom1;
	}

	public function getFamilyCustom2(){
		return $this->FamilyCustom2;
	}

	public function getFamilyCustom3(){
		return $this->FamilyCustom3;
	}





}

?>