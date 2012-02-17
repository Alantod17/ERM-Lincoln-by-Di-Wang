<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */

require_once("coreincs.inc");

class LoansNote{
	private $LoanCode;
	private $NoteDate;
	private $NoteBy;
	private $NoteText;
	private $Null;

	private function __construct()
	{
	}

	public function getLoanCode(){
		return $this->LoanCode;
	}

	public function getNoteDate(){
		return $this->NoteDate;
	}

	public function getNoteBy(){
		return $this->NoteBy;
	}

	public function getNoteText(){
		return $this->NoteText;
	}

	public function getNull(){
		return $this->Null;
	}

}
?>