<?php

/**
 * Comp315 2011
 */

require_once("coreincs.inc");


	define("SecureLevelSystemAdmin",0);
	define("SecureLevelDataAdmin",5);
	define("SecureLevelWebUser",10);
	define("SecureLevelGuest",99);

class LogicManager{

	private $Result;


	public static function getSecureLevelSystemAdmin(){
		return SecureLevelSystemAdmin;
	}

	public static function getSecureLevelDataAdmin(){
		return SecureLevelDataAdmin;
	}

	public static function getSecureLevelWebUser(){
		return SecureLevelWebUser;
	}

	public static function getSecureLevelGuest(){
		return SecureLevelGuest;
	}

	public static function xmlSpecimen($key,$method){
		$Specimenarray =  DataManager::getSpecimen($key,$method);
	    Global $Result;
		foreach ($Specimenarray as $specimen ) {
			  $SpecimenCode = $specimen->getSpecimenCode();
			  $CollectionCode = $specimen->getCollectionCode();
			  $SpeciesCode = $specimen->getSpeciesCode();
			  $DeterminedBy = $specimen->getDeterminedBy();
			  $DateDetermined = $specimen->getDateDetermined();
			  $DateDetermined = LogicManager::DateAtoE($DateDetermined);
			  $Deposited = $specimen->getDeposited();
			  $Medium = $specimen->getMedium();
			  $Storage = $specimen->getStorage();
			  $Abundance = $specimen->getAbundance();
			  $StageSex = $specimen->getStageSex();
			  $PreparedBy = $specimen->getPreparedBy();
			  $DatePrepared = $specimen->getDatePrepared();
			  $DatePrepared = LogicManager::DateAtoE($DatePrepared);
			  $SpcmRecordDate = $specimen->getSpcmRecordDate();
			  $SpcmRecordDate = LogicManager::DateAtoE($SpcmRecordDate);
			  $AuxiliaryFields = $specimen->getAuxiliaryFields();
			  $DateDetFlag = $specimen->getDateDetFlag();
			  $DatePrepFlag = $specimen->getDatePrepFlag();
			  $TypeStatus = $specimen->getTypeStatus();
			  $SpcmRecChangedDate = $specimen->getSpcmRecChangedDate();
			  $SpcmRecChangedDate = LogicManager::DateAtoE($SpcmRecChangedDate);
			  $NumberImages = $specimen->getNumberImages();
			  $SpcmRecChangedBy = $specimen->getSpcmRecChangedBy();
			  $SpecimenCustom1 = $specimen->getSpecimenCustom1();
			  $SpecimenCustom2 = $specimen->getSpecimenCustom2();
			  $Genus = $specimen->getGenus();
			  $Family = $specimen->getFamily();
			  $Order = $specimen->getOrder();
			  $Classes = $specimen->getClasses();

			$SpecimenXML = $Result->addchild('Specimen');
			$SpecimenXML->addchild('SpecimenCode', htmlspecialchars($SpecimenCode));
			$SpecimenXML->addchild('SpeciesCode', htmlspecialchars($SpeciesCode));
			$SpecimenXML->addchild('Genus', htmlspecialchars($Genus));
			$SpecimenXML->addchild('Family', htmlspecialchars($Family));
			$SpecimenXML->addchild('Order', htmlspecialchars($Order));
			$SpecimenXML->addchild('Classes', htmlspecialchars($Classes));
			$SpecimenXML->addchild('TypeStatus', htmlspecialchars($TypeStatus));
			$SpecimenXML->addchild('StageSex', htmlspecialchars($StageSex));
			$SpecimenXML->addchild('Storage', htmlspecialchars($Storage));
			$SpecimenXML->addchild('Abundance', htmlspecialchars($Abundance));
			$SpecimenXML->addchild('DeterminedBy', htmlspecialchars($DeterminedBy));
			$SpecimenXML->addchild('DateDetermined', htmlspecialchars($DateDetermined));
			$SpecimenXML->addchild('Deposited', htmlspecialchars($Deposited));
			$SpecimenXML->addchild('Medium', htmlspecialchars($Medium));
			$SpecimenXML->addchild('CollectionCode', htmlspecialchars($CollectionCode));
			$SpecimenXML->addchild('PreparedBy', htmlspecialchars($PreparedBy));
			$SpecimenXML->addchild('DatePrepared', htmlspecialchars($DatePrepared));
			$SpecimenXML->addchild('SpcmRecordDate', htmlspecialchars($SpcmRecordDate));
			$SpecimenXML->addchild('AuxiliaryFields', htmlspecialchars($AuxiliaryFields));
			$SpecimenXML->addchild('DateDetFlag', htmlspecialchars($DateDetFlag));
			$SpecimenXML->addchild('DatePrepFlag', htmlspecialchars($DatePrepFlag));
			$SpecimenXML->addchild('SpcmRecChangedDate', htmlspecialchars($SpcmRecChangedDate));
			$SpecimenXML->addchild('NumberImages', htmlspecialchars($NumberImages));
			$SpecimenXML->addchild('SpcmRecChangedBy', htmlspecialchars($SpcmRecChangedBy));
			$SpecimenXML->addchild('SpecimenCustom1', htmlspecialchars($SpecimenCustom1));
			$SpecimenXML->addchild('SpecimenCustom2', htmlspecialchars($SpecimenCustom2));

		}

		return $Result;
	}

	public static function xmlSpecies($key,$method){
		$Speciesarray = DataManager::getSpecies($key,$method);
		Global $Result;
		foreach ($Speciesarray as $species ) {
			 $SpeciesCode = $species->getSpeciesCode();
			 $ValidSpCode = $species->getValidSpCode();
			 $SpeciesName = $species->getSpeciesName();
			 $Genus = $species->getGenus();
			 $SpeciesAuthor = $species->getSpeciesAuthor();
			 $Subgenus = $species->getSubgenus();
			 $NumberImages = $species->getNumberImages();
			 $SppRecordDate = $species->getSppRecordDate();
			 $SppRecordDate = LogicManager::DateAtoE($SppRecordDate);
			 $AuxiliaryFields = $species->getAuxiliaryFields();
			 $Subspecies = $species->getSubspecies();
			 $SubspAuthor = $species->getSubspAuthor();
			 $Variety = $species->getVariety();
			 $VarietyAuthor = $species->getVarietyAuthor();
			 $CommonName = $species->getCommonName();
			 $Distribution = $species->getDistribution();
			 $TypeLocality = $species->getTypeLocality();
			 $TypeDepository = $species->getTypeDepository();
			 $Section = $species->getSection();
			 $SppRecChangedDate = $species->getSppRecChangedDate();
			 $SppRecChangedDate = LogicManager::DateAtoE($SppRecChangedDate);
			 $SppRecChangedBy = $species->getSppRecChangedBy();

			$SpeciesXML = $Result->addChild('Species');
			$SpeciesXML->addchild('SpeciesCode', htmlspecialchars($SpeciesCode));
			$SpeciesXML->addchild('ValidSpCode', htmlspecialchars($ValidSpCode));
			$SpeciesXML->addchild('SpeciesName', htmlspecialchars($SpeciesName));
			$SpeciesXML->addchild('Genus', htmlspecialchars($Genus));
			$SpeciesXML->addchild('SpeciesAuthor', htmlspecialchars($SpeciesAuthor));
			$SpeciesXML->addchild('Subgenus', htmlspecialchars($Subgenus));
			$SpeciesXML->addchild('NumberImages', htmlspecialchars($NumberImages));
			$SpeciesXML->addchild('SppRecordDate', htmlspecialchars($SppRecordDate));
			$SpeciesXML->addchild('AuxiliaryFields', htmlspecialchars($AuxiliaryFields));
			$SpeciesXML->addchild('Subspecies', htmlspecialchars($Subspecies));
			$SpeciesXML->addchild('SubspAuthor', htmlspecialchars($SubspAuthor));
			$SpeciesXML->addchild('Variety', htmlspecialchars($Variety));
			$SpeciesXML->addchild('VarietyAuthor', htmlspecialchars($VarietyAuthor));
			$SpeciesXML->addchild('CommonName', htmlspecialchars($CommonName));
			$SpeciesXML->addchild('Distribution', htmlspecialchars($Distribution));
			$SpeciesXML->addchild('TypeLocality', htmlspecialchars($TypeLocality));
			$SpeciesXML->addchild('TypeDepository', htmlspecialchars($TypeDepository));
			$SpeciesXML->addchild('Section', htmlspecialchars($Section));
			$SpeciesXML->addchild('SppRecChangedDate', htmlspecialchars($SppRecChangedDate));
			$SpeciesXML->addchild('SppRecChangedBy', htmlspecialchars($SppRecChangedBy));

		}

		return $Result;
	}

