<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */

require_once("coreincs.inc");

class Order{
	private $Order;
	private $Superorder;
	private $Class;
	private $SubClass;
	private $OrderCustom1;
	private $OrderCustom2;
	private $OrderCustom3;

	private function __construct()
	{
	}

	public function getOrder(){
		return $this->Order;
	}

	public function getSuperorder(){
		return $this->Superorder;
	}

	public function getClass(){
		return $this->Class;
	}

	public function getSubClass(){
		return $this->SubClass;
	}

	public function getOrderCustom1(){
		return $this->OrderCustom1;
	}

	public function getOrderCustom2(){
		return $this->OrderCustom2;
	}

	public function getOrderCustom3(){
		return $this->OrderCustom3;
	}

}
?>