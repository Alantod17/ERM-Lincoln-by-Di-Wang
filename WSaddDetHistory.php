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
$hg->openBody("Input");
$hg->openContent();

$SpecimenCode = (isset($_POST["SpecimenCode"]) and $_POST["SpecimenCode"]!="")?$_POST["SpecimenCode"]:NULL;
$SpeciesCode = (isset($_POST["SpeciesCode"]) and $_POST["SpeciesCode"]!="")?$_POST["SpeciesCode"]:NULL;
$Genus = (isset($_POST["Genus"]) and $_POST["Genus"]!="")?$_POST["Genus"]:NULL;
$SpeciesName = (isset($_POST["SpeciesName"]) and $_POST["SpeciesName"]!="")?$_POST["SpeciesName"]:NULL;
$SpeciesAuthor = (isset($_POST["SpeciesAuthor"]) and $_POST["SpeciesAuthor"]!="")?$_POST["SpeciesAuthor"]:NULL;
$DeterminedBy = (isset($_POST["DeterminedBy"]) and $_POST["DeterminedBy"]!="")?$_POST["DeterminedBy"]:NULL;
$DateDetermined = (isset($_POST["DateDetermined"]) and $_POST["DateDetermined"]!="")?$_POST["DateDetermined"]:NULL;
$DateDetermined = LogicManager::DateEtoA($DateDetermined);
$WhereChanged = (isset($_POST["WhereChanged"]) and $_POST["WhereChanged"]!="")?$_POST["WhereChanged"]:NULL;
$DateChanged = (isset($_POST["DateChanged"]) and $_POST["DateChanged"]!="")?$_POST["DateChanged"]:NULL;
$DateChanged = LogicManager::DateEtoA($DateChanged);
$ChangedBy = (isset($_POST["ChangedBy"]) and $_POST["ChangedBy"]!="")?$_POST["ChangedBy"]:NULL;
$DateDetFlag = (isset($_POST["DateDetFlag"]) and $_POST["DateDetFlag"]!="")?$_POST["DateDetFlag"]:NULL;
$Sequence = (isset($_POST["Sequence"]) and $_POST["Sequence"]!="")?$_POST["Sequence"]:NULL;
$Subspecies = (isset($_POST["Subspecies"]) and $_POST["Subspecies"]!="")?$_POST["Subspecies"]:NULL;
$SubspAuthor = (isset($_POST["SubspAuthor"]) and $_POST["SubspAuthor"]!="")?$_POST["SubspAuthor"]:NULL;
$Variety = (isset($_POST["Variety"]) and $_POST["Variety"]!="")?$_POST["Variety"]:NULL;
$VarietyAuthor = (isset($_POST["VarietyAuthor"]) and $_POST["VarietyAuthor"]!="")?$_POST["VarietyAuthor"]:NULL;



$DetExist = LogicManager::CKRecordExistwithThreePK('DetHistory','SpecimenCode',$SpecimenCode,'DeterminedBy',$DeterminedBy,'DateDetermined',$DateDetermined,'DetHistory');


$OldSpecimenCode=(isset($_POST["OldSpecimenCode"]) and $_POST["OldSpecimenCode"]!="")?$_POST["OldSpecimenCode"]:NULL;
$OldDeterminedBy=(isset($_POST["OldDeterminedBy"]) and $_POST["OldDeterminedBy"]!="")?$_POST["OldDeterminedBy"]:NULL;
$OldDateDetermined=(isset($_POST["OldDateDetermined"]) and $_POST["OldDateDetermined"]!="")?$_POST["OldDateDetermined"]:NULL;
$OldDateDetermined = LogicManager::DateEtoA($OldDateDetermined);
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;


switch ($function) {
	case "Add a New Record":
	{
		if (!$DetExist) {
			$result = LogicManager::addDetHistory($SpecimenCode,$SpeciesCode,$Genus,$SpeciesName,$SpeciesAuthor,$DeterminedBy,$DateDetermined,$WhereChanged,$DateChanged,$ChangedBy,$DateDetFlag,$Sequence,$Subspecies,$SubspAuthor,$Variety,$VarietyAuthor);

		}else{
			echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}
			};
	break;
	case "Edit This Record":{
		$result = LogicManager::DeleteWithThreePK("dethistory","SpecimenCode","$OldSpecimenCode","DeterminedBy","$OldDeterminedBy","DateDetermined","$OldDateDetermined");
		$result = LogicManager::addDetHistory($SpecimenCode,$SpeciesCode,$Genus,$SpeciesName,$SpeciesAuthor,$DeterminedBy,$DateDetermined,$WhereChanged,$DateChanged,$ChangedBy,$DateDetFlag,$Sequence,$Subspecies,$SubspAuthor,$Variety,$VarietyAuthor);
	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteWithThreePK("dethistory","SpecimenCode","$OldSpecimenCode","DeterminedBy","$OldDeterminedBy","DateDetermined","$OldDateDetermined");
	};
	break;
} // switch



if ($result) {
	echo "<h1 style='color:Green;'>".$function." OK</h1>";
}
else{
	echo "<h1 style='color:Red;'>".$function." Fail</h1>";
}

if ($function=="Add a New Record") {
	echo "</br></br><a href='inputDetHistory.php'>Go back to Add Another DetHistory</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=DetHistory'>View All DetHistory</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();

?>