	public Static Function xmlClass($key,$method){
		$Classarray = DataManager::getClass($key,$method);
		Global $Result;
		foreach ($Classarray as $Classes ) {
			$Class = $Classes->getClass();
			$Subphylum = $Classes->getSubphylum();
			$Phylum = $Classes->getPhylum();
			$ClassCustom1 = $Classes->getClassCustom1();
			$ClassCustom2 = $Classes->getClassCustom2();

			$ClassXML = $Result->addChild('Class');
			$ClassXML->addchild('Class', htmlspecialchars($Class));
			$ClassXML->addchild('Subphylum', htmlspecialchars($Subphylum));
			$ClassXML->addchild('Phylum', htmlspecialchars($Phylum));
			$ClassXML->addchild('ClassCustom1', htmlspecialchars($ClassCustom1));
			$ClassXML->addchild('ClassCustom2', htmlspecialchars($ClassCustom2));
		}

		return $Result;
	}

	public static function xmlCollection($key,$method){
		$Collectionarray = DataManager::getCollection($key,$method);
		Global $Result;
		foreach ($Collectionarray as $Collection) {
			 $CollectionCode = $Collection->getCollectionCode();
			 $Method = $Collection->getMethod();
			 $CollectedBy = $Collection->getCollectedBy();
			 $DateCollected = $Collection->getDateCollected();
			 $DateCollected = LogicManager::DateAtoE($DateCollected);
			 $Site = $Collection->getSite();
			 $XCoordinate = $Collection->getXCoordinate();
			 $YCoordinate = $Collection->getYCoordinate();
			 $HostSpcmCode = $Collection->getHostSpcmCode();
			 $LocalityCode = $Collection->getLocalityCode();
			 $Source = $Collection->getSource();
			 $XYAccuracy = $Collection->getXYAccuracy();
			 $CollRecordDate = $Collection->getCollRecordDate();
			 $CollRecordDate = LogicManager::DateAtoE($CollRecordDate);
			 $AuxiliaryFields = $Collection->getAuxiliaryFields();
			 $DateCollFlag = $Collection->getDateCollFlag();
			 $DateCollEnd = $Collection->getDateCollEnd();
			 $DateCollEnd = LogicManager::DateAtoE($DateCollEnd);
			 $DateCollEndFlag = $Collection->getDateCollEndFlag();
			 $CollRecChangedDate = $Collection->getCollRecChangedDate();
			 $CollRecChangedDate = LogicManager::DateAtoE($CollRecChangedDate);
			 $NumberImages = $Collection->getNumberImages();
			 $CollRecChangedBy = $Collection->getCollRecChangedBy();

			$CollectiionXML = $Result->addChild('Collection');
			$CollectiionXML->addchild('CollectionCode', htmlspecialchars($CollectionCode));
			$CollectiionXML->addchild('Method',htmlspecialchars($Method));
			$CollectiionXML->addchild('CollectedBy', htmlspecialchars($CollectedBy));
			$CollectiionXML->addchild('DateCollected', htmlspecialchars($DateCollected));
			$CollectiionXML->addchild('Site', htmlspecialchars($Site));
			$CollectiionXML->addchild('XCoordinate', htmlspecialchars($XCoordinate));
			$CollectiionXML->addchild('YCoordinate', htmlspecialchars($YCoordinate));
			$CollectiionXML->addchild('HostSpcmCode', htmlspecialchars($HostSpcmCode));
			$CollectiionXML->addchild('LocalityCode', htmlspecialchars($LocalityCode));
			$CollectiionXML->addchild('Source', htmlspecialchars($Source));
			$CollectiionXML->addchild('XYAccuracy', htmlspecialchars($XYAccuracy));
			$CollectiionXML->addchild('CollRecordDate', htmlspecialchars($CollRecordDate));
			$CollectiionXML->addchild('AuxiliaryFields', htmlspecialchars($AuxiliaryFields));
			$CollectiionXML->addchild('DateCollFlag', htmlspecialchars($DateCollFlag));
			$CollectiionXML->addchild('DateCollEnd', htmlspecialchars($DateCollEnd));
			$CollectiionXML->addchild('DateCollEndFlag', htmlspecialchars($DateCollEndFlag));
			$CollectiionXML->addchild('CollRecChangedDate', htmlspecialchars($CollRecChangedDate));
			$CollectiionXML->addchild('NumberImages', htmlspecialchars($NumberImages));
			$CollectiionXML->addchild('CollRecChangedBy', htmlspecialchars($CollRecChangedBy));

		}

		return $Result;
	}

	public static function xmlCollectionNotes($key,$method){
		$CollectionNotearray = DataManager::getCollectionNote($key,$method);
		Global $Result;
		foreach ($CollectionNotearray as $CollectionNote) {
			$CollectionCode = $CollectionNote->getCollectionCode();
			$NoteDate = $CollectionNote->getNoteDate();
			$NoteDate = LogicManager::DateAtoE($NoteDate);
			$NoteBy = $CollectionNote->getNoteBy();
			$NoteText = $CollectionNote->getNoteText();
			$Null = $CollectionNote->getNull();

			$CollectionNoteXML = $Result->addchild('CollectionNotes');
			$CollectionNoteXML->addchild('CollectionCode', htmlspecialchars($CollectionCode));
			$CollectionNoteXML->addchild('NoteDate', htmlspecialchars($NoteDate));
			$CollectionNoteXML->addchild('NoteBy', htmlspecialchars($NoteBy));
			$CollectionNoteXML->addchild('NoteText', htmlspecialchars($NoteText));
			$CollectionNoteXML->addchild('Null', htmlspecialchars($Null));
		}

		return $Result;
	}

	public static function xmlDetHistory($key,$method){
		$DetHistoryarray = DataManager::getDetHistory($key,$method);
		Global $Result;
		foreach ($DetHistoryarray as $dethistory) {
			 $SpecimenCode = $dethistory->getSpecimenCode();
			 $SpeciesCode = $dethistory->getSpeciesCode();
			 $Genus = $dethistory->getGenus();
			 $SpeciesName = $dethistory->getSpeciesName();
			 $SpeciesAuthor = $dethistory->getSpeciesAuthor();
			 $DeterminedBy = $dethistory->getDeterminedBy();
			 $DateDetermined = $dethistory->getDateDetermined();
			 $DateDetermined = LogicManager::DateAtoE($DateDetermined);
			 $WhereChanged = $dethistory->getWhereChanged();
			 $DateChanged = $dethistory->getDateChanged();
			 $DateChanged = LogicManager::DateAtoE($DateChanged);
			 $ChangedBy = $dethistory->getChangedBy();
			 $DateDetFlag = $dethistory->getDateDetFlag();
			 $Sequence = $dethistory->getSequence();
			 $Subspecies = $dethistory->getSubspecies();
			 $SubspAuthor = $dethistory->getSubspAuthor();
			 $Variety = $dethistory->getVariety();
			 $VarietyAuthor = $dethistory->getVarietyAuthor();

			$DetHistoryXML = $Result->addchild('DetHistory');
			$DetHistoryXML->addchild('SpecimenCode',htmlspecialchars($SpecimenCode));
			$DetHistoryXML->addchild('SpeciesCode',htmlspecialchars($SpeciesCode));
			$DetHistoryXML->addchild('Genus',htmlspecialchars($Genus));
			$DetHistoryXML->addchild('SpeciesName',htmlspecialchars($SpeciesName));
			$DetHistoryXML->addchild('SpeciesAuthor',htmlspecialchars($SpeciesAuthor));
			$DetHistoryXML->addchild('DeterminedBy',htmlspecialchars($DeterminedBy));
			$DetHistoryXML->addchild('DateDetermined',htmlspecialchars($DateDetermined));
			$DetHistoryXML->addchild('WhereChanged',htmlspecialchars($WhereChanged));
			$DetHistoryXML->addchild('DateChanged',htmlspecialchars($DateChanged));
			$DetHistoryXML->addchild('ChangedBy',htmlspecialchars($ChangedBy));
			$DetHistoryXML->addchild('DateDetFlag',htmlspecialchars($DateDetFlag));
			$DetHistoryXML->addchild('Sequence',htmlspecialchars($Sequence));
			$DetHistoryXML->addchild('Subspecies',htmlspecialchars($Subspecies));
			$DetHistoryXML->addchild('SubspAuthor',htmlspecialchars($SubspAuthor));
			$DetHistoryXML->addchild('Variety',htmlspecialchars($Variety));
			$DetHistoryXML->addchild('VarietyAuthor',htmlspecialchars($VarietyAuthor));


		}

		return $Result;
	}

