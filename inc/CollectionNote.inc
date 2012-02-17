<?php

/**
 * Comp315 2011
 */

require_once("coreincs.inc");

class CollectionNote{



	private $CollectionCode;
	private $NoteDate;
	private $NoteBy;
	private $NoteText;
	private $Null;

	private function __construct()
	{
	}

	public function getCollectionCode(){
		return $this->CollectionCode;
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