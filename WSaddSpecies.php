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

$SpeciesCode = (isset($_POST["SpeciesCode"]) and $_POST["SpeciesCode"]!="")?$_POST["SpeciesCode"]:NULL;
$ValidSpCode = (isset($_POST["ValidSpCode"]) and $_POST["ValidSpCode"]!="")?$_POST["ValidSpCode"]:NULL;
$SpeciesName = (isset($_POST["SpeciesName"]) and $_POST["SpeciesName"]!="")?$_POST["SpeciesName"]:NULL;
$Genus = (isset($_POST["Genus"]) and $_POST["Genus"]!="")?$_POST["Genus"]:NULL;
$SpeciesAuthor = (isset($_POST["SpeciesAuthor"]) and $_POST["SpeciesAuthor"]!="")?$_POST["SpeciesAuthor"]:NULL;
$Subgenus = (isset($_POST["Subgenus"]) and $_POST["Subgenus"]!="")?$_POST["Subgenus"]:NULL;
$NumberImages = (isset($_POST["NumberImages"]) and $_POST["NumberImages"]!="")?$_POST["NumberImages"]:NULL;
$SppRecordDate = (isset($_POST["SppRecordDate"]) and $_POST["SppRecordDate"]!="")?$_POST["SppRecordDate"]:NULL;
$SppRecordDate = LogicManager::DateEtoA($SppRecordDate);
$AuxiliaryFields = (isset($_POST["AuxiliaryFields"]) and $_POST["AuxiliaryFields"]!="")?$_POST["AuxiliaryFields"]:NULL;
$Subspecies = (isset($_POST["Subspecies"]) and $_POST["Subspecies"]!="")?$_POST["Subspecies"]:NULL;
$SubspAuthor = (isset($_POST["SubspAuthor"]) and $_POST["SubspAuthor"]!="")?$_POST["SubspAuthor"]:NULL;
$Variety = (isset($_POST["Variety"]) and $_POST["Variety"]!="")?$_POST["Variety"]:NULL;
$VarietyAuthor = (isset($_POST["VarietyAuthor"]) and $_POST["VarietyAuthor"]!="")?$_POST["VarietyAuthor"]:NULL;
$CommonName = (isset($_POST["CommonName"]) and $_POST["CommonName"]!="")?$_POST["CommonName"]:NULL;
$Distribution = (isset($_POST["Distribution"]) and $_POST["Distribution"]!="")?$_POST["Distribution"]:NULL;
$TypeLocality = (isset($_POST["TypeLocality"]) and $_POST["TypeLocality"]!="")?$_POST["TypeLocality"]:NULL;
$TypeDepository = (isset($_POST["TypeDepository"]) and $_POST["TypeDepository"]!="")?$_POST["TypeDepository"]:NULL;
$Section = (isset($_POST["Section"]) and $_POST["Section"]!="")?$_POST["Section"]:NULL;
$SppRecChangedDate = (isset($_POST["SppRecChangedDate"]) and $_POST["SppRecChangedDate"]!="")?$_POST["SppRecChangedDate"]:NULL;
$SppRecChangedDate = LogicManager::DateEtoA($SppRecChangedDate);
$SppRecChangedBy = (isset($_POST["SppRecChangedBy"]) and $_POST["SppRecChangedBy"]!="")?$_POST["SppRecChangedBy"]:NULL;

$SpeciesExist = LogicManager::CKRecordExistwithOnePK('Species','SpeciesCode',$SpeciesCode,'Species');



$OldSpeciesCode =(isset($_POST["OldSpeciesCode"]) and $_POST["OldSpeciesCode"]!="")?$_POST["OldSpeciesCode"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;


switch ($function) {
	case "Add a New Record":
	{
		if (!$SpeciesExist) {
				$result = LogicManager::addSpecies($SpeciesCode,$ValidSpCode,$SpeciesName,$Genus,$SpeciesAuthor,
	$Subgenus,$NumberImages,$SppRecordDate,$AuxiliaryFields,$Subspecies,$SubspAuthor,$Variety,
	$VarietyAuthor,$CommonName,$Distribution,$TypeLocality,$TypeDepository,$Section,
	$SppRecChangedDate,$SppRecChangedBy);
		}else{
			echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}

	};
	break;
	case "Edit This Record":{
		$result = LogicManager::DeleteWithOnePK("Species","SpeciesCode","$OldSpeciesCode");
		$result = LogicManager::addSpecies($SpeciesCode,$ValidSpCode,$SpeciesName,$Genus,$SpeciesAuthor,
	$Subgenus,$NumberImages,$SppRecordDate,$AuxiliaryFields,$Subspecies,$SubspAuthor,$Variety,
	$VarietyAuthor,$CommonName,$Distribution,$TypeLocality,$TypeDepository,$Section,
	$SppRecChangedDate,$SppRecChangedBy);
	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteWithOnePK("Species","SpeciesCode","$OldSpeciesCode");
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
	echo "</br></br><a href='inputSpecies.php'>Go back to Add Another Species</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=Species'>View All Species</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();

?>