	public static function xmlFamily($key,$method){
		$Familyarray = DataManager::getFamily($key,$method);
		Global $Result;
		foreach ($Familyarray as $family ) {
			$Family = $family->getFamily();
			$Superfamily = $family->getSuperfamily();
			$Order = $family->getOrder();
			$Suborder = $family->getSuborder();
			$FamilyCustom1 = $family->getFamilyCustom1();
			$FamilyCustom2 = $family->getFamilyCustom2();
			$FamilyCustom3 = $family->getFamilyCustom3();

			$FamilyXML = $Result->addChild('Family');
			$FamilyXML->addchild('Family', htmlspecialchars($Family));
			$FamilyXML->addchild('Superfamily', htmlspecialchars($Superfamily));
			$FamilyXML->addchild('Order', htmlspecialchars($Order));
			$FamilyXML->addchild('Suborder', htmlspecialchars($Suborder));
			$FamilyXML->addchild('FamilyCustom1', htmlspecialchars($FamilyCustom1));
			$FamilyXML->addchild('FamilyCustom2', htmlspecialchars($FamilyCustom2));
			$FamilyXML->addchild('FamilyCustom3', htmlspecialchars($FamilyCustom3));
		}

		return $Result;
	}

	public static function xmlGenus($key,$method){
		$Genusarray = DataManager::getGenus($key,$method);
		Global $Result;
		foreach ($Genusarray as $genus ) {
			 $Genus = $genus->getGenus();
			 $Tribe = $genus->getTribe();
			 $Family = $genus->getFamily();
			 $Subfamily = $genus->getSubfamily();
			 $GenusCustom1 = $genus->getGenusCustom1();
			 $GenusCustom2 = $genus->getGenusCustom2();
			 $GenusCustom3 = $genus->getGenusCustom3();

			$GenusXML = $Result->addchild('Genus');
			$GenusXML->addchild('Genus',htmlspecialchars($Genus));
			$GenusXML->addchild('Tribe',htmlspecialchars($Tribe));
			$GenusXML->addchild('Family',htmlspecialchars($Family));
			$GenusXML->addchild('Subfamily',htmlspecialchars($Subfamily));
			$GenusXML->addchild('GenusCustom1',htmlspecialchars($GenusCustom1));
			$GenusXML->addchild('GenusCustom2',htmlspecialchars($GenusCustom2));
			$GenusXML->addchild('GenusCustom3',htmlspecialchars($GenusCustom3));
		}

		return $Result;
	}

	public static function xmlGroup($key,$method){
		$Grouparray = DataManager::getGroup($key,$method);
		Global $Result;
		foreach ($Grouparray as $group ) {
			$GroupName  = $group->getGroupName();
			$ShortName  = $group->getShortName();
			$MemberNumber  = $group->getMemberNumber();

			$GroupXML = $Result->addchild('Group');
			$GroupXML->addchild('GroupName',htmlspecialchars($GroupName));
			$GroupXML->addchild('ShortName',htmlspecialchars($ShortName));
			$GroupXML->addchild('MemberNumber',htmlspecialchars($MemberNumber));
		}

		return $Result;
	}

	public static function xmlKingdom($key,$method){
		$Kingdomarray = DataManager::getKingdom($key,$method);
		Global $Result;
		foreach ($Kingdomarray as $kingdom ) {
			$Kingdom = $kingdom->getKingdom();
			$Superkingdom = $kingdom->getSuperkingdom();
			$KingdomCustom1 = $kingdom->getKingdomCustom1();
			$KingdomCustom2 = $kingdom->getKingdomCustom2();

			$KingdomXML = $Result->addchild('Kingdom');
			$KingdomXML->addchild('Kingdom',htmlspecialchars($Kingdom));
			$KingdomXML->addchild('Superkingdom',htmlspecialchars($Superkingdom));
			$KingdomXML->addchild('KingdomCustom1',htmlspecialchars($KingdomCustom1));
			$KingdomXML->addchild('KingdomCustom1',htmlspecialchars($KingdomCustom1));

		}

		return $Result;
	}

	public static function xmlLoans($key,$method){
		$Loansarray = DataManager::getLoans($key,$method);
		Global $Result;
		foreach ($Loansarray as $loan ) {
			 $LoanCode = $loan->getLoanCode();
			 $SpecimenCode = $loan->getSpecimenCode();
			 $DateLoaned = $loan->getDateLoaned();
			 $DateLoaned = LogicManager::DateAtoE($DateLoaned);
			 $DateDue = $loan->getDateDue();
			 $DateDue = LogicManager::DateAtoE($DateDue);
			 $Borrower = $loan->getBorrower();
			 $LoanPeriod = $loan->getLoanPeriod();
			 $Returnednum = $loan->getReturned();
			 if ($Returnednum==1) {
			 	$Returned="Returned";
			 }
			else{
				$Returned="OnLoan";
			}
			 $Description = $loan->getDescription();
			 $NumberLent = $loan->getNumberLent();
			 $NumberReturned = $loan->getNumberReturned();
			 $LoanRecordDate = $loan->getLoanRecordDate();
			 $LoanRecChangedDate = $loan->getLoanRecChangedDate();
		     $LoanRecChangedDate = LogicManager::DateAtoE($LoanRecChangedDate);

			$LoansXML = $Result->addChild('Loans');
			$LoansXML->addchild('LoanCode',htmlspecialchars($LoanCode));
			$LoansXML->addchild('SpecimenCode',htmlspecialchars($SpecimenCode));
			$LoansXML->addchild('DateLoaned',htmlspecialchars($DateLoaned));
			$LoansXML->addchild('DateDue',htmlspecialchars($DateDue));
			$LoansXML->addchild('Borrower',htmlspecialchars($Borrower));
			$LoansXML->addchild('LoanPeriod',htmlspecialchars($LoanPeriod));
			$LoansXML->addchild('Returned',htmlspecialchars($Returned));
			$LoansXML->addchild('Description',htmlspecialchars($Description));
			$LoansXML->addchild('NumberLent',htmlspecialchars($NumberLent));
			$LoansXML->addchild('NumberReturned',htmlspecialchars($NumberReturned));
			$LoansXML->addchild('LoanRecordDate',htmlspecialchars($LoanRecordDate));
			$LoansXML->addchild('LoanRecChangedDate',htmlspecialchars($LoanRecChangedDate));

		}

		return $Result;
	}

	public static function xmlLoansNotes($key,$method){
		$LoansNotesarray = DataManager::getLoansNote($key,$method);
		Global $Result;
		foreach ($LoansNotesarray as $loannote ) {
			$LoanCode = $loannote->getLoanCode();
			$NoteDate = $loannote->getNoteDate();
			$NoteDate = LogicManager::DateAtoE($NoteDate);
			$NoteBy = $loannote->getNoteBy();
			$NoteText = $loannote->getNoteText();
			$Null = $loannote->getNull();


			$LoanNoteXML = $Result->addChild('LoansNotes');
			$LoanNoteXML->addchild('LoanCode',htmlspecialchars($LoanCode));
			$LoanNoteXML->addchild('NoteDate',htmlspecialchars($NoteDate));
			$LoanNoteXML->addchild('NoteBy',htmlspecialchars($NoteBy));
			$LoanNoteXML->addchild('NoteText',htmlspecialchars($NoteText));
			$LoanNoteXML->addchild('Null',htmlspecialchars($Null));

		}

		return $Result;
	}

