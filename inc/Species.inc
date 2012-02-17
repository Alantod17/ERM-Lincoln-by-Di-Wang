<?php

/**
 * Comp315 2011
 */

require_once("coreincs.inc");

class Species{

	private $SpeciesCode;
	private $ValidSpCode;
	private $SpeciesName;
	private $Genus;
	private $SpeciesAuthor;
	private $Subgenus;
	private $NumberImages;
	private $SppRecordDate;
	private $AuxiliaryFields;
	private $Subspecies;
	private $SubspAuthor;
	private $Variety;
	private $VarietyAuthor;
	private $CommonName;
	private $Distribution;
	private $TypeLocality;
	private $TypeDepository;
	private $Section;
	private $SppRecChangedDate;
	private $SppRecChangedBy;

	private function __construct()
	{
	}

	public function getSpeciesCode(){
		return $this->SpeciesCode;
	}

	public function getValidSpCode(){
		return $this->ValidSpCode;
	}

	public function getSpeciesName(){
		return $this->SpeciesName;
	}

	public function getGenus(){
		return $this->Genus;
	}

	public function getSpeciesAuthor(){
		return $this->SpeciesAuthor;
	}

	public function getSubgenus(){
		return $this->Subgenus;
	}

	public function getNumberImages(){
		return $this->NumberImages;
	}

	public function getSppRecordDate(){
		return $this->SppRecordDate;
	}

	public function getAuxiliaryFields(){
		return $this->AuxiliaryFields;
	}

	public function getSubspecies(){
		return $this->Subspecies;
	}

	public function getSubspAuthor(){
		return $this->SubspAuthor;
	}

	public function getVariety(){
		return $this->Variety;
	}

	public function getVarietyAuthor(){
		return $this->VarietyAuthor;
	}

	public function getCommonName(){
		return $this->CommonName;
	}

	public function getDistribution(){
		return $this->Distribution;
	}

	public function getTypeLocality(){
		return $this->TypeLocality;
	}

	public function getTypeDepository(){
		return $this->TypeDepository;
	}

	public function getSection(){
		return $this->Section;
	}

	public function getSppRecChangedDate(){
		return $this->SppRecChangedDate;
	}

	public function getSppRecChangedBy(){
		return $this->SppRecChangedBy;
	}





}

?>