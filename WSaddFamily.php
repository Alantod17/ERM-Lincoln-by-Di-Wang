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


 $Family = (isset($_POST["Family"]) and $_POST["Family"]!="")?$_POST["Family"]:NULL;
 $Superfamily = (isset($_POST["Superfamily"]) and $_POST["Superfamily"]!="")?$_POST["Superfamily"]:NULL;
 $Order = (isset($_POST["Order"]) and $_POST["Order"]!="")?$_POST["Order"]:NULL;
 $Suborder = (isset($_POST["Suborder"]) and $_POST["Suborder"]!="")?$_POST["Suborder"]:NULL;
 $FamilyCustom1 = (isset($_POST["FamilyCustom1"]) and $_POST["FamilyCustom1"]!="")?$_POST["FamilyCustom1"]:NULL;
 $FamilyCustom2 = (isset($_POST["FamilyCustom2"]) and $_POST["FamilyCustom2"]!="")?$_POST["FamilyCustom2"]:NULL;
 $FamilyCustom3 = (isset($_POST["FamilyCustom3"]) and $_POST["FamilyCustom3"]!="")?$_POST["FamilyCustom3"]:NULL;

$FamilyExist = LogicManager::CKRecordExistwithOnePK('Family','Family',$Family,'Family');


$OldFamily =(isset($_POST["OldFamily"]) and $_POST["OldFamily"]!="")?$_POST["OldFamily"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;


switch ($function) {
	case "Add a New Record":
	{
		if (!$FamilyExist) {
			$result = LogicManager::addFamily($Family,$Superfamily,$Order,$Suborder,$FamilyCustom1,$FamilyCustom2,$FamilyCustom3);
		}else{
			echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}
	};
	break;
	case "Edit This Record":{
		$result = LogicManager::DeleteWithOnePK("Family","Family","$OldFamily");
		$result = LogicManager::addFamily($Family,$Superfamily,$Order,$Suborder,$FamilyCustom1,$FamilyCustom2,$FamilyCustom3);
	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteWithOnePK("Family","Family","$OldFamily");
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
	echo "</br></br><a href='inputFamily.php'>Go back to Add Another Family</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=family>View All Family</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>