	public static function xmlLocality($key,$method){
		$Localityarray = DataManager::getLocality($key,$method);
		Global $Result;
		foreach ($Localityarray as $locality) {
			 $LocalityCode = $locality->getLocalityCode();
			 $StateProvince = $locality->getStateProvince();
			 $Country = $locality->getCountry();
			 $Latitude = $locality->getLatitude();
			 $Longitude = $locality->getLongitude();
			 $Elevation = $locality->getElevation();
			 $District = $locality->getDistrict();
			 $LocalityName = $locality->getLocalityName();
			 $LocRecordDate = $locality->getLocRecordDate();
			 $LocRecordDate = LogicManager::DateAtoE($LocRecordDate);
			 $AuxiliaryFields = $locality->getAuxiliaryFields();
			 $LatLongAccuracy = $locality->getLatLongAccuracy();
			 $AltCoordinate1 = $locality->getAltCoordinate1();
			 $AltCoordinate2 = $locality->getAltCoordinate2();
			 $AltCoordinate3 = $locality->getAltCoordinate3();
			 $LocRecChangedDate = $locality->getLocRecChangedDate();
			 $LocRecChangedDate = LogicManager::DateAtoE($LocRecChangedDate);
			 $NumberImages = $locality->getNumberImages();
			 $LocalityNameIndex = $locality->getLocalityNameIndex ();
			 $LocRecChangedBy = $locality->getLocRecChangedBy();

			$LocalityXML = $Result->addChild('Locality');
			$LocalityXML->addchild('LocalityCode',htmlspecialchars($LocalityCode));
			$LocalityXML->addchild('StateProvince',htmlspecialchars($StateProvince));
			$LocalityXML->addchild('Country',htmlspecialchars($Country));
			$LocalityXML->addchild('Latitude',htmlspecialchars($Latitude));
			$LocalityXML->addchild('Longitude',htmlspecialchars($Longitude));
			$LocalityXML->addchild('Elevation',htmlspecialchars($Elevation));
			$LocalityXML->addchild('District',htmlspecialchars($District));
			$LocalityXML->addchild('LocalityName',htmlspecialchars($LocalityName));
			$LocalityXML->addchild('LocRecordDate',htmlspecialchars($LocRecordDate));
			$LocalityXML->addchild('AuxiliaryFields',htmlspecialchars($AuxiliaryFields));
			$LocalityXML->addchild('LatLongAccuracy',htmlspecialchars($LatLongAccuracy));
			$LocalityXML->addchild('AltCoordinate1',htmlspecialchars($AltCoordinate1));
			$LocalityXML->addchild('AltCoordinate2',htmlspecialchars($AltCoordinate2));
			$LocalityXML->addchild('AltCoordinate3',htmlspecialchars($AltCoordinate3));
			$LocalityXML->addchild('LocRecChangedDate',htmlspecialchars($LocRecChangedDate));
			$LocalityXML->addchild('NumberImages',htmlspecialchars($NumberImages));
			$LocalityXML->addchild('LocalityNameIndex',htmlspecialchars($LocalityNameIndex));
			$LocalityXML->addchild('LocRecChangedBy',htmlspecialchars($LocRecChangedBy));

		}

		return $Result;
	}

	public static function xmlLocalityNotes($key,$method){
		$LocalityNotesarray = DataManager::getLocalityNote($key,$method);
		Global $Result;
		foreach ($LocalityNotesarray as $locality ) {
			$LocalityCode = $locality->getLocalityCode();
			$NoteDate = $locality->getNoteDate();
			$NoteDate = LogicManager::DateAtoE($NoteDate);
			$NoteBy = $locality->getNoteBy();
			$NoteText = $locality->getNoteText();
			$Null = $locality->getNull();


			$LocalityNoteXML = $Result->addChild('LocalityNotes');
			$LocalityNoteXML->addchild('LocalityCode',htmlspecialchars($LocalityCode));
			$LocalityNoteXML->addchild('NoteDate',htmlspecialchars($NoteDate));
			$LocalityNoteXML->addchild('NoteBy',htmlspecialchars($NoteBy));
			$LocalityNoteXML->addchild('NoteText',htmlspecialchars($NoteText));
			$LocalityNoteXML->addchild('Null',htmlspecialchars($Null));

		}

		return $Result;
	}

	public static function xmlOrder($key,$method){
		$Orderarray = DataManager::getOrder($key,$method);
		Global $Result;
		foreach ($Orderarray as $order) {
			 $Order = $order->getOrder();
			 $Superorder = $order->getSuperorder();
			 $Class = $order->getClass();
			 $SubClass = $order->getSubClass();
			 $OrderCustom1 = $order->getOrderCustom1();
			 $OrderCustom2 = $order->getOrderCustom2();
			 $OrderCustom3 = $order->getOrderCustom3();

			$OrderXML = $Result->addchild('Order');
			$OrderXML->addchild('Order',htmlspecialchars($Order));
			$OrderXML->addchild('Superorder',htmlspecialchars($Superorder));
			$OrderXML->addchild('Class',htmlspecialchars($Class));
			$OrderXML->addchild('SubClass',htmlspecialchars($SubClass));
			$OrderXML->addchild('OrderCustom1',htmlspecialchars($OrderCustom1));
			$OrderXML->addchild('OrderCustom2',htmlspecialchars($OrderCustom2));
			$OrderXML->addchild('OrderCustom3',htmlspecialchars($OrderCustom3));

		}

		return $Result;
	}

	public static function xmlPersonnel($key,$method){
		$Personnelarray = DataManager::getPersonnel($key,$method);
		Global $Result;
		foreach ($Personnelarray as $personnel) {
			 $LastName = $personnel->getLastName();
			 $FirstName = $personnel->getFirstName();
			 $ShortName = $personnel->getShortName();
			 $Title = $personnel->getTitle();
			 $Address1 = $personnel->getAddress1();
			 $Address2 = $personnel->getAddress2();
			 $Address3 = $personnel->getAddress3();
			 $Institution = $personnel->getInstitution();
			 $City = $personnel->getCity();
			 $StateProvZip = $personnel->getStateProvZip();
			 $Country = $personnel->getCountry();
			 $VoicePhone1 = $personnel->getVoicePhone1();
			 $VoicePhone2 = $personnel->getVoicePhone2();
			 $FaxPhone = $personnel->getFaxPhone();
			 $Internet = $personnel->getInternet();
			 $PersonnelRecChangedDate = $personnel->getPersonnelRecChangedDate();
			 $PersonnelRecChangedDate = LogicManager::DateAtoE($PersonnelRecChangedDate);
			 $Notes = $personnel->getNotes();
			 $Group = $personnel->getGroup();
			 $PersonnelRecordDate = $personnel->getPersonnelRecordDate();
			 $PersonnelRecordDate = LogicManager::DateAtoE($PersonnelRecordDate);
			 $Project = $personnel->getProject();
			 $PersonnelRecChangedBy = $personnel->getPersonnelRecChangedBy();

			$PersonnelXML = $Result->addchild('Personnel');
			$PersonnelXML->addchild('LastName',htmlspecialchars($LastName));
			$PersonnelXML->addchild('FirstName',htmlspecialchars($FirstName));
			$PersonnelXML->addchild('ShortName',htmlspecialchars($ShortName));
			$PersonnelXML->addchild('Title',htmlspecialchars($Title));
			$PersonnelXML->addchild('Address1',htmlspecialchars($Address1));
			$PersonnelXML->addchild('Address2',htmlspecialchars($Address2));
			$PersonnelXML->addchild('Address3',htmlspecialchars($Address3));
			$PersonnelXML->addchild('Institution',htmlspecialchars($Institution));
			$PersonnelXML->addchild('City',htmlspecialchars($City));
			$PersonnelXML->addchild('StateProvZip',htmlspecialchars($StateProvZip));
			$PersonnelXML->addchild('Country',htmlspecialchars($Country));
			$PersonnelXML->addchild('VoicePhone1',htmlspecialchars($VoicePhone1));
			$PersonnelXML->addchild('VoicePhone2',htmlspecialchars($VoicePhone2));
			$PersonnelXML->addchild('FaxPhone',htmlspecialchars($FaxPhone));
			$PersonnelXML->addchild('Internet',htmlspecialchars($Internet));
			$PersonnelXML->addchild('PersonnelRecChangedDate',htmlspecialchars($PersonnelRecChangedDate));
			$PersonnelXML->addchild('Notes',htmlspecialchars($Notes));
			$PersonnelXML->addchild('Group',htmlspecialchars($Group));
			$PersonnelXML->addchild('PersonnelRecordDate',htmlspecialchars($PersonnelRecordDate));
			$PersonnelXML->addchild('Project',htmlspecialchars($Project));
			$PersonnelXML->addchild('PersonnelRecChangedBy',htmlspecialchars($PersonnelRecChangedBy));

		}

		return $Result;
	}

	public static function xmlPhylum($key,$method){
		$Phylumarray = DataManager::getPhylum($key,$method);
		Global $Result;
		foreach ($Phylumarray as $phylum) {
			 $Phylum = $phylum->getPhylum();
			 $Subkingdom = $phylum->getSubkingdom();
			 $Kingdom  = $phylum->getKingdom();
			 $PhylumCustom1 = $phylum->getPhylumCustom1();
			 $PhylumCustom2 = $phylum->getPhylumCustom2();

			$PhylumXML = $Result->addchild('Phylum');
			$PhylumXML->addchild('Phylum',htmlspecialchars($Phylum));
			$PhylumXML->addchild('Subkingdom',htmlspecialchars($Subkingdom));
			$PhylumXML->addchild('Kingdom',htmlspecialchars($Kingdom));
			$PhylumXML->addchild('PhylumCustom1',htmlspecialchars($PhylumCustom1));
			$PhylumXML->addchild('PhylumCustom2',htmlspecialchars($PhylumCustom2));

		}

		return $Result;
	}

