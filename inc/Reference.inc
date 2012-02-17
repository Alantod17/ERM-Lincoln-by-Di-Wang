<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */

require_once("coreincs.inc");

class Reference{
	private $ReferenceNo;
	private $ReferenceType;
	private $Author;
	private $Year;
	private $Title;
	private $Editor;
	private $JournalOrEditedBook;
	private $PlacePublished;
	private $Publisher;
	private $Volume;
	private $Pages;
	private $URL;
	private $AuthorIndex;
	private $TitleIndex;
	private $JournalOrEditedBookIndex;
	private $ReferenceRecordDate;
	private $ReferenceRecChangedDate;
	private $ReferenceRecChangedBy;

	private function __construct()
	{
	}

	public function getReferenceNo(){
		return $this->ReferenceNo;
	}

	public function getReferenceType(){
		return $this->ReferenceType;
	}

	public function getAuthor(){
		return $this->Author;
	}

	public function getYear(){
		return $this->Year;
	}

	public function getTitle(){
		return $this->Title;
	}

	public function getEditor(){
		return $this->Editor;
	}

	public function getJournalOrEditedBook(){
		return $this->JournalOrEditedBook;
	}

	public function getPlacePublished(){
		return $this->PlacePublished;
	}

	public function getPublisher(){
		return $this->Publisher;
	}

	public function getVolume(){
		return $this->Volume;
	}

	public function getPages(){
		return $this->Pages;
	}

	public function getURL(){
		return $this->URL;
	}

	public function getAuthorIndex(){
		return $this->AuthorIndex;
	}

	public function getTitleIndex(){
		return $this->TitleIndex;
	}

	public function getJournalOrEditedBookIndex(){
		return $this->JournalOrEditedBookIndex;
	}

	public function getReferenceRecordDate(){
		return $this->ReferenceRecordDate;
	}

	public function getReferenceRecChangedDate(){
		return $this->ReferenceRecChangedDate;
	}

	public function getReferenceRecChangedBy(){
		return $this->ReferenceRecChangedBy;
	}

}

?>