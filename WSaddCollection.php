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


$CollectionCode = (isset($_POST["CollectionCode"]) and $_POST["CollectionCode"]!="")?$_POST["CollectionCode"]:NULL;
$Method = (isset($_POST["Method"]) and $_POST["Method"]!="")?$_POST["Method"]:NULL;
$CollectedBy = (isset($_POST["CollectedBy"]) and $_POST["CollectedBy"]!="")?$_POST["CollectedBy"]:NULL;
$DateCollected = (isset($_POST["DateCollected"]) and $_POST["DateCollected"]!="")?$_POST["DateCollected"]:NULL;
$DateCollected = LogicManager::DateEtoA($DateCollected);
$Site = (isset($_POST["Site"]) and $_POST["Site"]!="")?$_POST["Site"]:NULL;
$XCoordinate = (isset($_POST["XCoordinate"]) and $_POST["XCoordinate"]!="")?$_POST["XCoordinate"]:NULL;
$YCoordinate = (isset($_POST["YCoordinate"]) and $_POST["YCoordinate"]!="")?$_POST["YCoordinate"]:NULL;
$HostSpcmCode = (isset($_POST["HostSpcmCode"]) and $_POST["HostSpcmCode"]!="")?$_POST["HostSpcmCode"]:NULL;
$LocalityCode = (isset($_POST["LocalityCode"]) and $_POST["LocalityCode"]!="")?$_POST["LocalityCode"]:NULL;
$Source = (isset($_POST["Source"]) and $_POST["Source"]!="")?$_POST["Source"]:NULL;
$XYAccuracy = (isset($_POST["XYAccuracy"]) and $_POST["XYAccuracy"]!="")?$_POST["XYAccuracy"]:NULL;
$CollRecordDate = (isset($_POST["CollRecordDate"]) and $_POST["CollRecordDate"]!="")?$_POST["CollRecordDate"]:NULL;
$CollRecordDate = LogicManager::DateEtoA($CollRecordDate);
$AuxiliaryFields = (isset($_POST["AuxiliaryFields"]) and $_POST["AuxiliaryFields"]!="")?$_POST["AuxiliaryFields"]:NULL;
$DateCollFlag = (isset($_POST["DateCollFlag"]) and $_POST["DateCollFlag"]!="")?$_POST["DateCollFlag"]:NULL;
$DateCollEnd = (isset($_POST["DateCollEnd"]) and $_POST["DateCollEnd"]!="")?$_POST["DateCollEnd"]:NULL;
$DateCollEnd = LogicManager::DateEtoA($DateCollEnd);
$DateCollEndFlag = (isset($_POST["DateCollEndFlag"]) and $_POST["DateCollEndFlag"]!="")?$_POST["DateCollEndFlag"]:NULL;
$CollRecChangedDate = (isset($_POST["CollRecChangedDate"]) and $_POST["CollRecChangedDate"]!="")?$_POST["CollRecChangedDate"]:NULL;
$CollRecChangedDate = LogicManager::DateEtoA($CollRecChangedDate);
$NumberImages = (isset($_POST["NumberImages"]) and $_POST["NumberImages"]!="")?$_POST["NumberImages"]:NULL;
$CollRecChangedBy = (isset($_POST["CollRecChangedBy"]) and $_POST["CollRecChangedBy"]!="")?$_POST["CollRecChangedBy"]:NULL;



