<?php

/**
 * Comp315 2011
 */

require_once("coreincs.inc");

class Collection{

	private $CollectionCode;
	private $Method;
	private $CollectedBy;
	private $DateCollected;
	private $Site;
	private $XCoordinate;
	private $YCoordinate;
	private $HostSpcmCode;
	private $LocalityCode;
	private $Source;
	private $XYAccuracy;
	private $CollRecordDate;
	private $AuxiliaryFields;
	private $DateCollFlag;
	private $DateCollEnd;
	private $DateCollEndFlag;
	private $CollRecChangedDate;
	private $NumberImages;
	private $CollRecChangedBy;


	private function __construct()
	{
	}

	public function getCollectionCode(){
		return $this->CollectionCode;
	}

	public function getMethod(){
		return $this->Method;
	}

	public function getCollectedBy(){
		return $this->CollectedBy;
	}

	public function getDateCollected(){
		return $this->DateCollected;
	}

	public function getSite(){
		return $this->Site;
	}

	public function getXCoordinate(){
		return $this->XCoordinate;
	}

	public function getYCoordinate(){
		return $this->YCoordinate;
	}

	public function getHostSpcmCode(){
		return $this->HostSpcmCode;
	}

	public function getLocalityCode(){
		return $this->LocalityCode;
	}

	public function getSource(){
		return $this->Source;
	}

	public function getXYAccuracy(){
		return $this->XYAccuracy;
	}

	public function getCollRecordDate(){
		return $this->CollRecordDate;
	}

	public function getAuxiliaryFields(){
		return $this->AuxiliaryFields;
	}

	public function getDateCollFlag(){
		return $this->DateCollFlag;
	}

	public function getDateCollEnd(){
		return $this->DateCollEnd;
	}

	public function getDateCollEndFlag(){
		return $this->DateCollEndFlag;
	}

	public function getCollRecChangedDate(){
		return $this->CollRecChangedDate;
	}

	public function getNumberImages(){
		return $this->NumberImages;
	}

	public function getCollRecChangedBy(){
		return $this->CollRecChangedBy;
	}




}

?>