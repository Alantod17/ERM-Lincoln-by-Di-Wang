<?php

/**
 * Comp315 2011
 */

require_once("coreincs.inc");

class DataManager{

	public static function getSpecimen($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
			$SQLSTMT = $DBH->prepare("SELECT * FROM specimen WHERE SpecimenCode like '%$key%' or CollectionCode like '%$key%' or SpeciesCode like '%$key%' or DeterminedBy like '%$key%' or DateDetermined like '%$key%' or Deposited like '%$key%' or Medium like '%$key%' or Storage like '%$key%' or Abundance like '%$key%' or StageSex like '%$key%' or PreparedBy like '%$key%' or DatePrepared like '%$key%' or SpcmRecordDate like '%$key%' or AuxiliaryFields like '%$key%' or DateDetFlag like '%$key%' or DatePrepFlag like '%$key%' or TypeStatus like '%$key%' or SpcmRecChangedDate like '%$key%' or NumberImages like '%$key%' or SpcmRecChangedBy like '%$key%' or SpecimenCustom1 like '%$key%' or SpecimenCustom2 like '%$key%' or Genus like '%$key%' or Family like '%$key%' or `Order` like '%$key%' or Class like '%$key%'   ");
	//	    $SQLSTMT->bindParam(':key', $key);
		}
		elseif ($method == "Listing") {
			$SQLSTMT = $DBH->prepare("SELECT * FROM specimen");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Specimen');
		return $SQLSTMT->fetchAll();

	}

	public static function getSpecies($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		    $SQLSTMT = $DBH->prepare("SELECT * FROM species WHERE SpeciesCode like '%$key%' or ValidSpCode like '%$key%' or SpeciesName like '%$key%' or Genus like '%$key%' or SpeciesAuthor like '%$key%' or Subgenus like '%$key%' or NumberImages like '%$key%' or SppRecordDate like '%$key%' or AuxiliaryFields like '%$key%' or Subspecies like '%$key%' or SubspAuthor like '%$key%' or Variety like '%$key%' or VarietyAuthor like '%$key%' or CommonName like '%$key%' or Distribution like '%$key%' or TypeLocality like '%$key%' or TypeDepository like '%$key%' or Section like '%$key%' or SppRecChangedDate like '%$key%' or SppRecChangedBy like '%$key%'   ");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif ($method == "Listing") {
			$SQLSTMT = $DBH->prepare("SELECT * FROM species");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Species');
		return $SQLSTMT->fetchAll();

	}

	public static function getClass($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM `Class` WHERE `Class` like '%$key%' or Subphylum like '%$key%' or Phylum like '%$key%' or ClassCustom1 like '%$key%' or ClassCustom1 like '%$key%' ");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif ($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM `Class`");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Classes');
		return $SQLSTMT->fetchAll();

	}

