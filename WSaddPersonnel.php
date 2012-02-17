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

$LastName = (isset($_POST["LastName"]) and $_POST["LastName"]!="")?$_POST["LastName"]:NULL;
$FirstName = (isset($_POST["FirstName"]) and $_POST["FirstName"]!="")?$_POST["FirstName"]:NULL;
$ShortName = (isset($_POST["ShortName"]) and $_POST["ShortName"]!="")?$_POST["ShortName"]:NULL;
$Title = (isset($_POST["Title"]) and $_POST["Title"]!="")?$_POST["Title"]:NULL;
$Address1 = (isset($_POST["Address1"]) and $_POST["Address1"]!="")?$_POST["Address1"]:NULL;
$Address2 = (isset($_POST["Address2"]) and $_POST["Address2"]!="")?$_POST["Address2"]:NULL;
$Address3 = (isset($_POST["Address3"]) and $_POST["Address3"]!="")?$_POST["Address3"]:NULL;
$Institution = (isset($_POST["Institution"]) and $_POST["Institution"]!="")?$_POST["Institution"]:NULL;
$City = (isset($_POST["City"]) and $_POST["City"]!="")?$_POST["City"]:NULL;
$StateProvZip = (isset($_POST["StateProvZip"]) and $_POST["StateProvZip"]!="")?$_POST["StateProvZip"]:NULL;
$Country = (isset($_POST["Country"]) and $_POST["Country"]!="")?$_POST["Country"]:NULL;
$VoicePhone1 = (isset($_POST["VoicePhone1"]) and $_POST["VoicePhone1"]!="")?$_POST["VoicePhone1"]:NULL;
$VoicePhone2 = (isset($_POST["VoicePhone2"]) and $_POST["VoicePhone2"]!="")?$_POST["VoicePhone2"]:NULL;
$FaxPhone = (isset($_POST["FaxPhone"]) and $_POST["FaxPhone"]!="")?$_POST["FaxPhone"]:NULL;
$Internet = (isset($_POST["Internet"]) and $_POST["Internet"]!="")?$_POST["Internet"]:NULL;
$PersonnelRecChangedDate = (isset($_POST["PersonnelRecChangedDate"]) and $_POST["PersonnelRecChangedDate"]!="")?$_POST["PersonnelRecChangedDate"]:NULL;
$PersonnelRecChangedDate = LogicManager::DateEtoA($PersonnelRecChangedDate);
$Notes = (isset($_POST["Notes"]) and $_POST["Notes"]!="")?$_POST["Notes"]:NULL;
$Group = (isset($_POST["Group"]) and $_POST["Group"]!="")?$_POST["Group"]:NULL;
$PersonnelRecordDate = (isset($_POST["PersonnelRecordDate"]) and $_POST["PersonnelRecordDate"]!="")?$_POST["PersonnelRecordDate"]:NULL;
$PersonnelRecordDate = LogicManager::DateEtoA($PersonnelRecordDate);
$Project = (isset($_POST["Project"]) and $_POST["Project"]!="")?$_POST["Project"]:NULL;
$PersonnelRecChangedBy = (isset($_POST["PersonnelRecChangedBy"]) and $_POST["PersonnelRecChangedBy"]!="")?$_POST["PersonnelRecChangedBy"]:NULL;

$PersonnelExist = LogicManager::CKRecordExistwithOnePK('Personnel','ShortName',$ShortName,'Personnel');


$OldShortName =(isset($_POST["OldShortName"]) and $_POST["OldShortName"]!="")?$_POST["OldShortName"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;

switch ($function) {
	case "Add a New Record":
	{
		if (!$PersonnelExist) {
			$result = LogicManager::addPersonnel($LastName,$FirstName,$ShortName,$Title,$Address1,$Address2,
	$Address3,$Institution,$City,$StateProvZip,$Country,$VoicePhone1,$VoicePhone2,$FaxPhone,
	$Internet,$PersonnelRecChangedDate,$Notes,$Group,$PersonnelRecordDate,$Project,$PersonnelRecChangedBy);

		}else{
			echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}

	};
	break;
	case "Edit This Record":{
		$result = LogicManager::DeleteWithOnePK("Personnel","ShortName","$OldShortName");
		$result = LogicManager::addPersonnel($LastName,$FirstName,$ShortName,$Title,$Address1,$Address2,
	$Address3,$Institution,$City,$StateProvZip,$Country,$VoicePhone1,$VoicePhone2,$FaxPhone,
	$Internet,$PersonnelRecChangedDate,$Notes,$Group,$PersonnelRecordDate,$Project,$PersonnelRecChangedBy);

	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteWithOnePK("Personnel","ShortName","$OldShortName");
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
	echo "</br></br><a href='inputPersonnel.php'>Go back to Add Another Personnel</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=Personnel'>View All Personnel</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>