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
$CollectionCode = (isset($_POST["CollectionCode"]) and $_POST["CollectionCode"]!="")?$_POST["CollectionCode"]:NULL;
$SpeciesCode = (isset($_POST["SpeciesCode"]) and $_POST["SpeciesCode"]!="")?$_POST["SpeciesCode"]:NULL;
$DeterminedBy = (isset($_POST["DeterminedBy"]) and $_POST["DeterminedBy"]!="")?$_POST["DeterminedBy"]:NULL;
$DateDetermined = (isset($_POST["DateDetermined"]) and $_POST["DateDetermined"]!="")?$_POST["DateDetermined"]:NULL;
$DateDetermined = LogicManager::DateEtoA($DateDetermined);

$Deposited = (isset($_POST["Deposited"]) and $_POST["Deposited"]!="")?$_POST["Deposited"]:NULL;
$Medium = (isset($_POST["Medium"]) and $_POST["Medium"]!="")?$_POST["Medium"]:NULL;
$Storage = (isset($_POST["Storage"]) and $_POST["Storage"]!="")?$_POST["Storage"]:NULL;
$Abundance = (isset($_POST["Abundance"]) and $_POST["Abundance"]!="")?$_POST["Abundance"]:NULL;
$StageSex = (isset($_POST["StageSex"]) and $_POST["StageSex"]!="")?$_POST["StageSex"]:NULL;
$PreparedBy = (isset($_POST["PreparedBy"]) and $_POST["PreparedBy"]!="")?$_POST["PreparedBy"]:NULL;
$DatePrepared = (isset($_POST["DatePrepared"]) and $_POST["DatePrepared"]!="")?$_POST["DatePrepared"]:NULL;
$SpcmRecordDate = (isset($_POST["SpcmRecordDate"]) and $_POST["SpcmRecordDate"]!="")?$_POST["SpcmRecordDate"]:NULL;
$SpcmRecordDate = LogicManager::DateEtoA($SpcmRecordDate);

$AuxiliaryFields = (isset($_POST["AuxiliaryFields"]) and $_POST["AuxiliaryFields"]!="")?$_POST["AuxiliaryFields"]:NULL;
$DateDetFlag = (isset($_POST["DateDetFlag"]) and $_POST["DateDetFlag"]!="")?$_POST["DateDetFlag"]:NULL;
$DatePrepFlag = (isset($_POST["DatePrepFlag"]) and $_POST["DatePrepFlag"]!="")?$_POST["DatePrepFlag"]:NULL;
$TypeStatus = (isset($_POST["TypeStatus"]) and $_POST["TypeStatus"]!="")?$_POST["TypeStatus"]:NULL;
$SpcmRecChangedDate = (isset($_POST["SpcmRecChangedDate"]) and $_POST["SpcmRecChangedDate"]!="")?$_POST["SpcmRecChangedDate"]:NULL;
$SpcmRecChangedDate = LogicManager::DateEtoA($SpcmRecChangedDate);

$NumberImages = (isset($_POST["NumberImages"]) and $_POST["NumberImages"]!="")?$_POST["NumberImages"]:NULL;
$SpcmRecChangedBy = (isset($_POST["SpcmRecChangedBy"]) and $_POST["SpcmRecChangedBy"]!="")?$_POST["SpcmRecChangedBy"]:NULL;
$SpecimenCustom1 = (isset($_POST["SpecimenCustom1"]) and $_POST["SpecimenCustom1"]!="")?$_POST["SpecimenCustom1"]:NULL;
$SpecimenCustom2 = (isset($_POST["SpecimenCustom2"]) and $_POST["SpecimenCustom2"]!="")?$_POST["SpecimenCustom2"]:NULL;
$Genus = (isset($_POST["Genus"]) and $_POST["Genus"]!="")?$_POST["Genus"]:NULL;
$Family = (isset($_POST["Family"]) and $_POST["Family"]!="")?$_POST["Family"]:NULL;
$Order = (isset($_POST["Order"]) and $_POST["Order"]!="")?$_POST["Order"]:NULL;
$Classes = (isset($_POST["Classes"]) and $_POST["Classes"]!="")?$_POST["Classes"]:NULL;


$SpecimenExist = LogicManager::CKRecordExistwithOnePK('Specimen','SpecimenCode',$SpecimenCode,'Specimen');


$OldSpecimenCode =(isset($_POST["OldSpecimenCode"]) and $_POST["OldSpecimenCode"]!="")?$_POST["OldSpecimenCode"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;




switch ($function) {
	case "Add a New Record":
	{
		if (!$SpecimenExist) {
				$result = LogicManager::addSpecimen($SpecimenCode,$CollectionCode,$SpeciesCode,$DeterminedBy,
			$DateDetermined,$Deposited,$Medium,$Storage,$Abundance,$StageSex,$PreparedBy,$DatePrepared,
			$SpcmRecordDate,$AuxiliaryFields,$DateDetFlag,$DatePrepFlag,$TypeStatus,$SpcmRecChangedDate,
			$NumberImages,$SpcmRecChangedBy,$SpecimenCustom1,$SpecimenCustom2,$Genus,$Family,$Order,$Classes);
		}else{
			echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}

	};
		break;
	case "Edit This Record":{
		$result = LogicManager::DeleteWithOnePK("Specimen","SpecimenCode","$OldSpecimenCode");
		$result = LogicManager::addSpecimen($SpecimenCode,$CollectionCode,$SpeciesCode,$DeterminedBy,
			$DateDetermined,$Deposited,$Medium,$Storage,$Abundance,$StageSex,$PreparedBy,$DatePrepared,
			$SpcmRecordDate,$AuxiliaryFields,$DateDetFlag,$DatePrepFlag,$TypeStatus,$SpcmRecChangedDate,
			$NumberImages,$SpcmRecChangedBy,$SpecimenCustom1,$SpecimenCustom2,$Genus,$Family,$Order,$Classes);
		$result = LogicManager::updateImageArchive($SpecimenCode,$OldSpecimenCode);
		$result = LogicManager::updateLoan($SpecimenCode,$OldSpecimenCode);
	};
		break;
	case "Delete This Record":
	{
		$imagearray = LogicManager::getImageArchive($SpecimenCode);
		foreach($imagearray as $image){
			$imageName = $image->getImageName();
			$SmallImageName = $image->getSmallImageName();
			$SpecimenNO = $image->getSpecimenNo();
			$FilePath = $image->getPathToFile();
			$SmallImageURL = $FilePath.$SmallImageName;
			$ImageURL = $FilePath.$imageName;
			$result = unlink($SmallImageURL);
			$result = unlink($ImageURL);

		}
		$result = LogicManager::DeleteWithOnePK("ImageArchive","SpecimenNo","$OldSpecimenCode");
		$result = LogicManager::DeleteWithOnePK("Specimen","SpecimenCode","$OldSpecimenCode");
		$result = LogicManager::DeleteWithOnePK("Loans","SpecimenCode","$OldSpecimenCode");

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
	echo "</br></br><a href='inputSpecimen.php'>Go back to Add Another Specimen</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=Specimen'>View All Specimen</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();

?>