	public static function getCollection($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM Collection WHERE CollectionCode like '%$key%' or Method like '%$key%' or CollectedBy like '%$key%' or DateCollected like '%$key%' or Site like '%$key%' or XCoordinate like '%$key%' or YCoordinate like '%$key%' or HostSpcmCode like '%$key%' or LocalityCode like '%$key%' or Source like '%$key%' or XYAccuracy like '%$key%' or CollRecordDate like '%$key%' or AuxiliaryFields like '%$key%' or DateCollFlag like '%$key%' or DateCollEnd like '%$key%' or DateCollEndFlag like '%$key%' or CollRecChangedDate like '%$key%' or NumberImages like '%$key%' or CollRecChangedBy like '%$key%' ");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM Collection");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Collection');
		return $SQLSTMT->fetchAll();

	}

	public static function getCollectionNote($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM `collectionnotes` WHERE `CollectionCode` like '%$key%' or NoteDate like '%$key%' or NoteBy like '%$key%' or NoteText like '%$key%' ");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM `collectionnotes`");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'CollectionNote');
		return $SQLSTMT->fetchAll();

	}

	public static function getDetHistory($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM DetHistory WHERE SpecimenCode like '%$key%' or SpeciesCode like '%$key%' or Genus like '%$key%' or SpeciesName like '%$key%' or SpeciesAuthor like '%$key%' or DeterminedBy like '%$key%' or DateDetermined like '%$key%' or WhereChanged like '%$key%' or DateChanged like '%$key%' or ChangedBy like '%$key%' or DateDetFlag like '%$key%' or Sequence like '%$key%' or Subspecies like '%$key%' or SubspAuthor like '%$key%' or Variety like '%$key%' or VarietyAuthor like '%$key%' ");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM DetHistory");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'DetHistory');
		return $SQLSTMT->fetchAll();

	}

	public static function getFamily($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM Family WHERE Family like '%$key%' or Superfamily like '%$key%' or `Order` like '%$key%' or Suborder like '%$key%' or FamilyCustom1 like '%$key%' or FamilyCustom2 like '%$key%' or FamilyCustom3 like '%$key%'");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM Family");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Family');
		return $SQLSTMT->fetchAll();

	}

	public static function getGenus($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM genus WHERE Genus like '%$key%' or Tribe like '%$key%' or Family like '%$key%' or Subfamily like '%$key%' or GenusCustom1 like '%$key%' or GenusCustom2 like '%$key%' or GenusCustom3 like '%$key%'");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM genus");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Genus');
		return $SQLSTMT->fetchAll();

	}

	public static function getGroup($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM `group` WHERE GroupName like '%$key%' or ShortName like '%$key%' or MemberNumber like '%$key%'");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM `group`");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Group');
		return $SQLSTMT->fetchAll();

	}

	public static function getKingdom($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM kingdom WHERE Kingdom like '%$key%' or Superkingdom like '%$key%' or KingdomCustom1 like '%$key%' or KingdomCustom2 like '%$key%' ");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM kingdom");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Kingdom');
		return $SQLSTMT->fetchAll();

	}

	public static function getLoans($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM loans WHERE LoanCode like '%$key%' or DateLoaned like '%$key%' or Borrower like '%$key%' or LoanPeriod like '%$key%' or Description like '%$key%' or NumberLent like '%$key%' or NumberReturned like '%$key%' or LoanRecordDate like '%$key%' or LoanRecChangedDate like '%$key%' order by `Returned`, `DateDue` DESC");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM `loans` order by `Returned`, `DateDue` DESC");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Loans');
		return $SQLSTMT->fetchAll();

	}

	public static function getLoansNote($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM loansnotes WHERE LoanCode like '%$key%' or NoteDate like '%$key%' or NoteBy like '%$key%' or NoteText like '%$key%'");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM loansnotes");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'LoansNote');
		return $SQLSTMT->fetchAll();

	}

	public static function getLocality($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM Locality WHERE LocalityCode like '%$key%' or StateProvince like '%$key%' or Country like '%$key%' or Latitude like '%$key%' or Longitude like '%$key%' or Elevation like '%$key%' or District like '%$key%' or LocalityName like '%$key%' or LocRecordDate like '%$key%' or AuxiliaryFields like '%$key%' or LatLongAccuracy like '%$key%' or AltCoordinate1 like '%$key%' or AltCoordinate2 like '%$key%' or AltCoordinate3 like '%$key%' or LocRecChangedDate like '%$key%' or NumberImages like '%$key%' or LocalityNameIndex like '%$key%' or LocRecChangedBy like '%$key%'");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM Locality");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Locality');
		return $SQLSTMT->fetchAll();

	}

	public static function getLocalityNote($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM localitynotes WHERE LocalityCode like '%$key%' or NoteDate like '%$key%' or NoteBy like '%$key%' or NoteText like '%$key%'");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM localitynotes");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'LocalityNote');
		return $SQLSTMT->fetchAll();

	}

	public static function getOrder($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM `order` WHERE `Order` like '%$key%' or Superorder like '%$key%' or Class like '%$key%' or SubClass like '%$key%' or OrderCustom1 like '%$key%' or OrderCustom2 like '%$key%' or OrderCustom3 like '%$key%'");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM `order`");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Order');
		return $SQLSTMT->fetchAll();

	}

	public static function getPersonnel($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM Personnel WHERE LastName like '%$key%' or FirstName like '%$key%' or ShortName like '%$key%' or Title like '%$key%' or Address1 like '%$key%' or Address2 like '%$key%' or Address3 like '%$key%' or Institution like '%$key%' or City like '%$key%' or StateProvZip like '%$key%' or Country like '%$key%' or VoicePhone1 like '%$key%' or VoicePhone2 like '%$key%' or FaxPhone like '%$key%' or Internet like '%$key%' or PersonnelRecChangedDate like '%$key%' or Notes like '%$key%' or `Group` like '%$key%' or PersonnelRecordDate like '%$key%' or Project like '%$key%' or PersonnelRecChangedBy like '%$key%'");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM Personnel");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Personnel');
		return $SQLSTMT->fetchAll();

	}

	public static function getPhylum($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM `Phylum` WHERE `Phylum` like '%$key%' or Subkingdom like '%$key%' or Kingdom like '%$key%' or PhylumCustom1 like '%$key%' or PhylumCustom2 like '%$key%' ");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM `Phylum`");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Phylum');
		return $SQLSTMT->fetchAll();

	}

	public static function getProject($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM `Project` WHERE `ProjectName` like '%$key%' or ProjectShortName like '%$key%' or Note like '%$key%' or Heading like '%$key%' or ProjectRecordDate like '%$key%' or ProjectRecChangedDate like '%$key%' or Active like '%$key%' or ProjectRecChangedBy like '%$key%' ");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM `Project`");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Project');
		return $SQLSTMT->fetchAll();

	}

	public static function getReference($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM Reference WHERE ReferenceNo like '%$key%' or ReferenceType like '%$key%' or Author like '%$key%' or `Year` like '%$key%' or Title like '%$key%' or Editor like '%$key%' or JournalOrEditedBook like '%$key%' or PlacePublished like '%$key%' or Publisher like '%$key%' or Volume like '%$key%' or Pages like '%$key%' or URL like '%$key%' or AuthorIndex like '%$key%' or TitleIndex like '%$key%' or JournalOrEditedBookIndex like '%$key%' or ReferenceRecordDate like '%$key%' or ReferenceRecChangedDate like '%$key%' or `ReferenceRecChangedBy` like '%$key%' ");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM Reference");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Reference');
		return $SQLSTMT->fetchAll();

	}

	public static function getReferenceLinks($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM ReferenceLinks WHERE TableNumber like '%$key%' or RecordCode like '%$key%' or ReferenceNo like '%$key%'");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM ReferenceLinks");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'ReferenceLinks');
		return $SQLSTMT->fetchAll();

	}

	public static function getSpeciesNotes($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM SpeciesNotes WHERE SpeciesCode like '%$key%' or NoteDate like '%$key%' or NoteBy like '%$key%' or NoteText like '%$key%'");
		//	$SQLSTMT->bindParam(':key', $key);

		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM SpeciesNotes");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'SpeciesNotes');
		return $SQLSTMT->fetchAll();

	}

	public static function getSpecimenNotes($key,$method){
		$DBH = DBManager::getDBConnection();
		if ($method == "Searching") {
		$SQLSTMT = $DBH->prepare("SELECT * FROM SpecimenNotes WHERE SpecimenCode like '%$key%' or NoteDate like '%$key%' or NoteBy like '%$key%' or NoteText like '%$key%'");
		//	$SQLSTMT->bindParam(':key', $key);
		}
		elseif($method == "Listing"){
		$SQLSTMT = $DBH->prepare("SELECT * FROM SpecimenNotes");
		}
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'SpecimenNotes');
		return $SQLSTMT->fetchAll();

	}

	public static function getImageArchive($key){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("SELECT * FROM imagearchive WHERE SpecimenNo = '$key'");
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'ImageArchive');
		return $SQLSTMT->fetchAll();
	}

	public static function getWebUsers(){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("SELECT * FROM `webusers`");
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'WebUsers');
		return $SQLSTMT->fetchAll();
	}

	public static function TableList(){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("SELECT * FROM webusetablelist");
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Table');
		return $SQLSTMT->fetchAll();
	}

	public static function addClass($Class,$Subphylum,$Phylum,$ClassCustom1,$ClassCustom2){

		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO class(Class,Subphylum,Phylum,ClassCustom1,ClassCustom2) VALUES (:Class,:Subphylum,:Phylum,:ClassCustom1,:ClassCustom2)");
		$SQLSTMT->bindParam(':Class', $Class);
		$SQLSTMT->bindParam(':Subphylum', $Subphylum);
		$SQLSTMT->bindParam(':Phylum', $Phylum);
		$SQLSTMT->bindParam(':ClassCustom1', $ClassCustom1);
		$SQLSTMT->bindParam(':ClassCustom2', $ClassCustom2);
		$addOK = $SQLSTMT->execute();
		return $addOK;

	}

	public static function addCollection($CollectionCode,$Method,$CollectedBy,$DateCollected,$Site,$XCoordinate,$YCoordinate,$HostSpcmCode,$LocalityCode,$Source,$XYAccuracy,$CollRecordDate,$AuxiliaryFields,$DateCollFlag,$DateCollEnd,$DateCollEndFlag,$CollRecChangedDate,$NumberImages,$CollRecChangedBy){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO collection(CollectionCode,Method,CollectedBy,DateCollected,Site,XCoordinate,YCoordinate,HostSpcmCode,LocalityCode,Source,XYAccuracy,CollRecordDate,AuxiliaryFields,DateCollFlag,DateCollEnd,DateCollEndFlag,CollRecChangedDate,NumberImages,CollRecChangedBy)
		VALUES (:CollectionCode,:Method,:CollectedBy,:DateCollected,:Site,:XCoordinate,:YCoordinate,:HostSpcmCode,:LocalityCode,:Source,:XYAccuracy,:CollRecordDate,:AuxiliaryFields,:DateCollFlag,:DateCollEnd,:DateCollEndFlag,:CollRecChangedDate,:NumberImages,:CollRecChangedBy)");
		$SQLSTMT->bindParam(':CollectionCode',$CollectionCode );
		$SQLSTMT->bindParam(':Method',$Method );
		$SQLSTMT->bindParam(':CollectedBy',$CollectedBy );
		$SQLSTMT->bindParam(':DateCollected',$DateCollected );
		$SQLSTMT->bindParam(':Site',$Site );
		$SQLSTMT->bindParam(':XCoordinate',$XCoordinate );
		$SQLSTMT->bindParam(':YCoordinate',$YCoordinate );
		$SQLSTMT->bindParam(':HostSpcmCode',$HostSpcmCode );
		$SQLSTMT->bindParam(':LocalityCode',$LocalityCode );
		$SQLSTMT->bindParam(':Source',$Source );
		$SQLSTMT->bindParam(':XYAccuracy',$XYAccuracy );
		$SQLSTMT->bindParam(':CollRecordDate',$CollRecordDate );
		$SQLSTMT->bindParam(':AuxiliaryFields',$AuxiliaryFields );
		$SQLSTMT->bindParam(':DateCollFlag',$DateCollFlag );
		$SQLSTMT->bindParam(':DateCollEnd',$DateCollEnd );
		$SQLSTMT->bindParam(':DateCollEndFlag',$DateCollEndFlag );
		$SQLSTMT->bindParam(':CollRecChangedDate',$CollRecChangedDate );
		$SQLSTMT->bindParam(':NumberImages',$NumberImages );
		$SQLSTMT->bindParam(':CollRecChangedBy',$CollRecChangedBy );
		$addOK = $SQLSTMT->execute();
		return $addOK;

	}

	public static function addCollectionNotes($CollectionCode,$NoteDate,$NoteBy,$NoteText,$Null){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO CollectionNotes(CollectionCode,NoteDate,NoteBy,NoteText,`Null`) VALUES (:CollectionCode,:NoteDate,:NoteBy,:NoteText,:Null)");
		$SQLSTMT->bindParam(':CollectionCode', $CollectionCode);
		$SQLSTMT->bindParam(':NoteDate', $NoteDate);
		$SQLSTMT->bindParam(':NoteBy', $NoteBy);
		$SQLSTMT->bindParam(':NoteText', $NoteText);
		$SQLSTMT->bindParam(':Null', $Null);
		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addDetHistory($SpecimenCode,$SpeciesCode,$Genus,$SpeciesName,$SpeciesAuthor,$DeterminedBy,$DateDetermined,$WhereChanged,$DateChanged,$ChangedBy,$DateDetFlag,$Sequence,$Subspecies,$SubspAuthor,$Variety,$VarietyAuthor){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO DetHistory(SpecimenCode,SpeciesCode,Genus,SpeciesName,SpeciesAuthor,DeterminedBy,DateDetermined,WhereChanged,DateChanged,ChangedBy,DateDetFlag,Sequence,Subspecies,SubspAuthor,Variety,VarietyAuthor)
		 VALUES (:SpecimenCode,:SpeciesCode,:Genus,:SpeciesName,:SpeciesAuthor,:DeterminedBy,:DateDetermined,:WhereChanged,:DateChanged,:ChangedBy,:DateDetFlag,:Sequence,:Subspecies,:SubspAuthor,:Variety,:VarietyAuthor)");
		$SQLSTMT->bindParam(':SpecimenCode', $SpecimenCode);
		$SQLSTMT->bindParam(':SpeciesCode', $SpeciesCode);
		$SQLSTMT->bindParam(':Genus', $Genus);
		$SQLSTMT->bindParam(':SpeciesName', $SpeciesName);
		$SQLSTMT->bindParam(':SpeciesAuthor', $SpeciesAuthor);
		$SQLSTMT->bindParam(':DeterminedBy', $DeterminedBy);
		$SQLSTMT->bindParam(':DateDetermined', $DateDetermined);
		$SQLSTMT->bindParam(':WhereChanged', $WhereChanged);
		$SQLSTMT->bindParam(':DateChanged', $DateChanged);
		$SQLSTMT->bindParam(':ChangedBy', $ChangedBy);
		$SQLSTMT->bindParam(':DateDetFlag', $DateDetFlag);
		$SQLSTMT->bindParam(':Sequence', $Sequence);
		$SQLSTMT->bindParam(':Subspecies', $Subspecies);
		$SQLSTMT->bindParam(':SubspAuthor', $SubspAuthor);
		$SQLSTMT->bindParam(':Variety', $Variety);
		$SQLSTMT->bindParam(':VarietyAuthor', $VarietyAuthor);
		$addOK = $SQLSTMT->execute();
		return $addOK;

	}

	public static function addFamily($Family,$Superfamily,$Order,$Suborder,$FamilyCustom1,$FamilyCustom2,$FamilyCustom3){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO family(Family,Superfamily,`Order`,Suborder,FamilyCustom1,FamilyCustom2,FamilyCustom3) VALUES (:Family,:Superfamily,:Order,:Suborder,:FamilyCustom1,:FamilyCustom2,:FamilyCustom3)");
		$SQLSTMT->bindParam(':Family', $Family);
		$SQLSTMT->bindParam(':Superfamily', $Superfamily);
		$SQLSTMT->bindParam(':Order', $Order);
		$SQLSTMT->bindParam(':Suborder', $Suborder);
		$SQLSTMT->bindParam(':FamilyCustom1', $FamilyCustom1);
		$SQLSTMT->bindParam(':FamilyCustom2', $FamilyCustom2);
		$SQLSTMT->bindParam(':FamilyCustom3', $FamilyCustom3);
		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addGenus($Genus,$Tribe,$Family,$Subfamily,$GenusCustom1,$GenusCustom2,$GenusCustom3){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO genus(Genus,Tribe,Family,Subfamily,GenusCustom1,GenusCustom2,GenusCustom3) VALUES (:Genus,:Tribe,:Family,:Subfamily,:GenusCustom1,:GenusCustom2,:GenusCustom3)");
		$SQLSTMT->bindParam(':Genus', $Genus);
		$SQLSTMT->bindParam(':Tribe', $Tribe);
		$SQLSTMT->bindParam(':Family', $Family);
		$SQLSTMT->bindParam(':Subfamily', $Subfamily);
		$SQLSTMT->bindParam(':GenusCustom1', $GenusCustom1);
		$SQLSTMT->bindParam(':GenusCustom2', $GenusCustom2);
		$SQLSTMT->bindParam(':GenusCustom3', $GenusCustom3);
		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addGroup($GroupName,$ShortName,$MemberNumber){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO `group`(GroupName,ShortName,MemberNumber) VALUES (:GroupName,:ShortName,:MemberNumber)");
		$SQLSTMT->bindParam(':GroupName', $GroupName);
		$SQLSTMT->bindParam(':ShortName', $ShortName);
		$SQLSTMT->bindParam(':MemberNumber', $MemberNumber);
		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addImageArchive($ImageName,$SmallImageName,$PathToFile,$SpecimenNo){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO imagearchive(SmallImageName,ImageName,PathToFile,SpecimenNo) VALUES (:SmallImageName,:ImageName,:PathToFile,:SpecimenNo)");
		$SQLSTMT->bindParam(':SmallImageName', $SmallImageName);
		$SQLSTMT->bindParam(':ImageName', $ImageName);
		$SQLSTMT->bindParam(':PathToFile', $PathToFile);
		$SQLSTMT->bindParam(':SpecimenNo', $SpecimenNo);
		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addKingdom($Kingdom,$Superkingdom,$KingdomCustom1,$KingdomCustom2){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO kingdom(Kingdom,Superkingdom,KingdomCustom1,KingdomCustom2) VALUES (:Kingdom,:Superkingdom,:KingdomCustom1,:KingdomCustom2)");
		$SQLSTMT->bindParam(':Kingdom', $Kingdom);
		$SQLSTMT->bindParam(':Superkingdom', $Superkingdom);
		$SQLSTMT->bindParam(':KingdomCustom1', $KingdomCustom1);
		$SQLSTMT->bindParam(':KingdomCustom2', $KingdomCustom2);
		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addLoansBiota($LoanCode,$DateLoaned,$Borrower,$LoanPeriod,$Description,$NumberLent,$NumberReturned,$LoanRecordDate,$LoanRecChangedDate){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO loans(LoanCode,DateLoaned,Borrower,LoanPeriod,Description,NumberLent,NumberReturned,LoanRecordDate,LoanRecChangedDate)
		 VALUES (:LoanCode,:DateLoaned,:Borrower,:LoanPeriod,:Description,:NumberLent,:NumberReturned,:LoanRecordDate,:LoanRecChangedDate)");
		$SQLSTMT->bindParam(':LoanCode', $LoanCode);
		$SQLSTMT->bindParam(':DateLoaned', $DateLoaned);
		$SQLSTMT->bindParam(':Borrower', $Borrower);
		$SQLSTMT->bindParam(':LoanPeriod', $LoanPeriod);
		$SQLSTMT->bindParam(':Description', $Description);
		$SQLSTMT->bindParam(':NumberLent', $NumberLent);
		$SQLSTMT->bindParam(':NumberReturned', $NumberReturned);
		$SQLSTMT->bindParam(':LoanRecordDate', $LoanRecordDate);
		$SQLSTMT->bindParam(':LoanRecChangedDate', $LoanRecChangedDate);
		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addLoans($LoanCode,$SpecimenCode,$DateLoaned,$DateDue,$Borrower,$LoanPeriod,$Returned,$Description,$NumberLent,$NumberReturned,$LoanRecordDate,$LoanRecChangedDate){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO loans(LoanCode,SpecimenCode,DateLoaned,DateDue,Borrower,LoanPeriod,Returned,Description,NumberLent,NumberReturned,LoanRecordDate,LoanRecChangedDate)
		 VALUES (:LoanCode,:SpecimenCode,:DateLoaned,:DateDue,:Borrower,:LoanPeriod,:Returned,:Description,:NumberLent,:NumberReturned,:LoanRecordDate,:LoanRecChangedDate)");
		$SQLSTMT->bindParam(':LoanCode', $LoanCode);
		$SQLSTMT->bindParam(':SpecimenCode', $SpecimenCode);
		$SQLSTMT->bindParam(':DateLoaned', $DateLoaned);
		$SQLSTMT->bindParam(':DateDue', $DateDue);
		$SQLSTMT->bindParam(':Borrower', $Borrower);
		$SQLSTMT->bindParam(':LoanPeriod', $LoanPeriod);
		$SQLSTMT->bindParam(':Returned', $Returned);
		$SQLSTMT->bindParam(':Description', $Description);
		$SQLSTMT->bindParam(':NumberLent', $NumberLent);
		$SQLSTMT->bindParam(':NumberReturned', $NumberReturned);
		$SQLSTMT->bindParam(':LoanRecordDate', $LoanRecordDate);
		$SQLSTMT->bindParam(':LoanRecChangedDate', $LoanRecChangedDate);
		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addLoansNotes($LoanCode,$NoteDate,$NoteBy,$NoteText,$Null){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO loansnotes(LoanCode,NoteDate,NoteBy,NoteText,`Null`) VALUES (:LoanCode,:NoteDate,:NoteBy,:NoteText,:Null)");
		$SQLSTMT->bindParam(':LoanCode', $LoanCode);
		$SQLSTMT->bindParam(':NoteDate', $NoteDate);
		$SQLSTMT->bindParam(':NoteBy', $NoteBy);
		$SQLSTMT->bindParam(':NoteText', $NoteText);
		$SQLSTMT->bindParam(':Null', $Null);
		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addLocality($LocalityCode,$StateProvince,$Country,$Latitude,$Longitude,$Elevation,$District,$LocalityName,$LocRecordDate,$AuxiliaryFields,$LatLongAccuracy,$AltCoordinate1,$AltCoordinate2,$AltCoordinate3,$LocRecChangedDate,$NumberImages,$LocalityNameIndex,$LocRecChangedBy){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO Locality(LocalityCode,StateProvince,Country,Latitude,Longitude,Elevation,District,LocalityName,LocRecordDate,AuxiliaryFields,LatLongAccuracy,AltCoordinate1,AltCoordinate2,AltCoordinate3,LocRecChangedDate,NumberImages,LocalityNameIndex,LocRecChangedBy)
		 VALUES (:LocalityCode,:StateProvince,:Country,:Latitude,:Longitude,:Elevation,:District,:LocalityName,:LocRecordDate,:AuxiliaryFields,:LatLongAccuracy,:AltCoordinate1,:AltCoordinate2,:AltCoordinate3,:LocRecChangedDate,:NumberImages,:LocalityNameIndex,:LocRecChangedBy)");
		$SQLSTMT->bindParam(':LocalityCode', $LocalityCode);
		$SQLSTMT->bindParam(':StateProvince', $StateProvince);
		$SQLSTMT->bindParam(':Country', $Country);
		$SQLSTMT->bindParam(':Latitude', $Latitude);
		$SQLSTMT->bindParam(':Longitude', $Longitude);
		$SQLSTMT->bindParam(':Elevation', $Elevation);
		$SQLSTMT->bindParam(':District', $District);
		$SQLSTMT->bindParam(':LocalityName', $LocalityName);
		$SQLSTMT->bindParam(':LocRecordDate', $LocRecordDate);
		$SQLSTMT->bindParam(':AuxiliaryFields', $AuxiliaryFields);
		$SQLSTMT->bindParam(':LatLongAccuracy', $LatLongAccuracy);
		$SQLSTMT->bindParam(':AltCoordinate1', $AltCoordinate1);
		$SQLSTMT->bindParam(':AltCoordinate2', $AltCoordinate2);
		$SQLSTMT->bindParam(':AltCoordinate3', $AltCoordinate3);
		$SQLSTMT->bindParam(':LocRecChangedDate', $LocRecChangedDate);
		$SQLSTMT->bindParam(':NumberImages', $NumberImages);
		$SQLSTMT->bindParam(':LocalityNameIndex', $LocalityNameIndex);
		$SQLSTMT->bindParam(':LocRecChangedBy', $LocRecChangedBy);
		$addOK = $SQLSTMT->execute();
		return $addOK;

	}

	public static function addLocalityNotes($LocalityCode,$NoteDate,$NoteBy,$NoteText,$Null){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO localitynotes(LocalityCode,NoteDate,NoteBy,NoteText,`Null`) VALUES (:LocalityCode,:NoteDate,:NoteBy,:NoteText,:Null)");
		$SQLSTMT->bindParam(':LocalityCode',$LocalityCode);
		$SQLSTMT->bindParam(':NoteDate',$NoteDate);
		$SQLSTMT->bindParam(':NoteBy',$NoteBy);
		$SQLSTMT->bindParam(':NoteText',$NoteText);
		$SQLSTMT->bindParam(':Null',$Null);
		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addOrder($Order,$Superorder,$Class,$SubClass,$OrderCustom1,$OrderCustom2,$OrderCustom3){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO `order`(`Order`,Superorder,Class,SubClass,OrderCustom1,OrderCustom2,OrderCustom3) VALUES (:Order,:Superorder,:Class,:SubClass,:OrderCustom1,:OrderCustom2,:OrderCustom3)");
		$SQLSTMT->bindParam(':Order',$Order);
		$SQLSTMT->bindParam(':Superorder',$Superorder);
		$SQLSTMT->bindParam(':Class',$Class);
		$SQLSTMT->bindParam(':SubClass',$SubClass);
		$SQLSTMT->bindParam(':OrderCustom1',$OrderCustom1);
		$SQLSTMT->bindParam(':OrderCustom2',$OrderCustom2);
		$SQLSTMT->bindParam(':OrderCustom3',$OrderCustom3);
		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addPersonnel($LastName,$FirstName,$ShortName,$Title,$Address1,$Address2,$Address3,$Institution,$City,$StateProvZip,$Country,$VoicePhone1,$VoicePhone2,$FaxPhone,$Internet,$PersonnelRecChangedDate,$Notes,$Group,$PersonnelRecordDate,$Project,$PersonnelRecChangedBy){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO `Personnel`(LastName,FirstName,ShortName,Title,Address1,Address2,Address3,Institution,City,StateProvZip,Country,VoicePhone1,VoicePhone2,FaxPhone,Internet,PersonnelRecChangedDate,Notes,`Group`,PersonnelRecordDate,Project,PersonnelRecChangedBy)
		 VALUES (:LastName,:FirstName,:ShortName,:Title,:Address1,:Address2,:Address3,:Institution,:City,:StateProvZip,:Country,:VoicePhone1,:VoicePhone2,:FaxPhone,:Internet,:PersonnelRecChangedDate,:Notes,:Group,:PersonnelRecordDate,:Project,:PersonnelRecChangedBy)");
		$SQLSTMT->bindParam(':LastName',$LastName);
		$SQLSTMT->bindParam(':FirstName',$FirstName);
		$SQLSTMT->bindParam(':ShortName',$ShortName);
		$SQLSTMT->bindParam(':Title',$Title);
		$SQLSTMT->bindParam(':Address1',$Address1);
		$SQLSTMT->bindParam(':Address2',$Address2);
		$SQLSTMT->bindParam(':Address3',$Address3);
		$SQLSTMT->bindParam(':Institution',$Institution);
		$SQLSTMT->bindParam(':City',$City);
		$SQLSTMT->bindParam(':StateProvZip',$StateProvZip);
		$SQLSTMT->bindParam(':Country',$Country);
		$SQLSTMT->bindParam(':VoicePhone1',$VoicePhone1);
		$SQLSTMT->bindParam(':VoicePhone2',$VoicePhone2);
		$SQLSTMT->bindParam(':FaxPhone',$FaxPhone);
		$SQLSTMT->bindParam(':Internet',$Internet);
		$SQLSTMT->bindParam(':PersonnelRecChangedDate',$PersonnelRecChangedDate);
		$SQLSTMT->bindParam(':Notes',$Notes);
		$SQLSTMT->bindParam(':Group',$Group);
		$SQLSTMT->bindParam(':PersonnelRecordDate',$PersonnelRecordDate);
		$SQLSTMT->bindParam(':Project',$Project);
		$SQLSTMT->bindParam(':PersonnelRecChangedBy',$PersonnelRecChangedBy);

		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addPhylum($Phylum,$Subkingdom,$Kingdom,$PhylumCustom1,$PhylumCustom2){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO `Phylum`(Phylum,Subkingdom,Kingdom,PhylumCustom1,PhylumCustom2) VALUES (:Phylum,:Subkingdom,:Kingdom,:PhylumCustom1,:PhylumCustom2)");
		$SQLSTMT->bindParam(':Phylum',$Phylum);
		$SQLSTMT->bindParam(':Subkingdom',$Subkingdom);
		$SQLSTMT->bindParam(':Kingdom',$Kingdom);
		$SQLSTMT->bindParam(':PhylumCustom1',$PhylumCustom1);
		$SQLSTMT->bindParam(':PhylumCustom2',$PhylumCustom2);
		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addProject($ProjectName,$ProjectShortName,$Note,$Heading,$ProjectRecordDate,$ProjectRecChangedDate,$Active,$ProjectRecChangedBy){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO `project`(ProjectName,ProjectShortName,Note,Heading,ProjectRecordDate,ProjectRecChangedDate,Active,ProjectRecChangedBy)
		 VALUES (:ProjectName,:ProjectShortName,:Note,:Heading,:ProjectRecordDate,:ProjectRecChangedDate,:Active,:ProjectRecChangedBy)");
		$SQLSTMT->bindParam(':ProjectName',$ProjectName);
		$SQLSTMT->bindParam(':ProjectShortName',$ProjectShortName);
		$SQLSTMT->bindParam(':Note',$Note);
		$SQLSTMT->bindParam(':Heading',$Heading);
		$SQLSTMT->bindParam(':ProjectRecordDate',$ProjectRecordDate);
		$SQLSTMT->bindParam(':ProjectRecChangedDate',$ProjectRecChangedDate);
		$SQLSTMT->bindParam(':Active',$Active);
		$SQLSTMT->bindParam(':ProjectRecChangedBy',$ProjectRecChangedBy);
		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addReference($ReferenceNo,$ReferenceType,$Author,$Year,$Title,$Editor,$JournalOrEditedBook,$PlacePublished,$Publisher,$Volume,$Pages,$URL,$AuthorIndex,$TitleIndex,$JournalOrEditedBookIndex,$ReferenceRecordDate,$ReferenceRecChangedDate,$ReferenceRecChangedBy){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO `Reference`(ReferenceNo,ReferenceType,Author,`Year`,Title,Editor,JournalOrEditedBook,PlacePublished,Publisher,Volume,Pages,URL,AuthorIndex,TitleIndex,JournalOrEditedBookIndex,ReferenceRecordDate,ReferenceRecChangedDate,ReferenceRecChangedBy)
		 VALUES (:ReferenceNo,:ReferenceType,:Author,:Year,:Title,:Editor,:JournalOrEditedBook,:PlacePublished,:Publisher,:Volume,:Pages,:URL,:AuthorIndex,:TitleIndex,:JournalOrEditedBookIndex,:ReferenceRecordDate,:ReferenceRecChangedDate,:ReferenceRecChangedBy)");
		$SQLSTMT->bindParam(':ReferenceNo',$ReferenceNo);
		$SQLSTMT->bindParam(':ReferenceType',$ReferenceType);
		$SQLSTMT->bindParam(':Author',$Author);
		$SQLSTMT->bindParam(':Year',$Year);
		$SQLSTMT->bindParam(':Title',$Title);
		$SQLSTMT->bindParam(':Editor',$Editor);
		$SQLSTMT->bindParam(':JournalOrEditedBook',$JournalOrEditedBook);
		$SQLSTMT->bindParam(':PlacePublished',$PlacePublished);
		$SQLSTMT->bindParam(':Publisher',$Publisher);
		$SQLSTMT->bindParam(':Volume',$Volume);
		$SQLSTMT->bindParam(':Pages',$Pages);
		$SQLSTMT->bindParam(':URL',$URL);
		$SQLSTMT->bindParam(':AuthorIndex',$AuthorIndex);
		$SQLSTMT->bindParam(':TitleIndex',$TitleIndex);
		$SQLSTMT->bindParam(':JournalOrEditedBookIndex',$JournalOrEditedBookIndex);
		$SQLSTMT->bindParam(':ReferenceRecordDate',$ReferenceRecordDate);
		$SQLSTMT->bindParam(':ReferenceRecChangedDate',$ReferenceRecChangedDate);
		$SQLSTMT->bindParam(':ReferenceRecChangedBy',$ReferenceRecChangedBy);

		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addReferenceLinksBiota($TableNumber,$RecordCode,$ReferenceNo){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO `ReferenceLinks`(TableNumber,RecordCode,ReferenceNo) VALUES (:TableNumber,:RecordCode,:ReferenceNo)");
		$SQLSTMT->bindParam(':TableNumber',$TableNumber);
		$SQLSTMT->bindParam(':RecordCode',$RecordCode);
		$SQLSTMT->bindParam(':ReferenceNo',$ReferenceNo);
		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addReferenceLinks($TableName,$RecordCode,$ReferenceNo){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO `ReferenceLinks`(TableName,RecordCode,ReferenceNo) VALUES (:TableName,:RecordCode,:ReferenceNo)");
		$SQLSTMT->bindParam(':TableName',$TableName);
		$SQLSTMT->bindParam(':RecordCode',$RecordCode);
		$SQLSTMT->bindParam(':ReferenceNo',$ReferenceNo);
		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addSpecies($SpeciesCode,$ValidSpCode,$SpeciesName,$Genus,$SpeciesAuthor,$Subgenus,$NumberImages,$SppRecordDate,$AuxiliaryFields,$Subspecies,$SubspAuthor,$Variety,$VarietyAuthor,$CommonName,$Distribution,$TypeLocality,$TypeDepository,$Section,$SppRecChangedDate,$SppRecChangedBy){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO `Species`(SpeciesCode,ValidSpCode,SpeciesName,Genus,SpeciesAuthor,Subgenus,NumberImages,SppRecordDate,AuxiliaryFields,Subspecies,SubspAuthor,Variety,VarietyAuthor,CommonName,Distribution,TypeLocality,TypeDepository,Section,SppRecChangedDate,SppRecChangedBy)
		 VALUES (:SpeciesCode,:ValidSpCode,:SpeciesName,:Genus,:SpeciesAuthor,:Subgenus,:NumberImages,:SppRecordDate,:AuxiliaryFields,:Subspecies,:SubspAuthor,:Variety,:VarietyAuthor,:CommonName,:Distribution,:TypeLocality,:TypeDepository,:Section,:SppRecChangedDate,:SppRecChangedBy)");
		$SQLSTMT->bindParam(':SpeciesCode',$SpeciesCode);
		$SQLSTMT->bindParam(':ValidSpCode',$ValidSpCode);
		$SQLSTMT->bindParam(':SpeciesName',$SpeciesName);
		$SQLSTMT->bindParam(':Genus',$Genus);
		$SQLSTMT->bindParam(':SpeciesAuthor',$SpeciesAuthor);
		$SQLSTMT->bindParam(':Subgenus',$Subgenus);
		$SQLSTMT->bindParam(':NumberImages',$NumberImages);
		$SQLSTMT->bindParam(':SppRecordDate',$SppRecordDate);
		$SQLSTMT->bindParam(':AuxiliaryFields',$AuxiliaryFields);
		$SQLSTMT->bindParam(':Subspecies',$Subspecies);
		$SQLSTMT->bindParam(':SubspAuthor',$SubspAuthor);
		$SQLSTMT->bindParam(':Variety',$Variety);
		$SQLSTMT->bindParam(':VarietyAuthor',$VarietyAuthor);
		$SQLSTMT->bindParam(':CommonName',$CommonName);
		$SQLSTMT->bindParam(':Distribution',$Distribution);
		$SQLSTMT->bindParam(':TypeLocality',$TypeLocality);
		$SQLSTMT->bindParam(':TypeDepository',$TypeDepository);
		$SQLSTMT->bindParam(':Section',$Section);
		$SQLSTMT->bindParam(':SppRecChangedDate',$SppRecChangedDate);
		$SQLSTMT->bindParam(':SppRecChangedBy',$SppRecChangedBy);

		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addSpeciesNotes($SpeciesCode,$NoteDate,$NoteBy,$NoteText,$Null){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO SpeciesNotes(SpeciesCode,NoteDate,NoteBy,NoteText,`Null`) VALUES (:SpeciesCode,:NoteDate,:NoteBy,:NoteText,:Null)");
		$SQLSTMT->bindParam(':SpeciesCode',$SpeciesCode);
		$SQLSTMT->bindParam(':NoteDate',$NoteDate);
		$SQLSTMT->bindParam(':NoteBy',$NoteBy);
		$SQLSTMT->bindParam(':NoteText',$NoteText);
		$SQLSTMT->bindParam(':Null',$Null);
		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addSpecimenBiota($SpecimenCode,$CollectionCode,$SpeciesCode,$DeterminedBy,$DateDetermined,$Deposited,$Medium,$Storage,$Abundance,$StageSex,$PreparedBy,$DatePrepared,$SpcmRecordDate,$AuxiliaryFields,$DateDetFlag,$DatePrepFlag,$TypeStatus,$SpcmRecChangedDate,$NumberImages,$SpcmRecChangedBy,$SpecimenCustom1,$SpecimenCustom2){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO Specimen(SpecimenCode,CollectionCode,SpeciesCode,DeterminedBy,DateDetermined,Deposited,Medium,Storage,Abundance,StageSex,PreparedBy,DatePrepared,SpcmRecordDate,AuxiliaryFields,DateDetFlag,DatePrepFlag,TypeStatus,SpcmRecChangedDate,NumberImages,SpcmRecChangedBy,SpecimenCustom1,SpecimenCustom2)
		       VALUES (:SpecimenCode,:CollectionCode,:SpeciesCode,:DeterminedBy,:DateDetermined,:Deposited,:Medium,:Storage,:Abundance,:StageSex,:PreparedBy,:DatePrepared,:SpcmRecordDate,:AuxiliaryFields,:DateDetFlag,:DatePrepFlag,:TypeStatus,:SpcmRecChangedDate,:NumberImages,:SpcmRecChangedBy,:SpecimenCustom1,:SpecimenCustom2)");

		$SQLSTMT->bindParam(':SpecimenCode',$SpecimenCode);
		$SQLSTMT->bindParam(':CollectionCode',$CollectionCode);
		$SQLSTMT->bindParam(':SpeciesCode',$SpeciesCode);
		$SQLSTMT->bindParam(':DeterminedBy',$DeterminedBy);
		$SQLSTMT->bindParam(':DateDetermined',$DateDetermined);
		$SQLSTMT->bindParam(':Deposited',$Deposited);
		$SQLSTMT->bindParam(':Medium',$Medium);
		$SQLSTMT->bindParam(':Storage',$Storage);
		$SQLSTMT->bindParam(':Abundance',$Abundance);
		$SQLSTMT->bindParam(':StageSex',$StageSex);
		$SQLSTMT->bindParam(':PreparedBy',$PreparedBy);
		$SQLSTMT->bindParam(':DatePrepared',$DatePrepared);
		$SQLSTMT->bindParam(':SpcmRecordDate',$SpcmRecordDate);
		$SQLSTMT->bindParam(':AuxiliaryFields',$AuxiliaryFields);
		$SQLSTMT->bindParam(':DateDetFlag',$DateDetFlag);
		$SQLSTMT->bindParam(':DatePrepFlag',$DatePrepFlag);
		$SQLSTMT->bindParam(':TypeStatus',$TypeStatus);
		$SQLSTMT->bindParam(':SpcmRecChangedDate',$SpcmRecChangedDate);
		$SQLSTMT->bindParam(':NumberImages',$NumberImages);
		$SQLSTMT->bindParam(':SpcmRecChangedBy',$SpcmRecChangedBy);
		$SQLSTMT->bindParam(':SpecimenCustom1',$SpecimenCustom1);
		$SQLSTMT->bindParam(':SpecimenCustom2',$SpecimenCustom2);

		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addSpecimen($SpecimenCode,$CollectionCode,$SpeciesCode,$DeterminedBy,$DateDetermined,$Deposited,$Medium,$Storage,$Abundance,$StageSex,$PreparedBy,$DatePrepared,$SpcmRecordDate,$AuxiliaryFields,$DateDetFlag,$DatePrepFlag,$TypeStatus,$SpcmRecChangedDate,$NumberImages,$SpcmRecChangedBy,$SpecimenCustom1,$SpecimenCustom2,$Genus,$Family,$Order,$Classes){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO Specimen(SpecimenCode,CollectionCode,SpeciesCode,DeterminedBy,DateDetermined,Deposited,Medium,Storage,Abundance,StageSex,PreparedBy,DatePrepared,SpcmRecordDate,AuxiliaryFields,DateDetFlag,DatePrepFlag,TypeStatus,SpcmRecChangedDate,NumberImages,SpcmRecChangedBy,SpecimenCustom1,SpecimenCustom2,Genus,Family,`Order`,`Class`)
		 VALUES (:SpecimenCode,:CollectionCode,:SpeciesCode,:DeterminedBy,:DateDetermined,:Deposited,:Medium,:Storage,:Abundance,:StageSex,:PreparedBy,:DatePrepared,:SpcmRecordDate,:AuxiliaryFields,:DateDetFlag,:DatePrepFlag,:TypeStatus,:SpcmRecChangedDate,:NumberImages,:SpcmRecChangedBy,:SpecimenCustom1,:SpecimenCustom2,:Genus,:Family,:Order,:Classes)");

		$SQLSTMT->bindParam(':SpecimenCode',$SpecimenCode);
		$SQLSTMT->bindParam(':CollectionCode',$CollectionCode);
		$SQLSTMT->bindParam(':SpeciesCode',$SpeciesCode);
		$SQLSTMT->bindParam(':DeterminedBy',$DeterminedBy);
		$SQLSTMT->bindParam(':DateDetermined',$DateDetermined);
		$SQLSTMT->bindParam(':Deposited',$Deposited);
		$SQLSTMT->bindParam(':Medium',$Medium);
		$SQLSTMT->bindParam(':Storage',$Storage);
		$SQLSTMT->bindParam(':Abundance',$Abundance);
		$SQLSTMT->bindParam(':StageSex',$StageSex);
		$SQLSTMT->bindParam(':PreparedBy',$PreparedBy);
		$SQLSTMT->bindParam(':DatePrepared',$DatePrepared);
		$SQLSTMT->bindParam(':SpcmRecordDate',$SpcmRecordDate);
		$SQLSTMT->bindParam(':AuxiliaryFields',$AuxiliaryFields);
		$SQLSTMT->bindParam(':DateDetFlag',$DateDetFlag);
		$SQLSTMT->bindParam(':DatePrepFlag',$DatePrepFlag);
		$SQLSTMT->bindParam(':TypeStatus',$TypeStatus);
		$SQLSTMT->bindParam(':SpcmRecChangedDate',$SpcmRecChangedDate);
		$SQLSTMT->bindParam(':NumberImages',$NumberImages);
		$SQLSTMT->bindParam(':SpcmRecChangedBy',$SpcmRecChangedBy);
		$SQLSTMT->bindParam(':SpecimenCustom1',$SpecimenCustom1);
		$SQLSTMT->bindParam(':SpecimenCustom2',$SpecimenCustom2);
		$SQLSTMT->bindParam(':Genus',$Genus);
		$SQLSTMT->bindParam(':Family',$Family);
		$SQLSTMT->bindParam(':Order',$Order);
		$SQLSTMT->bindParam(':Classes',$Classes);

		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addSpecimenNotes($SpecimenCode,$NoteDate,$NoteBy,$NoteText,$Null){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO SpecimenNotes(SpecimenCode,NoteDate,NoteBy,NoteText,`Null`) VALUES (:SpecimenCode,:NoteDate,:NoteBy,:NoteText,:Null)");
		$SQLSTMT->bindParam(':SpecimenCode',$SpecimenCode);
		$SQLSTMT->bindParam(':NoteDate',$NoteDate);
		$SQLSTMT->bindParam(':NoteBy',$NoteBy);
		$SQLSTMT->bindParam(':NoteText',$NoteText);
		$SQLSTMT->bindParam(':Null',$Null);
		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function addWebUsers($UserName,$UserPassword,$SecureLevel,$Person){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("INSERT INTO webusers(UserName,Password,SecureLevel,Person) VALUES (:UserName,MD5(:Password),:SecureLevel,:Person)");
		$SQLSTMT->bindParam(':UserName',$UserName);
		$SQLSTMT->bindParam(':Password',$UserPassword);
		$SQLSTMT->bindParam(':SecureLevel',$SecureLevel);
		$SQLSTMT->bindParam(':Person',$Person);
		$addOK = $SQLSTMT->execute();
		return $addOK;
	}

	public static function DeleteWithOnePK ($TableName,$PKFiled,$PKValue){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("Delete from `$TableName` where `$PKFiled` = '$PKValue' ");

		$DeleteOK = $SQLSTMT->execute();
		return $DeleteOK;
	}

	public static function DeleteWithTwoPK ($TableName,$PKFiled1,$PKValue1,$PKFiled2,$PKValue2){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("Delete from `$TableName` where `$PKFiled1` = '$PKValue1' and `$PKFiled2` = '$PKValue2' ");

		$DeleteOK = $SQLSTMT->execute();
		return $DeleteOK;
	}

	public static function DeleteWithThreePK ($TableName,$PKFiled1,$PKValue1,$PKFiled2,$PKValue2,$PKFiled3,$PKValue3){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("Delete from `$TableName` where `$PKFiled1` = '$PKValue1' and `$PKFiled2` = '$PKValue2' and `$PKFiled3` = '$PKValue3' ");

		$DeleteOK = $SQLSTMT->execute();
		return $DeleteOK;
	}

	public static function DeleteNotes($TableName,$NoteFiledType,$NoteCode,$NoteDate,$NoteBy,$NoteText){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("delete from `$TableName` where `$NoteFiledType`='$NoteCode' and NoteDate='$NoteDate'
		and NoteBy='$NoteBy' and NoteText='$NoteText'  ");

		$DeleteOK = $SQLSTMT->execute();
		return $DeleteOK;
	}

	public static function getUser($Username,$Password){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("select * from `webusers` where `username` = '$Username' and `password` = MD5('$Password') ");

		$DeleteOK = $SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'WebUsers');
		return $SQLSTMT->fetch();
	}

	public static function getRecordWithOnePK($tablename,$PKFiledName,$PKValue,$ClassName){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("select * from `$tablename` where `$PKFiledName`='$PKValue'");
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, $ClassName);
		return $SQLSTMT->fetch();
	}

	public static function getRecordWithTwoPK ($TableName,$PKFiled1,$PKValue1,$PKFiled2,$PKValue2,$ClassName){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("Select * from `$TableName` where `$PKFiled1` = '$PKValue1' and `$PKFiled2` = '$PKValue2' ");
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, $ClassName);
		return $SQLSTMT->fetch();
	}

	public static function getRecordWithThreePK ($TableName,$PKFiled1,$PKValue1,$PKFiled2,$PKValue2,$PKFiled3,$PKValue3,$ClassName){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("Select * from `$TableName` where `$PKFiled1` = '$PKValue1' and `$PKFiled2` = '$PKValue2' and `$PKFiled3` = '$PKValue3'");
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, $ClassName);
		return $SQLSTMT->fetch();
	}

	public static function getRecordWithFourPK ($TableName,$PKFiled1,$PKValue1,$PKFiled2,$PKValue2,$PKFiled3,$PKValue3,$PKFiled4,$PKValue4,$ClassName){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("Select * from `$TableName` where `$PKFiled1` = '$PKValue1' and `$PKFiled2` = '$PKValue2' and `$PKFiled3` = '$PKValue3' and `$PKFiled4` = '$PKValue4'");
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, $ClassName);
		return $SQLSTMT->fetch();
	}

	public static function getLoansBySpecimenNo($SpecimenNo){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("select * from `Loans` where `SpecimenCode`='$SpecimenNo'");
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Loans');
		return $SQLSTMT->fetchall();
	}

	public static function getLoansDueToday(){
		$DBH = DBManager::getDBConnection();
		$today = date("Y-m-d");
		$SQLSTMT = $DBH->prepare("select * from `Loans` where `DateDue`='$today' and Returned='0'");
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Loans');
		return $SQLSTMT->fetchall();
	}

	public static function updateImageArchive($SpecimenNO,$OldSpecimenNO){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("update imagearchive set `SpecimenNo`='$SpecimenNO' where  `SpecimenNo`='$OldSpecimenNO'");
		$updateOK = $SQLSTMT->execute();
		return $updateOK;
	}

	public static function updateLoan($SpecimenNO,$OldSpecimenNO){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("update Loans set `SpecimenCode`='$SpecimenNO' where  `SpecimenCode`='$OldSpecimenNO'");
		$updateOK = $SQLSTMT->execute();
		return $updateOK;
	}

	public static function updateReturnLoan($SpecimenNO){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("update Loans set `Returned`='1' where  `SpecimenCode`='$SpecimenNO' and `Returned`='0'");
		$updateOK = $SQLSTMT->execute();
		return $updateOK;
	}

	public static function getReferenceLinksbyRecodeCodeandTableName($RecodeCode,$TableName){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare("select * from `ReferenceLinks` where `RecordCode`='$RecodeCode' and TableName ='$TableName'");
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'ReferenceLinks');
		return $SQLSTMT->fetchall();
	}

	public static function getCollectionLocality($SQL){
		$DBH = DBManager::getDBConnection();
		$SQLSTMT = $DBH->prepare($SQL);
		$SQLSTMT->execute();
		$SQLSTMT->setFetchMode(PDO::FETCH_CLASS, 'Locality');
		return $SQLSTMT->fetchall();
	}








}
?>