	public static function xmlProject($key,$method){
		$Projectarray = DataManager::getProject($key,$method);
		Global $Result;
		foreach ($Projectarray as $project ) {
			$ProjectName = $project->getProjectName();
			$ProjectShortName = $project->getProjectShortName();
			$Note = $project->getNote();
			$Heading = $project->getHeading();
			$ProjectRecordDate = $project->getProjectRecordDate();
			$ProjectRecChangedDate = $project->getProjectRecChangedDate();
			$ProjectRecChangedDate = LogicManager::DateAtoE($ProjectRecChangedDate);
			$Active = $project->getActive();
			$ProjectRecChangedBy = $project->getProjectRecChangedBy();

			$ProjectXML = $Result->addChild('Project');
			$ProjectXML->addchild('ProjectName',htmlspecialchars($ProjectName));
			$ProjectXML->addchild('ProjectShortName',htmlspecialchars($ProjectShortName));
			$ProjectXML->addchild('Note',htmlspecialchars($Note));
			$ProjectXML->addchild('Heading',htmlspecialchars($Heading));
			$ProjectXML->addchild('ProjectRecordDate',htmlspecialchars($ProjectRecordDate));
			$ProjectXML->addchild('ProjectRecChangedDate',htmlspecialchars($ProjectRecChangedDate));
			$ProjectXML->addchild('Active',htmlspecialchars($Active));
			$ProjectXML->addchild('ProjectRecChangedBy',htmlspecialchars($ProjectRecChangedBy));

		}

		return $Result;


	}

	public static function xmlReference($key,$method){
		$Referencearray = DataManager::getReference($key,$method);
		Global $Result;
		foreach ($Referencearray as $reference) {
			 $ReferenceNo = $reference->getReferenceNo();
			 $ReferenceType = $reference->getReferenceType();
			 $Author = $reference->getAuthor();
			 $Year = $reference->getYear();
			 $Title = $reference->getTitle();
			 $Editor = $reference->getEditor();
			 $JournalOrEditedBook = $reference->getJournalOrEditedBook();
			 $PlacePublished = $reference->getPlacePublished();
			 $Publisher = $reference->getPublisher();
			 $Volume = $reference->getVolume();
			 $Pages = $reference->getPages();
			 $URL = $reference->getURL();
			 $AuthorIndex = $reference->getAuthorIndex();
			 $TitleIndex = $reference->getTitleIndex();
			 $JournalOrEditedBookIndex = $reference->getJournalOrEditedBookIndex();
			 $ReferenceRecordDate = $reference->getReferenceRecordDate();
			$ReferenceRecordDate = LogicManager::DateAtoE($ReferenceRecordDate);
			 $ReferenceRecChangedDate = $reference->getReferenceRecChangedDate();
			 $ReferenceRecChangedDate = LogicManager::DateAtoE($ReferenceRecChangedDate);
			 $ReferenceRecChangedBy = $reference->getReferenceRecChangedBy();

			$ReferenceXML = $Result->addChild('Reference');
			$ReferenceXML->addchild('ReferenceNo',htmlspecialchars($ReferenceNo));
			$ReferenceXML->addchild('ReferenceType',htmlspecialchars($ReferenceType));
			$ReferenceXML->addchild('Author',htmlspecialchars($Author));
			$ReferenceXML->addchild('Year',htmlspecialchars($Year));
			$ReferenceXML->addchild('Title',htmlspecialchars($Title));
			$ReferenceXML->addchild('Editor',htmlspecialchars($Editor));
			$ReferenceXML->addchild('JournalOrEditedBook',htmlspecialchars($JournalOrEditedBook));
			$ReferenceXML->addchild('PlacePublished',htmlspecialchars($PlacePublished));
			$ReferenceXML->addchild('Publisher',htmlspecialchars($Publisher));
			$ReferenceXML->addchild('Volume',htmlspecialchars($Volume));
			$ReferenceXML->addchild('Pages',htmlspecialchars($Pages));
			$ReferenceXML->addchild('URL',htmlspecialchars($URL));
			$ReferenceXML->addchild('AuthorIndex',htmlspecialchars($AuthorIndex));
			$ReferenceXML->addchild('TitleIndex',htmlspecialchars($TitleIndex));
			$ReferenceXML->addchild('JournalOrEditedBookIndex',htmlspecialchars($JournalOrEditedBookIndex));
			$ReferenceXML->addchild('ReferenceRecordDate',htmlspecialchars($ReferenceRecordDate));
			$ReferenceXML->addchild('ReferenceRecChangedDate',htmlspecialchars($ReferenceRecChangedDate));
			$ReferenceXML->addchild('ReferenceRecChangedBy',htmlspecialchars($ReferenceRecChangedBy));

		}

		return $Result;
	}

	public static function xmlReferenceLinks($key,$method){
		$ReferenceLinksarray = DataManager::getReferenceLinks($key,$method);
		Global $Result;
		foreach ($ReferenceLinksarray as $referencelink) {
			$TableName = $referencelink->getTableName();
			$RecordCode = $referencelink->getRecordCode();
			$ReferenceNo = $referencelink->getReferenceNo();

			$ReferencelinkXML = $Result->addChild('ReferenceLinks');
			$ReferencelinkXML->addchild('TableName',htmlspecialchars($TableName));
			$ReferencelinkXML->addchild('RecordCode',htmlspecialchars($RecordCode));
			$ReferencelinkXML->addchild('ReferenceNo',htmlspecialchars($ReferenceNo));
		}

		Return $Result;

	}

	public static function xmlSpeciesNotes($key,$method){
		$SpeciesNotesarray = DataManager::getSpeciesNotes($key,$method);
		Global $Result;
		foreach ($SpeciesNotesarray as $speciesnotes) {
			$SpeciesCode = $speciesnotes->getSpeciesCode();
			$NoteDate = $speciesnotes->getNoteDate();
			$NoteDate = LogicManager::DateAtoE($NoteDate);
			$NoteBy = $speciesnotes->getNoteBy();
			$NoteText = $speciesnotes->getNoteText();
			$Null = $speciesnotes->getNull();

			$SpeciesNotesXML = $Result->addchild('SpeciesNotes');
			$SpeciesNotesXML->addchild('SpeciesCode',htmlspecialchars($SpeciesCode));
			$SpeciesNotesXML->addchild('NoteDate',htmlspecialchars($NoteDate));
			$SpeciesNotesXML->addchild('NoteBy',htmlspecialchars($NoteBy));
			$SpeciesNotesXML->addchild('NoteText',htmlspecialchars($NoteText));
			$SpeciesNotesXML->addchild('Null',htmlspecialchars($Null));
		}

		return $Result;
	}

	public static function xmlSpecimenNotes($key,$method){
		$SpecimenNotesarray = DataManager::getSpecimenNotes($key,$method);
		Global $Result;
		foreach ($SpecimenNotesarray as $specimennotes) {
			$SpecimenCode = $specimennotes->getSpecimenCode();
			$NoteDate = $specimennotes->getNoteDate();
			$NoteDate = LogicManager::DateAtoE($NoteDate);
			$NoteBy = $specimennotes->getNoteBy();
			$NoteText = $specimennotes->getNoteText();
			$Null = $specimennotes->getNull();

			$SpecimenNotesXML = $Result->addchild('SpecimenNotes');
			$SpecimenNotesXML->addchild('SpecimenCode',htmlspecialchars($SpecimenCode));
			$SpecimenNotesXML->addchild('NoteDate',htmlspecialchars($NoteDate));
			$SpecimenNotesXML->addchild('NoteBy',htmlspecialchars($NoteBy));
			$SpecimenNotesXML->addchild('NoteText',htmlspecialchars($NoteText));
			$SpecimenNotesXML->addchild('Null',htmlspecialchars($Null));
		}

		return $Result;
	}

	public static function xmlImageArchive($key,$method) {
		$ImageArchivearray = DataManager::getImageArchive($key,$method);
		Global $Result;
		foreach ($ImageArchivearray as $imagearchive ) {
			$ImageNumber = $imagearchive->getImageNumber();
			$ImageName = $imagearchive->getImageName();
			$PathToFile = $imagearchive->getPathToFile();
			$ImageNote = $imagearchive->getImageNote();
			$SpecimenNo = $imagearchive->getSpecimenNo();

			$ImageArchiveXML = $Result->addchild('ImageArchive');
			$ImageArchiveXML->addchild('ImageNumber',htmlspecialchars($ImageNumber));
			$ImageArchiveXML->addchild('ImageName',htmlspecialchars($ImageName));
			$ImageArchiveXML->addchild('PathToFile',htmlspecialchars($PathToFile));
			$ImageArchiveXML->addchild('ImageNote',htmlspecialchars($ImageNote));
			$ImageArchiveXML->addchild('SpecimenNo',htmlspecialchars($SpecimenNo));
		}

		return $Result;
	}

