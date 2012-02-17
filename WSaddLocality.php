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

$LocalityCode = (isset($_POST["LocalityCode"]) and $_POST["LocalityCode"]!="")?$_POST["LocalityCode"]:NULL;
$StateProvince = (isset($_POST["StateProvince"]) and $_POST["StateProvince"]!="")?$_POST["StateProvince"]:NULL;
$Country = (isset($_POST["Country"]) and $_POST["Country"]!="")?$_POST["Country"]:NULL;
$Latitude = (isset($_POST["Latitude"]) and $_POST["Latitude"]!="")?$_POST["Latitude"]:NULL;
$Longitude = (isset($_POST["Longitude"]) and $_POST["Longitude"]!="")?$_POST["Longitude"]:NULL;
$Elevation = (isset($_POST["Elevation"]) and $_POST["Elevation"]!="")?$_POST["Elevation"]:NULL;
$District = (isset($_POST["District"]) and $_POST["District"]!="")?$_POST["District"]:NULL;
$LocalityName = (isset($_POST["LocalityName"]) and $_POST["LocalityName"]!="")?$_POST["LocalityName"]:NULL;
$LocRecordDate = (isset($_POST["LocRecordDate"]) and $_POST["LocRecordDate"]!="")?$_POST["LocRecordDate"]:NULL;
$LocRecordDate = LogicManager::DateEtoA($LocRecordDate);
$AuxiliaryFields = (isset($_POST["AuxiliaryFields"]) and $_POST["AuxiliaryFields"]!="")?$_POST["AuxiliaryFields"]:NULL;
$LatLongAccuracy = (isset($_POST["LatLongAccuracy"]) and $_POST["LatLongAccuracy"]!="")?$_POST["LatLongAccuracy"]:NULL;
$AltCoordinate1 = (isset($_POST["AltCoordinate1"]) and $_POST["AltCoordinate1"]!="")?$_POST["AltCoordinate1"]:NULL;
$AltCoordinate2 = (isset($_POST["AltCoordinate2"]) and $_POST["AltCoordinate2"]!="")?$_POST["AltCoordinate2"]:NULL;
$AltCoordinate3 = (isset($_POST["AltCoordinate3"]) and $_POST["AltCoordinate3"]!="")?$_POST["AltCoordinate3"]:NULL;
$LocRecChangedDate = (isset($_POST["LocRecChangedDate"]) and $_POST["LocRecChangedDate"]!="")?$_POST["LocRecChangedDate"]:NULL;
$LocRecordDate = LogicManager::DateEtoA($LocRecordDate);
$NumberImages = (isset($_POST["NumberImages"]) and $_POST["NumberImages"]!="")?$_POST["NumberImages"]:NULL;
$LocalityNameIndex = (isset($_POST["LocalityNameIndex"]) and $_POST["LocalityNameIndex"]!="")?$_POST["LocalityNameIndex"]:NULL;
$LocRecChangedBy = (isset($_POST["LocRecChangedBy"]) and $_POST["LocRecChangedBy"]!="")?$_POST["LocRecChangedBy"]:NULL;

$LocalityExist = LogicManager::CKRecordExistwithOnePK('Locality','LocalityCode',$LocalityCode,'Locality');



$OldLocalityCode =(isset($_POST["OldLocalityCode"]) and $_POST["OldLocalityCode"]!="")?$_POST["OldLocalityCode"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;

switch ($function) {
	case "Add a New Record":
	{
		if (!$LocalityExist) {
			$result = LogicManager::addLocality($LocalityCode,$StateProvince,$Country,$Latitude,$Longitude,$Elevation,$District,$LocalityName,$LocRecordDate,$AuxiliaryFields,$LatLongAccuracy,$AltCoordinate1,$AltCoordinate2,$AltCoordinate3,$LocRecChangedDate,$NumberImages,$LocalityNameIndex,$LocRecChangedBy);

		}else{
			echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}

	};
	break;
	case "Edit This Record":{
		$result = LogicManager::DeleteWithOnePK("Locality","LocalityCode","$OldLocalityCode");
		$result = LogicManager::addLocality($LocalityCode,$StateProvince,$Country,$Latitude,$Longitude,$Elevation,$District,$LocalityName,$LocRecordDate,$AuxiliaryFields,$LatLongAccuracy,$AltCoordinate1,$AltCoordinate2,$AltCoordinate3,$LocRecChangedDate,$NumberImages,$LocalityNameIndex,$LocRecChangedBy);

	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteWithOnePK("Locality","LocalityCode","$OldLocalityCode");
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
	echo "</br></br><a href='inputLocality.php'>Go back to Add Another Locality</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=Locality'>View All Locality</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>