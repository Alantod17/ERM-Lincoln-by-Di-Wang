<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */

require_once("coreincs.inc");

class ImageArchive{
	Private $ImageNumber;
	Private $ImageName;
	Private $PathToFile;
	Private $ImageNote;
	Private $SpecimenNo;
	Private $SmallImageName;

	//	Private $Image;
	//	Private $RecordCode;
	//	Private $Thumbnail;
	//	Private $Table;

	private function __construct()
	{
	}

	public function getImageNumber(){
		return $this->ImageNumber;
	}

//	public function getImage(){
//		return $this->Image;
//	}
//
//	public function getRecordCode(){
//		return $this->RecordCode;
//	}
//
	public function getImageName(){
		return $this->ImageName;
	}
//
//	public function getThumbnail(){
//		return $this->Thumbnail;
//	}
//
	public function getPathToFile(){
		return $this->PathToFile;
	}
//
	public function getImageNote(){
		return $this->ImageNote;
	}
//
//	public function getTable(){
//		return $this->Table;
//	}



	public function getSpecimenNo(){
		return $this->SpecimenNo;
	}

	public function getSmallImageName(){
		return $this->SmallImageName;
	}

}
?>