	public static function xmlOutput($method,$table="",$keyword=""){
		if ($table == "") {
			$table = "Any";
		}
		Global $Result;
		$Result = new SimpleXMLElement('<Result></Result>');
		if ($method == "Listing" or $method == "Searching") {

		switch ($table) {
			case "Class":
				return self::xmlClass($keyword,$method);
				break;
			case "Collection":
				return self::xmlCollection($keyword,$method);
				break;
			case "Collectionnotes":
				return self::xmlCollectionnotes($keyword,$method);
				break;
			case "DetHistory":
				return self::xmlDetHistory($keyword,$method);
				break;
			case "Family":
				return self::xmlFamily($keyword,$method);
				break;
			case "Genus":
				return self::xmlGenus($keyword,$method);
				break;
			case "Group":
				return self::xmlGroup($keyword,$method);
				break;
			case "Kingdom":
				return self::xmlKingdom($keyword,$method);
				break;
			case "Loans":
				return self::xmlLoans($keyword,$method);
				break;
			case "LoansNotes":
				return self::xmlLoansNotes($keyword,$method);
				break;
			case "Locality":
				return self::xmlLocality($keyword,$method);
				break;
			case "LocalityNotes":
				return self::xmlLocalityNotes($keyword,$method);
				break;
			case "Order":
				return self::xmlOrder($keyword,$method);
				break;
			case "Personnel":
				return self::xmlPersonnel($keyword,$method);
				break;
			case "Phylum":
				return self::xmlPhylum($keyword,$method);
				break;
			case "Project":
				return self::xmlProject($keyword,$method);
				break;
			case "Reference":
				return self::xmlReference($keyword,$method);
				break;
			case "ReferenceLinks":
				return self::xmlReferenceLinks($keyword,$method);
				break;
			case "Species":
				return self::xmlSpecies($keyword,$method);
				break;
			case "SpeciesNotes":
				return self::xmlSpeciesNotes($keyword,$method);
				break;
			case "Specimen":
				return self::xmlSpecimen($keyword,$method);
				break;
			case "SpecimenNotes":
				return self::xmlSpecimenNotes($keyword,$method);
				break;
			case "ImageArchive":
				return self::xmlImageArchive($keyword,$method);
				break;
			case "Any":
				self::xmlSpecimen($keyword,$method);
				self::xmlClass($keyword,$method);
				self::xmlCollection($keyword,$method);
				self::xmlCollectionnotes($keyword,$method);
				self::xmlDetHistory($keyword,$method);
				self::xmlFamily($keyword,$method);
				self::xmlGenus($keyword,$method);
				self::xmlGroup($keyword,$method);
				self::xmlKingdom($keyword,$method);
				self::xmlLoans($keyword,$method);
				self::xmlLoansNotes($keyword,$method);
				self::xmlLocality($keyword,$method);
				self::xmlLocalityNotes($keyword,$method);
				self::xmlOrder($keyword,$method);
				self::xmlPersonnel($keyword,$method);
				self::xmlPhylum($keyword,$method);
				self::xmlProject($keyword,$method);
				self::xmlReference($keyword,$method);
				self::xmlReferenceLinks($keyword,$method);
				self::xmlSpecies($keyword,$method);
				self::xmlSpeciesNotes($keyword,$method);
				self::xmlSpecimenNotes($keyword,$method);
				return $Result;
				break;
			default:
				;
		}
		}
		else {
			$Result->addchild('Sorry_Method_Wrong');
			return $Result;
		}



	}

	public static function TableList(){
		return DataManager::TableList();
	}

	public static function getWebUsers(){
		return DataManager::getWebUsers();
	}

	public static function addClass($Class,$Subphylum,$Phylum,$ClassCustom1,$ClassCustom2){
		$addOK = DataManager::addClass($Class,$Subphylum,$Phylum,$ClassCustom1,$ClassCustom2);
		return $addOK;
	}

	public static function addCollection($CollectionCode,$Method,$CollectedBy,$DateCollected,$Site,$XCoordinate,$YCoordinate,$HostSpcmCode,$LocalityCode,$Source,$XYAccuracy,$CollRecordDate,$AuxiliaryFields,$DateCollFlag,$DateCollEnd,$DateCollEndFlag,$CollRecChangedDate,$NumberImages,$CollRecChangedBy){
		$addOK = DataManager::addCollection($CollectionCode,$Method,$CollectedBy,$DateCollected,$Site,$XCoordinate,$YCoordinate,$HostSpcmCode,$LocalityCode,$Source,$XYAccuracy,$CollRecordDate,$AuxiliaryFields,$DateCollFlag,$DateCollEnd,$DateCollEndFlag,$CollRecChangedDate,$NumberImages,$CollRecChangedBy);
		return $addOK;
	}

	public static function addCollectionNotes($CollectionCode,$NoteDate,$NoteBy,$NoteText,$Null){
		$addOK = DataManager::addCollectionNotes($CollectionCode,$NoteDate,$NoteBy,$NoteText,$Null);
		return $addOK;
	}

	public static function addDetHistory($SpecimenCode,$SpeciesCode,$Genus,$SpeciesName,$SpeciesAuthor,$DeterminedBy,$DateDetermined,$WhereChanged,$DateChanged,$ChangedBy,$DateDetFlag,$Sequence,$Subspecies,$SubspAuthor,$Variety,$VarietyAuthor){
		$addOK = DataManager::addDetHistory($SpecimenCode,$SpeciesCode,$Genus,$SpeciesName,$SpeciesAuthor,$DeterminedBy,$DateDetermined,$WhereChanged,$DateChanged,$ChangedBy,$DateDetFlag,$Sequence,$Subspecies,$SubspAuthor,$Variety,$VarietyAuthor);
		return $addOK;
	}

	public static function addFamily($Family,$Superfamily,$Order,$Suborder,$FamilyCustom1,$FamilyCustom2,$FamilyCustom3){
		$addOK = DataManager::addFamily($Family,$Superfamily,$Order,$Suborder,$FamilyCustom1,$FamilyCustom2,$FamilyCustom3);
		return $addOK;
	}

	public static function addGenus($Genus,$Tribe,$Family,$Subfamily,$GenusCustom1,$GenusCustom2,$GenusCustom3){
		$addOK = DataManager::addGenus($Genus,$Tribe,$Family,$Subfamily,$GenusCustom1,$GenusCustom2,$GenusCustom3);
		return $addOK;
	}

	public static function addGroup($GroupName,$ShortName,$MemberNumber){
		$addOK = DataManager::addGroup($GroupName,$ShortName,$MemberNumber);
		return $addOK;
	}

//	public static function addImageArchive($ImageNumber,$ImageName,$PathToFile,$ImageNote,$SpecimenNo){
//		$addOK = DataManager::addImageArchive($ImageNumber,$ImageName,$PathToFile,$ImageNote,$SpecimenNo);
//		return $addOK;
//	}

	public static function addKingdom($Kingdom,$Superkingdom,$KingdomCustom1,$KingdomCustom2){
		$addOK = DataManager::addKingdom($Kingdom,$Superkingdom,$KingdomCustom1,$KingdomCustom2);
		return $addOK;
	}

	public static function addLoansBiota($LoanCode,$DateLoaned,$Borrower,$LoanPeriod,$Description,$NumberLent,$NumberReturned,$LoanRecordDate,$LoanRecChangedDate){
		$addOK = DataManager::addLoansBiota($LoanCode,$DateLoaned,$Borrower,$LoanPeriod,$Description,$NumberLent,$NumberReturned,$LoanRecordDate,$LoanRecChangedDate);
		return $addOK;
	}

	public static function addLoans($LoanCode,$SpecimenCode,$DateLoaned,$DateDue,$Borrower,$LoanPeriod,$Returned,$Description,$NumberLent,$NumberReturned,$LoanRecordDate,$LoanRecChangedDate){
		$addOK = DataManager::addLoans($LoanCode,$SpecimenCode,$DateLoaned,$DateDue,$Borrower,$LoanPeriod,$Returned,$Description,$NumberLent,$NumberReturned,$LoanRecordDate,$LoanRecChangedDate);
		return $addOK;
	}

