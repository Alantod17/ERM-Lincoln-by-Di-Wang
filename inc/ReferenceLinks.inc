<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */

require_once("coreincs.inc");

class ReferenceLinks{
	private $TableNumber;
	private $RecordCode;
	private $ReferenceNo;
	private $TableName;

	private function __construct()
	{
	}

	public function getTableNumber(){
		return $this->TableNumber;
	}

	public function getRecordCode(){
		return $this->RecordCode;
	}

	public function getReferenceNo(){
		return $this->ReferenceNo;
	}

	public function getTableName(){
		return $this->TableName;
	}

}


?>