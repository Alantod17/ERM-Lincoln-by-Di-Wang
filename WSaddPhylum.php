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

$Phylum = (isset($_POST["Phylum"]) and $_POST["Phylum"]!="")?$_POST["Phylum"]:NULL;
$Subkingdom = (isset($_POST["Subkingdom"]) and $_POST["Subkingdom"]!="")?$_POST["Subkingdom"]:NULL;
$Kingdom = (isset($_POST["Kingdom"]) and $_POST["Kingdom"]!="")?$_POST["Kingdom"]:NULL;
$PhylumCustom1 = (isset($_POST["PhylumCustom1"]) and $_POST["PhylumCustom1"]!="")?$_POST["PhylumCustom1"]:NULL;
$PhylumCustom2 = (isset($_POST["PhylumCustom2"]) and $_POST["PhylumCustom2"]!="")?$_POST["PhylumCustom2"]:NULL;


$PhylumExist = LogicManager::CKRecordExistwithOnePK('Phylum','Phylum',$Phylum,'Phylum');


$OldPhylum =(isset($_POST["OldPhylum"]) and $_POST["OldPhylum"]!="")?$_POST["OldPhylum"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;


switch ($function) {
	case "Add a New Record":
	{
		if (!$PhylumExist) {
			$result = LogicManager::addPhylum($Phylum,$Subkingdom,$Kingdom,$PhylumCustom1,$PhylumCustom2);
		}else{
			echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}

	};
	break;
	case "Edit This Record":{
		$result = LogicManager::DeleteWithOnePK("Phylum","Phylum","$OldPhylum");
		$result = LogicManager::addPhylum($Phylum,$Subkingdom,$Kingdom,$PhylumCustom1,$PhylumCustom2);
	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteWithOnePK("Phylum","Phylum","$OldPhylum");
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
	echo "</br></br><a href='inputPhylum.php'>Go back to Add Another Phylum</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=Phylum'>View All Phylum</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>