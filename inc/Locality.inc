<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */

require_once("coreincs.inc");

class Locality{
	private $LocalityCode;
	private $StateProvince;
	private $Country;
	private $Latitude;
	private $Longitude;
	private $Elevation;
	private $District;
	private $LocalityName;
	private $LocRecordDate;
	private $AuxiliaryFields;
	private $LatLongAccuracy;
	private $AltCoordinate1;
	private $AltCoordinate2;
	private $AltCoordinate3;
	private $LocRecChangedDate;
	private $NumberImages;
	private $LocalityNameIndex;
	private $LocRecChangedBy;

	private function __construct()
	{
	}

	public function getLocalityCode(){
		return $this->LocalityCode;
	}

	public function getStateProvince(){
		return $this->StateProvince;
	}


	public function getCountry(){
		return $this->Country;
	}


	public function getLatitude(){
		return $this->Latitude;
	}


	public function getLongitude(){
		return $this->Longitude;
	}


	public function getElevation(){
		return $this->Elevation;
	}


	public function getDistrict(){
		return $this->District;
	}


	public function getLocalityName(){
		return $this->LocalityName;
	}


	public function getLocRecordDate(){
		return $this->LocRecordDate;
	}


	public function getAuxiliaryFields(){
		return $this->AuxiliaryFields;
	}


	public function getLatLongAccuracy(){
		return $this->LatLongAccuracy;
	}

	public function getAltCoordinate1(){
		return $this->AltCoordinate1;
	}


	public function getAltCoordinate2(){
		return $this->AltCoordinate2;
	}


	public function getAltCoordinate3(){
		return $this->AltCoordinate3;
	}


	public function getLocRecChangedDate(){
		return $this->LocRecChangedDate;
	}


	public function getNumberImages(){
		return $this->NumberImages;
	}


	public function getLocalityNameIndex(){
		return $this->LocalityNameIndex;
	}


	public function getLocRecChangedBy(){
		return $this->LocRecChangedBy;
	}


}

?>