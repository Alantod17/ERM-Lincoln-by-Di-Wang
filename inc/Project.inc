<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */


require_once("coreincs.inc");

class Project{
	private $ProjectName;
	private $ProjectShortName;
	private $Note;
	private $Heading;
	private $ProjectRecordDate;
	private $ProjectRecChangedDate;
	private $Active;
	private $ProjectRecChangedBy;

	private function __construct()
	{
	}

	public function getProjectName(){
		return $this->ProjectName;
	}

	public function getProjectShortName(){
		return $this->ProjectShortName;
	}

	public function getNote(){
		return $this->Note;
	}

	public function getHeading(){
		return $this->Heading;
	}

	public function getProjectRecordDate(){
		return $this->ProjectRecordDate;
	}

	public function getProjectRecChangedDate(){
		return $this->ProjectRecChangedDate;
	}

	public function getActive(){
		return $this->Active;
	}

	public function getProjectRecChangedBy(){
		return $this->ProjectRecChangedBy;
	}

}
?>