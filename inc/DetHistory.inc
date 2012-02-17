<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */

require_once("coreincs.inc");

class DetHistory{
	private $SpecimenCode;
	private $SpeciesCode;
	private $Genus;
	private $SpeciesName;
	private $SpeciesAuthor;
	private $DeterminedBy;
	private $DateDetermined;
	private $WhereChanged;
	private $DateChanged;
	private $ChangedBy;
	private $DateDetFlag;
	private $Sequence;
	private $Subspecies;
	private $SubspAuthor;
	private $Variety;
	private $VarietyAuthor;

	private function __construct()
	{
	}

	public function getSpecimenCode(){
		return $this->SpecimenCode;
	}

	public function getSpeciesCode(){
		return $this->SpeciesCode;
	}

	public function getGenus(){
		return $this->Genus;
	}

	public function getSpeciesName(){
		return $this->SpeciesName;
	}

	public function getSpeciesAuthor(){
		return $this->SpeciesAuthor;
	}

	public function getDeterminedBy(){
		return $this->DeterminedBy;
	}

	public function getDateDetermined(){
		return $this->DateDetermined;
	}

	public function getWhereChanged(){
		return $this->WhereChanged;
	}

	public function getDateChanged(){
		return $this->DateChanged;
	}

	public function getChangedBy(){
		return $this->ChangedBy;
	}

	public function getDateDetFlag(){
		return $this->DateDetFlag;
	}

	public function getSequence(){
		return $this->Sequence;
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



}


?>