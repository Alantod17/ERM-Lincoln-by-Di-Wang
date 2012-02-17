<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */

require_once("inc/coreincs.inc");

class Table{
	private $TableName;
	private $PrimaryKey;

	private function __construct()
	{
	}

	public function getTableName(){
		return $this->TableName;
	}

	public function getPrimaryKey(){
		return $this->PrimaryKey;
	}

}
?>