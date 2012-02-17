<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */

require_once("coreincs.inc");

class LocalityNote{
	private $LocalityCode;
	private $NoteDate;
	private $NoteBy;
	private $NoteText;
	private $Null;

	private function __construct()
	{
	}

	public function getLocalityCode(){
		return $this->LocalityCode;
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