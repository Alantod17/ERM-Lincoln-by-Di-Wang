<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */

ob_start();
require("inc/coreincs.inc");
$hg = HtmlGenerator::getInstance();
$hg->startPage("Entomology Museum LU");
$hg->openBody("Import");
$hg->openContent();

$BiotaFile =$_FILES["biotafile"]["tmp_name"];
$table = isset($_POST["table"])?$_POST["table"]:"";


$result ="";

$File=file_get_contents($BiotaFile);

$Linearray=split("\n",$File);


if (count($Linearray)>0) {

switch ($table) {
		case "Class":
			{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {
				$Class = (isset($recordsarray[0]) and $recordsarray[0] != "")?$recordsarray[0]:NULL;
				$ClassCustom1 = (isset($recordsarray[1]) and $recordsarray[1] != "")?$recordsarray[1]:NULL;
				$ClassCustom2 = (isset($recordsarray[2]) and $recordsarray[2] != "")?$recordsarray[2]:NULL;
				$Phylum = (isset($recordsarray[3]) and $recordsarray[3] != "")?$recordsarray[3]:NULL;
				$Subphylum = (isset($recordsarray[4]) and $recordsarray[4] != "")?$recordsarray[4]:NULL;
					if (!LogicManager::CKRecordExistwithOnePK("Class","Class" ,$Class ,"Classes" )) {
					$addOk = LogicManager::addClass($Class,$Subphylum,$Phylum,$ClassCustom1,$ClassCustom2);
					if ($addOk) {
						$result = $result."<font color=green>Sucess on import ".$Class."</font></br>";
					}else{
						$result = $result."<font color=red>Fail on import ".$Class."Please check phylum is exsist</font></br>";
					}
					}else{
						$result = $result."<font color=red>Fail on import ".$Class."Record is exsist</font></br>";
					}

				}


			}
		}
			break;


		case "Collection":
		   {
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {

				$AuxiliaryFields	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$CollectedBy	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$CollectionCode	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$CollRecChangedBy	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;
				$CollRecChangedDate	 = (isset($recordsarray[4])	 and $recordsarray[4] != "")?	$recordsarray[4]:NULL;
				$CollRecordDate	 = (isset($recordsarray[5])	 and $recordsarray[5] != "")?	$recordsarray[5]:NULL;
				$DateCollected	 = (isset($recordsarray[6])	 and $recordsarray[6] != "")?	$recordsarray[6]:NULL;
				$DateCollEnd	 = (isset($recordsarray[7])	 and $recordsarray[7] != "")?	$recordsarray[7]:NULL;
				$DateCollEndFlag	 = (isset($recordsarray[8])	 and $recordsarray[8] != "")?	$recordsarray[8]:NULL;
				$DateCollFlag	 = (isset($recordsarray[9])	 and $recordsarray[9] != "")?	$recordsarray[9]:NULL;
				$HostSpcmCode	 = (isset($recordsarray[10])	 and $recordsarray[10] != "")?	$recordsarray[10]:NULL;
				$LocalityCode	 = (isset($recordsarray[11])	 and $recordsarray[11] != "")?	$recordsarray[11]:NULL;
				$Method	 = (isset($recordsarray[12])	 and $recordsarray[12] != "")?	$recordsarray[12]:NULL;
				$NumberImages	 = (isset($recordsarray[13])	 and $recordsarray[13] != "")?	$recordsarray[13]:NULL;
				$Site	 = (isset($recordsarray[14])	 and $recordsarray[14] != "")?	$recordsarray[14]:NULL;
				$Source	 = (isset($recordsarray[15])	 and $recordsarray[15] != "")?	$recordsarray[15]:NULL;
				$XCoordinate	 = (isset($recordsarray[16])	 and $recordsarray[16] != "")?	$recordsarray[16]:NULL;
				$XYAccuracy	 = (isset($recordsarray[17])	 and $recordsarray[17] != "")?	$recordsarray[17]:NULL;
				$YCoordinate	 = (isset($recordsarray[18])	 and $recordsarray[18] != "")?	$recordsarray[18]:NULL;


					if (!LogicManager::CKRecordExistwithOnePK("Collection","CollectionCode" ,$CollectionCode ,"Collection" )) {
						$addOk = LogicManager::addCollection($CollectionCode,$Method,$CollectedBy,$DateCollected,$Site,$XCoordinate,$YCoordinate,$HostSpcmCode,$LocalityCode,$Source,$XYAccuracy,$CollRecordDate,$AuxiliaryFields,$DateCollFlag,$DateCollEnd,$DateCollEndFlag,$CollRecChangedDate,$NumberImages,$CollRecChangedBy);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import ".$CollectionCode."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import ".$CollectionCode."</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import ".$CollectionCode."Record is exsist</font></br>";
					}
				}
			}

		}
			break;


		case "Collectionnotes":
		{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {

				$CollectionCode	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$NoteBy	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$NoteDate	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$NoteText	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;
				$Null	 = (isset($recordsarray[4])	 and $recordsarray[4] != "")?	$recordsarray[4]:NULL;


					if (!LogicManager::CKRecordExistwithFourPK('Collectionnotes','CollectionCode',$CollectionCode,'NoteDate',$NoteDate,'NoteBy',$NoteBy,'NoteText',$NoteText,'Classes')) {
						$addOk = LogicManager::addCollectionNotes($CollectionCode,$NoteDate,$NoteBy,$NoteText,$Null);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import note by ".$NoteBy." on ".$NoteDate." about Collection ".$CollectionCode."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import note by ".$NoteBy." on ".$NoteDate." about Collection ".$CollectionCode."</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import note by ".$NoteBy." on ".$NoteDate." about Collection ".$CollectionCode."Record is exsist</font></br>";
					}
				}
			}

		}
			break;


		case "DetHistory":
		{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {

				$ChangedBy	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$DateChanged	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$DateDetermined	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$DateDetFlag	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;
				$DeterminedBy	 = (isset($recordsarray[4])	 and $recordsarray[4] != "")?	$recordsarray[4]:NULL;
				$Genus	 = (isset($recordsarray[5])	 and $recordsarray[5] != "")?	$recordsarray[5]:NULL;
				$Sequence	 = (isset($recordsarray[6])	 and $recordsarray[6] != "")?	$recordsarray[6]:NULL;
				$SpeciesAuthor	 = (isset($recordsarray[7])	 and $recordsarray[7] != "")?	$recordsarray[7]:NULL;
				$SpeciesCode	 = (isset($recordsarray[8])	 and $recordsarray[8] != "")?	$recordsarray[8]:NULL;
				$SpeciesName	 = (isset($recordsarray[9])	 and $recordsarray[9] != "")?	$recordsarray[9]:NULL;
				$SpecimenCode	 = (isset($recordsarray[10])	 and $recordsarray[10] != "")?	$recordsarray[10]:NULL;
				$SubspAuthor	 = (isset($recordsarray[11])	 and $recordsarray[11] != "")?	$recordsarray[11]:NULL;
				$Subspecies	 = (isset($recordsarray[12])	 and $recordsarray[12] != "")?	$recordsarray[12]:NULL;
				$Variety	 = (isset($recordsarray[13])	 and $recordsarray[13] != "")?	$recordsarray[13]:NULL;
				$VarietyAuthor	 = (isset($recordsarray[14])	 and $recordsarray[14] != "")?	$recordsarray[14]:NULL;
				$WhereChanged	 = (isset($recordsarray[15])	 and $recordsarray[15] != "")?	$recordsarray[15]:NULL;


					if (!LogicManager::CKRecordExistwithThreePK('DetHistory','SpecimenCode',$SpecimenCode,'DeterminedBy',$DeterminedBy,'DateDetermined',$DateDetermined,'DetHistory')) {
						$addOk = LogicManager::addDetHistory($SpecimenCode,$SpeciesCode,$Genus,$SpeciesName,$SpeciesAuthor,$DeterminedBy,$DateDetermined,$WhereChanged,$DateChanged,$ChangedBy,$DateDetFlag,$Sequence,$Subspecies,$SubspAuthor,$Variety,$VarietyAuthor);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import note by ".$DeterminedBy." on ".$DateDetermined." about Specimen ".$SpecimenCode."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import note by ".$DeterminedBy." on ".$DateDetermined." about Specimen ".$SpecimenCode."</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import note by ".$DeterminedBy." on ".$DateDetermined." about Specimen ".$SpecimenCode."</font></br>";
					}
				}
			}

		}
			break;


		case "Family":
		{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {

				$Family	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$FamilyCustom1	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$FamilyCustom2	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$FamilyCustom3	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;
				$Order	 = (isset($recordsarray[4])	 and $recordsarray[4] != "")?	$recordsarray[4]:NULL;
				$Suborder	 = (isset($recordsarray[5])	 and $recordsarray[5] != "")?	$recordsarray[5]:NULL;
				$Superfamily	 = (isset($recordsarray[6])	 and $recordsarray[6] != "")?	$recordsarray[6]:NULL;



					if (!LogicManager::CKRecordExistwithOnePK('Family','Family',$Family,'Family')) {
						$addOk = LogicManager::addFamily($Family,$Superfamily,$Order,$Suborder,$FamilyCustom1,$FamilyCustom2,$FamilyCustom3);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import ".$Family."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import ".$Family."Please check Order is exsist</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import ".$Family."Record is exsist</font></br>";
					}
				}
			}

		}
			break;


		case "Genus":
		{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {

				$Family	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$Genus	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$GenusCustom1	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$GenusCustom2	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;
				$GenusCustom3	 = (isset($recordsarray[4])	 and $recordsarray[4] != "")?	$recordsarray[4]:NULL;
				$Subfamily	 = (isset($recordsarray[5])	 and $recordsarray[5] != "")?	$recordsarray[5]:NULL;
				$Tribe	 = (isset($recordsarray[6])	 and $recordsarray[6] != "")?	$recordsarray[6]:NULL;




					if (!LogicManager::CKRecordExistwithOnePK('Genus','Genus',$Genus,'Genus')) {
						$addOk = LogicManager::addGenus($Genus,$Tribe,$Family,$Subfamily,$GenusCustom1,$GenusCustom2,$GenusCustom3);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import ".$Genus."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import ".$Genus."Please check Family is exsist</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import ".$Genus."Record is exsist</font></br>";
					}}
			}

		}
			break;


		case "Group":
		{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {

				$GroupName	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$MemberNumber	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$ShortName	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;




					if (!LogicManager::CKRecordExistwithTwoPK('Group','GroupName',$GroupName,'ShortName',$ShortName,'Group')) {
						$addOk = LogicManager::addGroup($GroupName,$ShortName,$MemberNumber);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import ".$GroupName."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import ".$GroupName."</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import ".$GroupName."Record is exsist</font></br>";
					}}
			}

		}
			break;


		case "Kingdom":
		{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {

				$Kingdom	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$KingdomCustom1	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$KingdomCustom2	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$Superkingdom	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;




					if (!LogicManager::CKRecordExistwithOnePK('Kingdom','Kingdom',$Kingdom,'Kingdom')) {
						$addOk = LogicManager::addKingdom($Kingdom,$Superkingdom,$KingdomCustom1,$KingdomCustom2);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import ".$Kingdom."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import ".$Kingdom."</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import ".$Kingdom."Record is exsist</font></br>";
					}}
			}

		}
			break;


		case "Loans":
		{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {

				$Borrower	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$DateLoaned	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$Description	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$LoanCode	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;
				$LoanPeriod	 = (isset($recordsarray[4])	 and $recordsarray[4] != "")?	$recordsarray[4]:NULL;
				$LoanRecChangedDate	 = (isset($recordsarray[5])	 and $recordsarray[5] != "")?	$recordsarray[5]:NULL;
				$LoanRecordDate	 = (isset($recordsarray[6])	 and $recordsarray[6] != "")?	$recordsarray[6]:NULL;
				$NumberLent	 = (isset($recordsarray[7])	 and $recordsarray[7] != "")?	$recordsarray[7]:NULL;
				$NumberReturned	 = (isset($recordsarray[8])	 and $recordsarray[8] != "")?	$recordsarray[8]:NULL;




					if (!LogicManager::CKRecordExistwithOnePK('Loans','LoanCode',$LoanCode,'Loans')) {
						$addOk = LogicManager::addLoansBiota($LoanCode,$DateLoaned,$Borrower,$LoanPeriod,$Description,$NumberLent,$NumberReturned,$LoanRecordDate,$LoanRecChangedDate);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import ".$LoanCode."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import ".$LoanCode." Please check borrower is exist</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import ".$LoanCode."Record is exsist</font></br>";
					}}
			}

		}
			break;


		case "LoansNotes":
		{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {

				$LoanCode	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$NoteBy	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$NoteDate	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$NoteText	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;
				$Null	 = (isset($recordsarray[4])	 and $recordsarray[4] != "")?	$recordsarray[4]:NULL;




					if (!LogicManager::CKRecordExistwithFourPK('Loansnotes','LoanCode',$LoanCode,'NoteDate',$NoteDate,'NoteBy',$NoteBy,'NoteText',$NoteText,'LoansNote')) {
						$addOk = LogicManager::addLoansNotes($LoanCode,$NoteDate,$NoteBy,$NoteText,$Null);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import note by ".$NoteBy." on ".$NoteDate." about Collection ".$LoanCode."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import note by ".$NoteBy." on ".$NoteDate." about Collection ".$LoanCode."</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import note by ".$NoteBy." on ".$NoteDate." about Collection ".$LoanCode."Record is exsist</font></br>";
					}}
			}

		}
			break;


		case "Locality":
		{
			foreach ($Linearray as $line) {

				$recordsarray = split("\t",$line);
				$fildnum = count($recordsarray);

				if ($fildnum>1) {

				$AltCoordinate1	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$AltCoordinate2	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$AltCoordinate3	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$AuxiliaryFields	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;
				$Country	 = (isset($recordsarray[4])	 and $recordsarray[4] != "")?	$recordsarray[4]:NULL;
				$District	 = (isset($recordsarray[5])	 and $recordsarray[5] != "")?	$recordsarray[5]:NULL;
				$Elevation	 = (isset($recordsarray[6])	 and $recordsarray[6] != "")?	$recordsarray[6]:NULL;
				$Latitude	 = (isset($recordsarray[7])	 and $recordsarray[7] != "")?	$recordsarray[7]:NULL;
				$LatLongAccuracy	 = (isset($recordsarray[8])	 and $recordsarray[8] != "")?	$recordsarray[8]:NULL;
				$LocalityCode	 = (isset($recordsarray[9])	 and $recordsarray[9] != "")?	$recordsarray[9]:NULL;
				$LocalityName	 = (isset($recordsarray[10])	 and $recordsarray[10] != "")?	$recordsarray[10]:NULL;
				$LocalityNameIndex	 = (isset($recordsarray[11])	 and $recordsarray[11] != "")?	$recordsarray[11]:NULL;
				$LocRecChangedBy	 = (isset($recordsarray[12])	 and $recordsarray[12] != "")?	$recordsarray[12]:NULL;
				$LocRecChangedDate	 = (isset($recordsarray[13])	 and $recordsarray[13] != "")?	$recordsarray[13]:NULL;
				$LocRecordDate	 = (isset($recordsarray[14])	 and $recordsarray[14] != "")?	$recordsarray[14]:NULL;
				$Longitude	 = (isset($recordsarray[15])	 and $recordsarray[15] != "")?	$recordsarray[15]:NULL;
				$NumberImages	 = (isset($recordsarray[16])	 and $recordsarray[16] != "")?	$recordsarray[16]:NULL;
				$StateProvince	 = (isset($recordsarray[17])	 and $recordsarray[17] != "")?	$recordsarray[17]:NULL;






					if (!LogicManager::CKRecordExistwithOnePK('Locality','LocalityCode',$LocalityCode,'Locality')) {
						$addOk = LogicManager::addLocality($LocalityCode,$StateProvince,$Country,$Latitude,$Longitude,$Elevation,$District,$LocalityName,$LocRecordDate,$AuxiliaryFields,$LatLongAccuracy,$AltCoordinate1,$AltCoordinate2,$AltCoordinate3,$LocRecChangedDate,$NumberImages,$LocalityNameIndex,$LocRecChangedBy);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import ".$LocalityCode."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import ".$LocalityCode." Please check all person are exist</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import ".$LocalityCode."Record is exsist</font></br>";
					}}
			}

		}
			break;


		case "LocalityNotes":
		{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {

				$LocalityCode	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$NoteBy	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$NoteDate	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$NoteText	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;
				$Null	 = (isset($recordsarray[4])	 and $recordsarray[4] != "")?	$recordsarray[4]:NULL;




					if (!LogicManager::CKRecordExistwithFourPK('LocalityNotes','LocalityCode',$LocalityCode,'NoteDate',$NoteDate,'NoteBy',$NoteBy,'NoteText',$NoteText,'LocalityNote')) {
						$addOk = LogicManager::addLocalityNotes($LocalityCode,$NoteDate,$NoteBy,$NoteText,$Null);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import note by ".$NoteBy." on ".$NoteDate." about Locality ".$LocalityCode."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import note by ".$NoteBy." on ".$NoteDate." about Locality ".$LocalityCode."</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import note by ".$NoteBy." on ".$NoteDate." about Locality ".$LocalityCode."Record is exsist</font></br>";
					}}
			}

		}
			break;


		case "Order":
		{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {

				$Class	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$Order	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$OrderCustom1	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$OrderCustom2	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;
				$OrderCustom3	 = (isset($recordsarray[4])	 and $recordsarray[4] != "")?	$recordsarray[4]:NULL;
				$SubClass	 = (isset($recordsarray[5])	 and $recordsarray[5] != "")?	$recordsarray[5]:NULL;
				$Superorder	 = (isset($recordsarray[6])	 and $recordsarray[6] != "")?	$recordsarray[6]:NULL;




					if (!LogicManager::CKRecordExistwithOnePK('Order','Order',$Order,'Order')) {
						$addOk = LogicManager::addOrder($Order,$Superorder,$Class,$SubClass,$OrderCustom1,$OrderCustom2,$OrderCustom3);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import ".$Order."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import ".$Order."Please check Class is exsist</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import ".$Order."Record is exsist</font></br>";
					}}
			}

		}
			break;


		case "Personnel":
		{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {

				$Address1	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$Address2	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$Address3	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$City	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;
				$Country	 = (isset($recordsarray[4])	 and $recordsarray[4] != "")?	$recordsarray[4]:NULL;
				$FaxPhone	 = (isset($recordsarray[5])	 and $recordsarray[5] != "")?	$recordsarray[5]:NULL;
				$FirstName	 = (isset($recordsarray[6])	 and $recordsarray[6] != "")?	$recordsarray[6]:NULL;
				$Group	 = (isset($recordsarray[7])	 and $recordsarray[7] != "")?	$recordsarray[7]:NULL;
				$Institution	 = (isset($recordsarray[8])	 and $recordsarray[8] != "")?	$recordsarray[8]:NULL;
				$Internet	 = (isset($recordsarray[9])	 and $recordsarray[9] != "")?	$recordsarray[9]:NULL;
				$LastName	 = (isset($recordsarray[10])	 and $recordsarray[10] != "")?	$recordsarray[10]:NULL;
				$Notes	 = (isset($recordsarray[11])	 and $recordsarray[11] != "")?	$recordsarray[11]:NULL;
				$PersonnelRecChangedBy	 = (isset($recordsarray[12])	 and $recordsarray[12] != "")?	$recordsarray[12]:NULL;
				$PersonnelRecChangedDate	 = (isset($recordsarray[13])	 and $recordsarray[13] != "")?	$recordsarray[13]:NULL;
				$PersonnelRecordDate	 = (isset($recordsarray[14])	 and $recordsarray[14] != "")?	$recordsarray[14]:NULL;
				$Project	 = (isset($recordsarray[15])	 and $recordsarray[15] != "")?	$recordsarray[15]:NULL;
				$ShortName	 = (isset($recordsarray[16])	 and $recordsarray[16] != "")?	$recordsarray[16]:NULL;
				$StateProvZip	 = (isset($recordsarray[17])	 and $recordsarray[17] != "")?	$recordsarray[17]:NULL;
				$Title	 = (isset($recordsarray[18])	 and $recordsarray[18] != "")?	$recordsarray[18]:NULL;
				$VoicePhone1	 = (isset($recordsarray[19])	 and $recordsarray[19] != "")?	$recordsarray[19]:NULL;
				$VoicePhone2	 = (isset($recordsarray[20])	 and $recordsarray[20] != "")?	$recordsarray[20]:NULL;


					if (!LogicManager::CKRecordExistwithOnePK('Personnel','ShortName',$ShortName,'Personnel')) {
						$addOk = LogicManager::addPersonnel($LastName,$FirstName,$ShortName,$Title,$Address1,$Address2,$Address3,$Institution,$City,$StateProvZip,$Country,$VoicePhone1,$VoicePhone2,$FaxPhone,$Internet,$PersonnelRecChangedDate,$Notes,$Group,$PersonnelRecordDate,$Project,$PersonnelRecChangedBy);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import ".$ShortName."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import ".$ShortName."</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import ".$ShortName."Record is exsist</font></br>";
					}}
			}

		}
			break;


		case "Phylum":
		{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {

				$Kingdom 	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$Phylum	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$PhylumCustom1	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$PhylumCustom2	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;
				$Subkingdom	 = (isset($recordsarray[4])	 and $recordsarray[4] != "")?	$recordsarray[4]:NULL;




					if (!LogicManager::CKRecordExistwithOnePK('Phylum','Phylum',$Phylum,'Phylum')) {
						$addOk = LogicManager::addPhylum($Phylum,$Subkingdom,$Kingdom,$PhylumCustom1,$PhylumCustom2);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import ".$Phylum."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import ".$Phylum."Please check Kingdom is exsist</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import ".$Phylum."Record is exsist</font></br>";
					}}
			}

		}
			break;


		case "Project":
		{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {

				$Active	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$Heading	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$Note	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$ProjectName	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;
				$ProjectRecChangedBy	 = (isset($recordsarray[4])	 and $recordsarray[4] != "")?	$recordsarray[4]:NULL;
				$ProjectRecChangedDate	 = (isset($recordsarray[5])	 and $recordsarray[5] != "")?	$recordsarray[5]:NULL;
				$ProjectRecordDate	 = (isset($recordsarray[6])	 and $recordsarray[6] != "")?	$recordsarray[6]:NULL;
				$ProjectShortName	 = (isset($recordsarray[7])	 and $recordsarray[7] != "")?	$recordsarray[7]:NULL;



					if (!LogicManager::CKRecordExistwithOnePK('Project','ProjectShortName',$ProjectShortName,'Project')) {
						$addOk = LogicManager::addProject($ProjectName,$ProjectShortName,$Note,$Heading,$ProjectRecordDate,$ProjectRecChangedDate,$Active,$ProjectRecChangedBy);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import ".$ProjectShortName."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import ".$ProjectShortName."</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import ".$ProjectShortName."Record is exsist</font></br>";
					}}
			}

		}
			break;


		case "Reference":
		{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {

				$Author	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$AuthorIndex	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$Editor	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$JournalOrEditedBook	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;
				$JournalOrEditedBookIndex	 = (isset($recordsarray[4])	 and $recordsarray[4] != "")?	$recordsarray[4]:NULL;
				$Pages	 = (isset($recordsarray[5])	 and $recordsarray[5] != "")?	$recordsarray[5]:NULL;
				$PlacePublished	 = (isset($recordsarray[6])	 and $recordsarray[6] != "")?	$recordsarray[6]:NULL;
				$Publisher	 = (isset($recordsarray[7])	 and $recordsarray[7] != "")?	$recordsarray[7]:NULL;
				$ReferenceNo	 = (isset($recordsarray[8])	 and $recordsarray[8] != "")?	$recordsarray[8]:NULL;
				$ReferenceRecChangedBy	 = (isset($recordsarray[9])	 and $recordsarray[9] != "")?	$recordsarray[9]:NULL;
				$ReferenceRecChangedDate	 = (isset($recordsarray[10])	 and $recordsarray[10] != "")?	$recordsarray[10]:NULL;
				$ReferenceRecordDate	 = (isset($recordsarray[11])	 and $recordsarray[11] != "")?	$recordsarray[11]:NULL;
				$ReferenceType	 = (isset($recordsarray[12])	 and $recordsarray[12] != "")?	$recordsarray[12]:NULL;
				$Title	 = (isset($recordsarray[13])	 and $recordsarray[13] != "")?	$recordsarray[13]:NULL;
				$TitleIndex	 = (isset($recordsarray[14])	 and $recordsarray[14] != "")?	$recordsarray[14]:NULL;
				$URL	 = (isset($recordsarray[15])	 and $recordsarray[15] != "")?	$recordsarray[15]:NULL;
				$Volume	 = (isset($recordsarray[16])	 and $recordsarray[16] != "")?	$recordsarray[16]:NULL;
				$Year	 = (isset($recordsarray[17])	 and $recordsarray[17] != "")?	$recordsarray[17]:NULL;



					if (!LogicManager::CKRecordExistwithOnePK('Reference','ReferenceNo',$ReferenceNo,'Reference')) {
						$addOk = LogicManager::addReference($ReferenceNo,$ReferenceType,$Author,$Year,$Title,$Editor,$JournalOrEditedBook,$PlacePublished,$Publisher,$Volume,$Pages,$URL,$AuthorIndex,$TitleIndex,$JournalOrEditedBookIndex,$ReferenceRecordDate,$ReferenceRecChangedDate,$ReferenceRecChangedBy);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import ".$ReferenceNo."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import ".$ReferenceNo."</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import ".$ReferenceNo."Record is exsist</font></br>";
					}}
			}

		}
			break;


		case "ReferenceLinks":
		{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {

				$RecordCode	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$ReferenceNo	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$TableNumber	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;



					if (!LogicManager::CKRecordExistwithThreePK('ReferenceLinks','TableName',$TableName,'RecordCode',$RecordCode,'ReferenceNo',$ReferenceNo,'ReferenceLinks')) {
						$addOk = LogicManager::addReferenceLinksBiota($TableNumber,$RecordCode,$ReferenceNo);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import link on ".$ReferenceNo."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import link on ".$ReferenceNo."</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import link on ".$ReferenceNo."Record is exsist</font></br>";
					}}
			}

		}
			break;


		case "Species":
		{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				var_dump($recordsarray);
				if (count($recordsarray)>1) {

				$AuxiliaryFields	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$CommonName	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$Distribution	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$Genus	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;
				$NumberImages	 = (isset($recordsarray[4])	 and $recordsarray[4] != "")?	$recordsarray[4]:NULL;
				$Section	 = (isset($recordsarray[5])	 and $recordsarray[5] != "")?	$recordsarray[5]:NULL;
				$SpeciesAuthor	 = (isset($recordsarray[6])	 and $recordsarray[6] != "")?	$recordsarray[6]:NULL;
				$SpeciesCode	 = (isset($recordsarray[7])	 and $recordsarray[7] != "")?	$recordsarray[7]:NULL;
				$SpeciesName	 = (isset($recordsarray[8])	 and $recordsarray[8] != "")?	$recordsarray[8]:NULL;
				$SppRecChangedBy	 = (isset($recordsarray[9])	 and $recordsarray[9] != "")?	$recordsarray[9]:NULL;
				$SppRecChangedDate	 = (isset($recordsarray[10])	 and $recordsarray[10] != "")?	$recordsarray[10]:NULL;
				$SppRecordDate	 = (isset($recordsarray[11])	 and $recordsarray[11] != "")?	$recordsarray[11]:NULL;
				$Subgenus	 = (isset($recordsarray[12])	 and $recordsarray[12] != "")?	$recordsarray[12]:NULL;
				$SubspAuthor	 = (isset($recordsarray[13])	 and $recordsarray[13] != "")?	$recordsarray[13]:NULL;
				$Subspecies	 = (isset($recordsarray[14])	 and $recordsarray[14] != "")?	$recordsarray[14]:NULL;
				$TypeDepository	 = (isset($recordsarray[15])	 and $recordsarray[15] != "")?	$recordsarray[15]:NULL;
				$TypeLocality	 = (isset($recordsarray[16])	 and $recordsarray[16] != "")?	$recordsarray[16]:NULL;
				$ValidSpCode	 = (isset($recordsarray[17])	 and $recordsarray[17] != "")?	$recordsarray[17]:NULL;
				$Variety	 = (isset($recordsarray[18])	 and $recordsarray[18] != "")?	$recordsarray[18]:NULL;
				$VarietyAuthor	 = (isset($recordsarray[19])	 and $recordsarray[19] != "")?	$recordsarray[19]:NULL;



					if (!LogicManager::CKRecordExistwithOnePK('Species','SpeciesCode',$SpeciesCode,'Species')) {
						$addOk = LogicManager::addSpecies($SpeciesCode,$ValidSpCode,$SpeciesName,$Genus,$SpeciesAuthor,$Subgenus,$NumberImages,$SppRecordDate,$AuxiliaryFields,$Subspecies,$SubspAuthor,$Variety,$VarietyAuthor,$CommonName,$Distribution,$TypeLocality,$TypeDepository,$Section,$SppRecChangedDate,$SppRecChangedBy);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import ".$SpeciesCode."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import ".$SpeciesCode."</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import ".$SpeciesCode."Record is exsist</font></br>";
					}}
			}

		}
			break;


		case "SpeciesNote":
		{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {

				$NoteBy 	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$NoteDate 	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$NoteText 	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$Null	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;
				$SpeciesCode 	 = (isset($recordsarray[4])	 and $recordsarray[4] != "")?	$recordsarray[4]:NULL;



					if (!LogicManager::CKRecordExistwithFourPK('SpeciesNotes','SpeciesCode',$SpeciesCode,'NoteDate',$NoteDate,'NoteBy',$NoteBy,'NoteText',$NoteText,'SpeciesNotes')) {
						$addOk = LogicManager::addSpeciesNotes($SpeciesCode,$NoteDate,$NoteBy,$NoteText,$Null);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import note by ".$NoteBy." on ".$NoteDate." about Species ".$SpeciesCode."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import note by ".$NoteBy." on ".$NoteDate." about Species ".$SpeciesCode."</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import note by ".$NoteBy." on ".$NoteDate." about Species ".$SpeciesCode."Record is exsist</font></br>";
					}}
			}

		}
			break;


		case "Specimen":
		{
			foreach ($Linearray as $line) {

				$recordsarray = split("\t",$line);

				if (count($recordsarray)>1) {

				$Abundance	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$AuxiliaryFields	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$CollectionCode	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$DateDetermined	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;
				$DateDetFlag	 = (isset($recordsarray[4])	 and $recordsarray[4] != "")?	$recordsarray[4]:NULL;
				$DatePrepared	 = (isset($recordsarray[5])	 and $recordsarray[5] != "")?	$recordsarray[5]:NULL;
				$DatePrepFlag	 = (isset($recordsarray[6])	 and $recordsarray[6] != "")?	$recordsarray[6]:NULL;
				$Deposited	 = (isset($recordsarray[7])	 and $recordsarray[7] != "")?	$recordsarray[7]:NULL;
				$DeterminedBy	 = (isset($recordsarray[8])	 and $recordsarray[8] != "")?	$recordsarray[8]:NULL;
				$Medium	 = (isset($recordsarray[9])	 and $recordsarray[9] != "")?	$recordsarray[9]:NULL;
				$NumberImages	 = (isset($recordsarray[10])	 and $recordsarray[10] != "")?	$recordsarray[10]:NULL;
				$PreparedBy	 = (isset($recordsarray[11])	 and $recordsarray[11] != "")?	$recordsarray[11]:NULL;
				$SpcmRecChangedBy	 = (isset($recordsarray[12])	 and $recordsarray[12] != "")?	$recordsarray[12]:NULL;
				$SpcmRecChangedDate	 = (isset($recordsarray[13])	 and $recordsarray[13] != "")?	$recordsarray[13]:NULL;
				$SpcmRecordDate	 = (isset($recordsarray[14])	 and $recordsarray[14] != "")?	$recordsarray[14]:NULL;
				$SpeciesCode	 = (isset($recordsarray[15])	 and $recordsarray[15] != "")?	$recordsarray[15]:NULL;
				$SpecimenCode	 = (isset($recordsarray[16])	 and $recordsarray[16] != "")?	$recordsarray[16]:NULL;
				$SpecimenCustom1	 = (isset($recordsarray[17])	 and $recordsarray[17] != "")?	$recordsarray[17]:NULL;
				$SpecimenCustom2	 = (isset($recordsarray[18])	 and $recordsarray[18] != "")?	$recordsarray[18]:NULL;
				$StageSex	 = (isset($recordsarray[19])	 and $recordsarray[19] != "")?	$recordsarray[19]:NULL;
				$Storage	 = (isset($recordsarray[20])	 and $recordsarray[20] != "")?	$recordsarray[20]:NULL;
				$TypeStatus	 = (isset($recordsarray[21])	 and $recordsarray[21] != "")?	$recordsarray[21]:NULL;




					if (!LogicManager::CKRecordExistwithOnePK('Specimen','SpecimenCode',$SpecimenCode,'Specimen')) {
						$addOk = LogicManager::addSpecimenBiota($SpecimenCode,$CollectionCode,$SpeciesCode,$DeterminedBy,
					$DateDetermined,$Deposited,$Medium,$Storage,$Abundance,$StageSex,$PreparedBy,$DatePrepared,$SpcmRecordDate,
					$AuxiliaryFields,$DateDetFlag,$DatePrepFlag,$TypeStatus,$SpcmRecChangedDate,$NumberImages,$SpcmRecChangedBy,
					$SpecimenCustom1,$SpecimenCustom2);
                        if ($addOk) {
							$result = $result."<font color=green>Sucess on import ".$SpecimenCode."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import ".$SpecimenCode."</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import ".$SpecimenCode."Record is exsist</font></br>";
					}}
			}

		}
			break;


		case "SpecimenNotes":
		{
			foreach ($Linearray as $line) {
				$recordsarray = split("\t",$line);
				if (count($recordsarray)>1) {

				$NoteBy 	 = (isset($recordsarray[0])	 and $recordsarray[0] != "")?	$recordsarray[0]:NULL;
				$NoteDate 	 = (isset($recordsarray[1])	 and $recordsarray[1] != "")?	$recordsarray[1]:NULL;
				$NoteText 	 = (isset($recordsarray[2])	 and $recordsarray[2] != "")?	$recordsarray[2]:NULL;
				$Null	 = (isset($recordsarray[3])	 and $recordsarray[3] != "")?	$recordsarray[3]:NULL;
				$SpecimenCode 	 = (isset($recordsarray[4])	 and $recordsarray[4] != "")?	$recordsarray[4]:NULL;




					if (!LogicManager::CKRecordExistwithFourPK('Specimennotes','specimencode',$SpecimenCode,'NoteDate',$NoteDate,'NoteBy',$NoteBy,'NoteText',$NoteText,'SpecimenNotes')) {
						$addOk = LogicManager::addSpecimenNotes($SpecimenCode,$NoteDate,$NoteBy,$NoteText,$Null);
						if ($addOk) {
							$result = $result."<font color=green>Sucess on import note by ".$NoteBy." on ".$NoteDate." about Specimen ".$SpecimenCode."</font></br>";
						}else{
							$result = $result."<font color=red>Fail on import note by ".$NoteBy." on ".$NoteDate." about Specimen ".$SpecimenCode." Please Check Collection and Species is exist</font></br>";
						}
					}else{
						$result = $result."<font color=red>Fail on import note by ".$NoteBy." on ".$NoteDate." about Specimen ".$SpecimenCode."Record is exsist</font></br>";
					}}
			}

		}
			break;


		case "ImageArchive":
			$result = "image table need to work on";
			break;
	default:
		;
} // switch
}
echo $result;

$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>