	public static function addLoansNotes($LoanCode,$NoteDate,$NoteBy,$NoteText,$Null){
		$addOK = DataManager::addLoansNotes($LoanCode,$NoteDate,$NoteBy,$NoteText,$Null);
		return $addOK;
	}

	public static function addLocality($LocalityCode,$StateProvince,$Country,$Latitude,$Longitude,$Elevation,$District,$LocalityName,$LocRecordDate,$AuxiliaryFields,$LatLongAccuracy,$AltCoordinate1,$AltCoordinate2,$AltCoordinate3,$LocRecChangedDate,$NumberImages,$LocalityNameIndex,$LocRecChangedBy){

		$addOK = DataManager::addLocality($LocalityCode,$StateProvince,$Country,$Latitude,$Longitude,$Elevation,$District,$LocalityName,$LocRecordDate,$AuxiliaryFields,$LatLongAccuracy,$AltCoordinate1,$AltCoordinate2,$AltCoordinate3,$LocRecChangedDate,$NumberImages,$LocalityNameIndex,$LocRecChangedBy);

		return $addOK;
	}

	public static function addLocalityNotes($LocalityCode,$NoteDate,$NoteBy,$NoteText,$Null){
		$addOK = DataManager::addLocalityNotes($LocalityCode,$NoteDate,$NoteBy,$NoteText,$Null);
		return $addOK;
	}

	public static function addOrder($Order,$Superorder,$Class,$SubClass,$OrderCustom1,$OrderCustom2,$OrderCustom3){
		$addOK = DataManager::addOrder($Order,$Superorder,$Class,$SubClass,$OrderCustom1,$OrderCustom2,$OrderCustom3);
		return $addOK;
	}

	public static function addPersonnel($LastName,$FirstName,$ShortName,$Title,$Address1,$Address2,$Address3,$Institution,$City,$StateProvZip,$Country,$VoicePhone1,$VoicePhone2,$FaxPhone,$Internet,$PersonnelRecChangedDate,$Notes,$Group,$PersonnelRecordDate,$Project,$PersonnelRecChangedBy){
		$addOK = DataManager::addPersonnel($LastName,$FirstName,$ShortName,$Title,$Address1,$Address2,$Address3,$Institution,$City,$StateProvZip,$Country,$VoicePhone1,$VoicePhone2,$FaxPhone,$Internet,$PersonnelRecChangedDate,$Notes,$Group,$PersonnelRecordDate,$Project,$PersonnelRecChangedBy);
		return $addOK;
	}

	public static function addPhylum($Phylum,$Subkingdom,$Kingdom,$PhylumCustom1,$PhylumCustom2){
		$addOK = DataManager::addPhylum($Phylum,$Subkingdom,$Kingdom,$PhylumCustom1,$PhylumCustom2);
		return $addOK;
	}

	public static function addProject($ProjectName,$ProjectShortName,$Note,$Heading,$ProjectRecordDate,$ProjectRecChangedDate,$Active,$ProjectRecChangedBy){
		$addOK = DataManager::addProject($ProjectName,$ProjectShortName,$Note,$Heading,$ProjectRecordDate,$ProjectRecChangedDate,$Active,$ProjectRecChangedBy);
		return $addOK;
	}

	public static function addReference($ReferenceNo,$ReferenceType,$Author,$Year,$Title,$Editor,$JournalOrEditedBook,$PlacePublished,$Publisher,$Volume,$Pages,$URL,$AuthorIndex,$TitleIndex,$JournalOrEditedBookIndex,$ReferenceRecordDate,$ReferenceRecChangedDate,$ReferenceRecChangedBy){
		$addOK = DataManager::addReference($ReferenceNo,$ReferenceType,$Author,$Year,$Title,$Editor,$JournalOrEditedBook,$PlacePublished,$Publisher,$Volume,$Pages,$URL,$AuthorIndex,$TitleIndex,$JournalOrEditedBookIndex,$ReferenceRecordDate,$ReferenceRecChangedDate,$ReferenceRecChangedBy);
		return $addOK;
	}

	public static function addReferenceLinksBiota($TableNumber,$RecordCode,$ReferenceNo){
		$addOK = DataManager::addReferenceLinksBiota($TableNumber,$RecordCode,$ReferenceNo);
		return $addOK;
	}

	public static function addReferenceLinks($TableName,$RecordCode,$ReferenceNo){
		$addOK = DataManager::addReferenceLinks($TableName,$RecordCode,$ReferenceNo);
		return $addOK;
	}

	public static function addSpecies($SpeciesCode,$ValidSpCode,$SpeciesName,$Genus,$SpeciesAuthor,$Subgenus,$NumberImages,$SppRecordDate,$AuxiliaryFields,$Subspecies,$SubspAuthor,$Variety,$VarietyAuthor,$CommonName,$Distribution,$TypeLocality,$TypeDepository,$Section,$SppRecChangedDate,$SppRecChangedBy){
		$addOK = DataManager::addSpecies($SpeciesCode,$ValidSpCode,$SpeciesName,$Genus,$SpeciesAuthor,$Subgenus,$NumberImages,$SppRecordDate,$AuxiliaryFields,$Subspecies,$SubspAuthor,$Variety,$VarietyAuthor,$CommonName,$Distribution,$TypeLocality,$TypeDepository,$Section,$SppRecChangedDate,$SppRecChangedBy);
		return $addOK;
	}

	public static function addSpeciesNotes($SpeciesCode,$NoteDate,$NoteBy,$NoteText,$Null){
		$addOK = DataManager::addSpeciesNotes($SpeciesCode,$NoteDate,$NoteBy,$NoteText,$Null);
		return $addOK;
	}

	public static function addSpecimenBiota($SpecimenCode,$CollectionCode,$SpeciesCode,$DeterminedBy,$DateDetermined,$Deposited,$Medium,$Storage,$Abundance,$StageSex,$PreparedBy,$DatePrepared,$SpcmRecordDate,$AuxiliaryFields,$DateDetFlag,$DatePrepFlag,$TypeStatus,$SpcmRecChangedDate,$NumberImages,$SpcmRecChangedBy,$SpecimenCustom1,$SpecimenCustom2){
		$addOK = DataManager::addSpecimenBiota($SpecimenCode,$CollectionCode,$SpeciesCode,$DeterminedBy,$DateDetermined,$Deposited,$Medium,$Storage,$Abundance,$StageSex,$PreparedBy,$DatePrepared,$SpcmRecordDate,$AuxiliaryFields,$DateDetFlag,$DatePrepFlag,$TypeStatus,$SpcmRecChangedDate,$NumberImages,$SpcmRecChangedBy,$SpecimenCustom1,$SpecimenCustom2);
		return $addOK;
	}

	public static function addSpecimen($SpecimenCode,$CollectionCode,$SpeciesCode,$DeterminedBy,$DateDetermined,$Deposited,$Medium,$Storage,$Abundance,$StageSex,$PreparedBy,$DatePrepared,$SpcmRecordDate,$AuxiliaryFields,$DateDetFlag,$DatePrepFlag,$TypeStatus,$SpcmRecChangedDate,$NumberImages,$SpcmRecChangedBy,$SpecimenCustom1,$SpecimenCustom2,$Genus,$Family,$Order,$Classes){
		$addOK = DataManager::addSpecimen($SpecimenCode,$CollectionCode,$SpeciesCode,$DeterminedBy,$DateDetermined,$Deposited,$Medium,$Storage,$Abundance,$StageSex,$PreparedBy,$DatePrepared,$SpcmRecordDate,$AuxiliaryFields,$DateDetFlag,$DatePrepFlag,$TypeStatus,$SpcmRecChangedDate,$NumberImages,$SpcmRecChangedBy,$SpecimenCustom1,$SpecimenCustom2,$Genus,$Family,$Order,$Classes);
		return $addOK;
	}

	public static function addSpecimenNotes($SpecimenCode,$NoteDate,$NoteBy,$NoteText,$Null){
		$addOK = DataManager::addSpecimenNotes($SpecimenCode,$NoteDate,$NoteBy,$NoteText,$Null);
		return $addOK;
	}

	public static function addWebUsers($UserName,$UserPassword,$SecureLevel,$Person){
		$addOK = DataManager::addWebUsers($UserName,$UserPassword,$SecureLevel,$Person);
		return $addOK;
	}

	public static function DeleteWithOnePK ($TableName,$PKFiled,$PKValue){
		$DeleteOK = DataManager::DeleteWithOnePK($TableName,$PKFiled,$PKValue);
		return $DeleteOK;
	}

