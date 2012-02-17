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

$Genus = (isset($_POST["Genus"]) and $_POST["Genus"]!="")?$_POST["Genus"]:NULL;
$Tribe = (isset($_POST["Tribe"]) and $_POST["Tribe"]!="")?$_POST["Tribe"]:NULL;
$Family = (isset($_POST["Family"]) and $_POST["Family"]!="")?$_POST["Family"]:NULL;
$Subfamily = (isset($_POST["Subfamily"]) and $_POST["Subfamily"]!="")?$_POST["Subfamily"]:NULL;
$GenusCustom1 = (isset($_POST["GenusCustom1"]) and $_POST["GenusCustom1"]!="")?$_POST["GenusCustom1"]:NULL;
$GenusCustom2 = (isset($_POST["GenusCustom2"]) and $_POST["GenusCustom2"]!="")?$_POST["GenusCustom2"]:NULL;
$GenusCustom3 = (isset($_POST["GenusCustom3"]) and $_POST["GenusCustom3"]!="")?$_POST["GenusCustom3"]:NULL;

$GenusExist = LogicManager::CKRecordExistwithOnePK('Genus','Genus',$Genus,'Genus');



$OldGenus =(isset($_POST["OldGenus"]) and $_POST["OldGenus"]!="")?$_POST["OldGenus"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;


switch ($function) {
	case "Add a New Record":
	{
		if (!$GenusExist) {
			$result = LogicManager::addGenus($Genus,$Tribe,$Family,$Subfamily,$GenusCustom1,$GenusCustom2,$GenusCustom3);
		}else{
			echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}
			};
	break;
	case "Edit This Record":{
		$result = LogicManager::DeleteWithOnePK("Genus","Genus","$OldGenus");
		$result = LogicManager::addGenus($Genus,$Tribe,$Family,$Subfamily,$GenusCustom1,$GenusCustom2,$GenusCustom3);
	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteWithOnePK("Genus","Genus","$OldGenus");
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
	echo "</br></br><a href='inputgenus.php'>Go back to Add Another Genus</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=Genus'>View All Genus</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>