$LocalityExist = LogicManager::CKRecordExistwithOnePK('Locality','LocalityCode',$LocalityCode,'Locality' );
if (!$LocalityExist) {
    $LocalityCode = (isset($_POST["LocalityCode"]) and $_POST["LocalityCode"]!="")?$_POST["LocalityCode"]:NULL;
	$StateProvince = (isset($_POST["StateProvinceColl"]) and $_POST["StateProvinceColl"]!="")?$_POST["StateProvinceColl"]:NULL;
	$Country = (isset($_POST["CountryColl"]) and $_POST["CountryColl"]!="")?$_POST["CountryColl"]:NULL;
	$Latitude = (isset($_POST["LatitudeColl"]) and $_POST["LatitudeColl"]!="")?$_POST["LatitudeColl"]:NULL;
	$Longitude = (isset($_POST["LongitudeColl"]) and $_POST["LongitudeColl"]!="")?$_POST["LongitudeColl"]:NULL;
	$Elevation = (isset($_POST["ElevationColl"]) and $_POST["ElevationColl"]!="")?$_POST["ElevationColl"]:NULL;
	$District = (isset($_POST["DistrictColl"]) and $_POST["DistrictColl"]!="")?$_POST["DistrictColl"]:NULL;
	$LocalityName = (isset($_POST["LocalityNameColl"]) and $_POST["LocalityNameColl"]!="")?$_POST["LocalityNameColl"]:NULL;
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
	$LocalityNameIndex = (isset($_POST["LocalityNameIndexColl"]) and $_POST["LocalityNameIndexColl"]!="")?$_POST["LocalityNameIndexColl"]:NULL;
	$LocRecChangedBy = (isset($_POST["LocRecChangedBy"]) and $_POST["LocRecChangedBy"]!="")?$_POST["LocRecChangedBy"]:NULL;
	$result = LogicManager::addLocality($LocalityCode,$StateProvince,$Country,$Latitude,$Longitude,$Elevation,$District,$LocalityName,$LocRecordDate,$AuxiliaryFields,$LatLongAccuracy,$AltCoordinate1,$AltCoordinate2,$AltCoordinate3,$LocRecChangedDate,$NumberImages,$LocalityNameIndex,$LocRecChangedBy);
    if ($result) {
    	echo "<p style='color:green;'>ADD Locality ".$LocalityName." OK</p></br>";
    }else{
    	echo "<p style='color:green;'>ADD Locality ".$LocalityName." Fail</p></br>";
    }

}



$CollectionExist = LogicManager::CKRecordExistwithOnePK('Collection','CollectionCode',$CollectionCode,'Collection');

$OldCollectionCode = (isset($_POST["OldCollectionCode"]) and $_POST["OldCollectionCode"]!="")?$_POST["OldCollectionCode"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;

switch ($function) {
	case "Add a New Record":
	{
		$_SESSION["LastVisitCollection"]=$CollectionCode;
		if (!$CollectionExist) {
			$result = LogicManager::addCollection($CollectionCode,$Method,$CollectedBy,$DateCollected,$Site,$XCoordinate,$YCoordinate,$HostSpcmCode,$LocalityCode,$Source,$XYAccuracy,$CollRecordDate,$AuxiliaryFields,$DateCollFlag,$DateCollEnd,$DateCollEndFlag,$CollRecChangedDate,$NumberImages,$CollRecChangedBy);
		}else{
			echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}

	};
	break;
	case "Edit This Record":{
		$_SESSION["LastVisitCollection"]=$CollectionCode;
		$result = LogicManager::DeleteWithOnePK("Collection","CollectionCode","$OldCollectionCode");
		$result = LogicManager::addCollection($CollectionCode,$Method,$CollectedBy,$DateCollected,$Site,$XCoordinate,$YCoordinate,$HostSpcmCode,$LocalityCode,$Source,$XYAccuracy,$CollRecordDate,$AuxiliaryFields,$DateCollFlag,$DateCollEnd,$DateCollEndFlag,$CollRecChangedDate,$NumberImages,$CollRecChangedBy);

	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteWithOnePK("Collection","CollectionCode","$OldCollectionCode");
	};
	break;
} // switch





if ($result) {
	echo "<h1 style='color:Green;'>".$function." OK</h1>"."<a href='inputSpecimen.php'>Add a Specimen of This Collection</a>";
}
else{
	echo "<h1 style='color:Red;'>".$function." Fail</h1>";
}

if ($function=="Add a New Record") {
	echo "</br></br><a href='inputcollection.php'>Go back to Add Another Collection</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=Collection'>View All Collections</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>