	public static function DeleteWithTwoPK ($TableName,$PKFiled1,$PKValue1,$PKFiled2,$PKValue2){
		$DeleteOK = DataManager::DeleteWithTwoPK ($TableName,$PKFiled1,$PKValue1,$PKFiled2,$PKValue2);
		return $DeleteOK;
	}

	public static function DeleteWithThreePK ($TableName,$PKFiled1,$PKValue1,$PKFiled2,$PKValue2,$PKFiled3,$PKValue3){
		$DeleteOK = DataManager::DeleteWithThreePK ($TableName,$PKFiled1,$PKValue1,$PKFiled2,$PKValue2,$PKFiled3,$PKValue3);
		return $DeleteOK;
	}

	public static function DeleteNotes($TableName,$NoteFiledType,$NoteCode,$NoteDate,$NoteBy,$NoteText){
		$DeleteOK = DataManager::DeleteNotes($TableName,$NoteFiledType,$NoteCode,$NoteDate,$NoteBy,$NoteText);
		return $DeleteOK;
	}

	public static function getUser($Username,$Password){
		return DataManager::getUser($Username,$Password);
	}

	public static function getLocality($LocalityCode){
		return DataManager::getRecordWithOnePK("Locality","LocalityCode",$LocalityCode,"Locality");
	}

	public static function SecureLevelButton($UserSecureLevel){

		if ($UserSecureLevel<SecureLevelWebUser) {
			return $DataAdminButton = "<input type='submit' name='submit' value='Add a New Record' onclick='AddConfirm();return false;'/>
                                <input type='submit' name='submit' value='Edit This Record' onclick='EdiConfirm();return false;'/>
                                <input type='submit' name='submit' value='Delete This Record' onclick='DelConfirm();return false;'/>
                                <input type='reset' name='reset' value='reset' />";
		}
        elseif ($UserSecureLevel<SecureLevelGuest) {
	        return $DataAdminButton = "<input type='submit' name='submit' value='Add a New Record' onclick='AddConfirm();return false;'/>
                                <input type='submit' name='submit' value='Edit This Record' onclick='EdiConfirm();return false;'/>
                                <input type='reset' name='reset' value='reset' />";
        }
	}

	public static function DateAtoE($date){
		if ($date!=NULL) {
			$Datearr = explode("-",$date);
	        $EDate = $Datearr[2]."-".$Datearr[1]."-".$Datearr[0];
		    return $EDate;
		}

	}

	public static function DateEtoA($date){
		if ($date!=NULL) {
			$Datearr = explode("-",$date);
			$ADate = $Datearr[2]."-".$Datearr[1]."-".$Datearr[0];
			return $ADate;
		}
	}

	public static function CK_EDate($date){
		$dateArr = explode("-", $date);
		if (is_numeric($dateArr[0]) && is_numeric($dateArr[1]) && is_numeric($dateArr[2])) {
			return checkdate($dateArr[1],$dateArr[0],$dateArr[2]);
		}
		return false;
	}

	public static function CK_ADate($date){
		$dateArr = explode("-", $date);
		if (is_numeric($dateArr[0]) && is_numeric($dateArr[1]) && is_numeric($dateArr[2])) {
			return checkdate($dateArr[1],$dateArr[2],$dateArr[0]);
		}
		return false;
	}

	public static function CKRecordExistwithOnePK($tablename,$PKFiledName,$PKValue,$ClassName){
		$Record = DataManager::getRecordWithOnePK($tablename,$PKFiledName,$PKValue,$ClassName);
		if ($Record!=FALSE) {
			return true;
		}
		else{
			return FALSE;
		}
	}

	public static function CKRecordExistwithTwoPK($TableName,$PKFiled1,$PKValue1,$PKFiled2,$PKValue2,$ClassName){
		$Record = DataManager::getRecordWithTwoPK ($TableName,$PKFiled1,$PKValue1,$PKFiled2,$PKValue2,$ClassName);
		if ($Record!=FALSE) {
			return true;
		}
		else{
			return FALSE;
		}
	}

	public static function CKRecordExistwithThreePK($TableName,$PKFiled1,$PKValue1,$PKFiled2,$PKValue2,$PKFiled3,$PKValue3,$ClassName){
		$Record = DataManager::getRecordWithThreePK ($TableName,$PKFiled1,$PKValue1,$PKFiled2,$PKValue2,$PKFiled3,$PKValue3,$ClassName);
		if ($Record!=FALSE) {
			return true;
		}
		else{
			return FALSE;
		}
	}

	public static function CKRecordExistwithFourPK($TableName,$PKFiled1,$PKValue1,$PKFiled2,$PKValue2,$PKFiled3,$PKValue3,$PKFiled4,$PKValue4,$ClassName){
		$Record = DataManager::getRecordWithFourPK ($TableName,$PKFiled1,$PKValue1,$PKFiled2,$PKValue2,$PKFiled3,$PKValue3,$PKFiled4,$PKValue4,$ClassName);
		if ($Record!=FALSE) {
			return true;
		}
		else{
			return FALSE;
		}
	}

	public static function bigtosmallimg($file,$path,$w=120,$h=90)
	{
		$img=$path.$file;
		$imgarr=getimagesize($img);
		$sw=$imgarr[0];
		$sh=$imgarr[1];
		$stype=$imgarr[2];

		if($sw/$sh>$w/$h){
			$mw=$w;
			$mh=(int)$sh*($w/$sw);
		}
		else{
			$mw=(int)$sw*($h/$sh);
			$mh=$h;
		}
		switch($stype){
			case 1:
				$srcf = imagecreatefromgif($img);
				break;
			case 2:
				$srcf = imagecreatefromjpeg($img);
				break;
			case 3:
				$srcf = imagecreatefrompng($img);
				break;
			default:
				showmsg('Program Error');
				break;
		}
		$desf =imagecreatetruecolor($mw,$mh);
		imagecopyresampled($desf,$srcf,0,0,0,0,$mw,$mh,$sw,$sh);
		$sm_name=$path."s_".$file;
		switch($stype){
			case 1:
				imagegif($desf,$sm_name);
				break;
			case 2:
				imagejpeg($desf,$sm_name);
				break;
			case 3:
				imagepng($desf,$sm_name);
				break;
			default:
				showmsg('Can not creat ' . $stype . ' small Picture');
				break;
		}
		imagedestroy($desf);
		imagedestroy($srcf);
	}

	public static function addImageArchive($ImageName,$SmallImageName,$PathToFile,$SpecimenNo){
		$addOK = DataManager::addImageArchive($ImageName,$SmallImageName,$PathToFile,$SpecimenNo);
		return $addOK;

	}

	public static function getImageArchive($SpecimenNo){
		return DataManager::getImageArchive($SpecimenNo);

	}

	public static function CKSpecimenCanLoan($SpecimenNo){
		$Loansarray = DataManager::getLoansBySpecimenNo($SpecimenNo);
		$canLoan = true;
		foreach ($Loansarray as $loan) {
			$loanstaus = $loan->getReturned();
			if ($loanstaus==0) {
				$canLoan = FALSE;
			}
		}
		return $canLoan;
	}

	public static function getLoansDueToday(){
		return DataManager::getLoansDueToday();
	}

	public static function updateImageArchive($SpecimenNO,$OldSpecimenNO){
		$updateOK = DataManager::updateImageArchive($SpecimenNO,$OldSpecimenNO);
		return $updateOK;
	}

	public static function ListofSpecimen(){
		return DataManager::getSpecimen("","Listing");
	}

	public static function getSpeciesNameByCode($SpeciesCode){
		$Species = DataManager::getRecordWithOnePK("Species","SpeciesCode",$SpeciesCode,"Species");
		$SpeciesName = $Species->getSpeciesName();
		return $SpeciesName;
	}

	public static function updateLoan($SpecimenNO,$OldSpecimenNO){
		$updateOK = DataManager::updateLoan($SpecimenNO,$OldSpecimenNO);
		return $updateOK;
	}

	public static function updateReturnLoan($SpecimenNO){
		$updateOK = DataManager::updateReturnLoan($SpecimenNO);
		return $updateOK;
	}

	public static function getSpecimenReferences($SpecimenNO){
		$ReferenceLinks = DataManager::getReferenceLinksbyRecodeCodeandTableName($SpecimenNO,"Specimen");
		$Referencearray = array();
		foreach ($ReferenceLinks as $RefLink) {
			$ReferenceNO = $RefLink->getReferenceNo();
			$Reference=DataManager::getRecordWithOnePK("Reference","ReferenceNo",$ReferenceNO,"Reference");
			array_push($Referencearray,$Reference);
		}
		return $Referencearray;
	}

	public static function getCollectionLocality($SQL){
		return DataManager::getCollectionLocality($SQL);
	}





}
?>