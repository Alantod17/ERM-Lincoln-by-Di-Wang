<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */

require_once("coreincs.inc");

class SpeciesNotes{
	private $SpeciesCode ;
	private $NoteDate ;
	private $NoteBy ;
	private $NoteText ;
	private $Null;

	private function __construct()
	{
	}

	public function getSpeciesCode(){
		return $this->SpeciesCode;
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