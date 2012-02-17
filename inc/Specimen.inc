<?php

/**
 * Comp315 2011
 */

require_once("coreincs.inc");

class Specimen{

	private $SpecimenCode;
	private $CollectionCode;
	private $SpeciesCode;
    private $DeterminedBy;
	private $DateDetermined;
	private $Deposited;
	private $Medium;
	private $Storage;
	private $Abundance;
	private $StageSex;
	private $PreparedBy;
	private $DatePrepared;
	private $SpcmRecordDate;
	private $AuxiliaryFields;
	private $DateDetFlag;
	private $DatePrepFlag;
	private $TypeStatus;
	private $SpcmRecChangedDate;
	private $NumberImages;
	private $SpcmRecChangedBy;
	private $SpecimenCustom1;
	private $SpecimenCustom2;
	private $Genus;
	private $Family;
	private $Order;
	private $Classes;


	private function __construct()
	{
	}

	public function getSpecimenCode(){
		return $this->SpecimenCode;
	}

	public function getCollectionCode(){
		return $this->CollectionCode;
	}

	public function getSpeciesCode(){
		return $this->SpeciesCode;
	}

	public function getDeterminedBy(){
		return $this->DeterminedBy;
	}

	public function getDateDetermined(){
		return $this->DateDetermined;
	}

	public function getDeposited(){
		return $this->Deposited;
	}

	public function getMedium(){
		return $this->Medium;
	}

	public function getStorage(){
		return $this->Storage;
	}

	public function getAbundance(){
		return $this->Abundance;
	}

	public function getStageSex(){
		return $this->StageSex;
	}

	public function getPreparedBy(){
		return $this->PreparedBy;
	}

	public function getDatePrepared(){
		return $this->DatePrepared;
	}

	public function getSpcmRecordDate(){
		return $this->SpcmRecordDate;
	}

	public function getAuxiliaryFields(){
		return $this->AuxiliaryFields;
	}

	public function getDateDetFlag(){
		return $this->DateDetFlag;
	}

	public function getDatePrepFlag(){
		return $this->DatePrepFlag;
	}

	public function getTypeStatus(){
		return $this->TypeStatus;
	}

	public function getSpcmRecChangedDate(){
		return $this->SpcmRecChangedDate;
	}

	public function getNumberImages(){
		return $this->NumberImages;
	}

	public function getSpcmRecChangedBy(){
		return $this->SpcmRecChangedBy;
	}

	public function getSpecimenCustom1(){
		return $this->SpecimenCustom1;
	}

	public function getSpecimenCustom2(){
		return $this->SpecimenCustom2;
	}

	public function getGenus(){
		return $this->Genus;
	}

	public function getFamily(){
		return $this->Family;
	}

	public function getOrder(){
		return $this->Order;
	}

	public function getClasses(){
		return $this->Classes;
	}







}

?>