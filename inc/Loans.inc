<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */


require_once("coreincs.inc");

class Loans{
	private $LoanCode;
	private $SpecimenCode;
	private $DateLoaned;
	private $DateDue;
	private $Borrower;
	private $LoanPeriod;
	private $Returned;
	private $Description;
	private $NumberLent;
	private $NumberReturned;
	private $LoanRecordDate;
	private $LoanRecChangedDate;

	private function __construct()
	{
	}

	public function getLoanCode(){
		return $this->LoanCode;
	}

	public function getSpecimenCode(){
		return $this->SpecimenCode;
	}

	public function getDateLoaned(){
		return $this->DateLoaned;
	}

	public function getDateDue(){
		return $this->DateDue;
	}


	public function getBorrower(){
		return $this->Borrower;
	}

	public function getLoanPeriod(){
		return $this->LoanPeriod;
	}

	public function getReturned(){
		return $this->Returned;
	}

	public function getDescription(){
		return $this->Description;
	}

	public function getNumberLent(){
		return $this->NumberLent;
	}

	public function getNumberReturned(){
		return $this->NumberReturned;
	}

	public function getLoanRecordDate(){
		return $this->LoanRecordDate;
	}

	public function getLoanRecChangedDate(){
		return $this->LoanRecChangedDate;
	}

}

?>