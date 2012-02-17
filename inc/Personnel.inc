<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */


require_once("coreincs.inc");

class Personnel{
	private $LastName;
	private $FirstName;
	private $ShortName;
	private $Title;
	private $Address1;
	private $Address2;
	private $Address3;
	private $Institution;
	private $City;
	private $StateProvZip;
	private $Country;
	private $VoicePhone1;
	private $VoicePhone2;
	private $FaxPhone;
	private $Internet;
	private $PersonnelRecChangedDate;
	private $Notes;
	private $Group;
	private $PersonnelRecordDate;
	private $Project;
	private $PersonnelRecChangedBy;

	private function __construct()
	{
	}

	public function getLastName(){
		return $this->LastName;
	}

	public function getFirstName(){
		return $this->FirstName;
	}

	public function getShortName(){
		return $this->ShortName;
	}

	public function getTitle(){
		return $this->Title;
	}

	public function getAddress1(){
		return $this->Address1;
	}

	public function getAddress2(){
		return $this->Address2;
	}

	public function getAddress3(){
		return $this->Address3;
	}

	public function getInstitution(){
		return $this->Institution;
	}

	public function getCity(){
		return $this->City;
	}

	public function getStateProvZip(){
		return $this->StateProvZip;
	}

	public function getCountry(){
		return $this->Country;
	}

	public function getVoicePhone1(){
		return $this->VoicePhone1;
	}

	public function getVoicePhone2(){
		return $this->VoicePhone2;
	}

	public function getFaxPhone(){
		return $this->FaxPhone;
	}

	public function getInternet(){
		return $this->Internet;
	}

	public function getPersonnelRecChangedDate(){
		return $this->PersonnelRecChangedDate;
	}

	public function getNotes(){
		return $this->Notes;
	}

	public function getGroup(){
		return $this->Group;
	}

	public function getPersonnelRecordDate(){
		return $this->PersonnelRecordDate;
	}

	public function getProject(){
		return $this->Project;
	}

	public function getPersonnelRecChangedBy(){
		return $this->PersonnelRecChangedBy;
	}

}
?>