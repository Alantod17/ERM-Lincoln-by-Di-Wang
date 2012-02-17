<?php

/**
 *page doing the locality searching on collectioin page
 *
 * @version $Id$
 * @copyright 2012
 */
require_once("inc/coreincs.inc");





$StateProvince = (isset($_POST["StateProvince"]) and $_POST["StateProvince"]!="")?$_POST["StateProvince"]:"";
$Country = (isset($_POST["Country"]) and $_POST["Country"]!="")?$_POST["Country"]:"";
$Latitude = (isset($_POST["Latitude"]) and $_POST["Latitude"]!="")?$_POST["Latitude"]:"";
$Longitude = (isset($_POST["Longitude"]) and $_POST["Longitude"]!="")?$_POST["Longitude"]:"";
$Elevation = (isset($_POST["Elevation"]) and $_POST["Elevation"]!="")?$_POST["Elevation"]:"";
$District = (isset($_POST["District"]) and $_POST["District"]!="")?$_POST["District"]:"";
$LocalityName = (isset($_POST["LocalityName"]) and $_POST["LocalityName"]!="")?$_POST["LocalityName"]:"";
$LocalityNameIndex = (isset($_POST["LocalityNameIndex"]) and $_POST["LocalityNameIndex"]!="")?$_POST["LocalityNameIndex"]:"";

$inforarray = array();


if ($LocalityName!="") {
	$inforarray["LocalityName"]=$LocalityName;
}

if ($StateProvince!="") {
	$inforarray["StateProvince"]=$StateProvince;
}

if ($Country!="") {
	$inforarray["Country"]=$Country;
}

if ($Latitude!="") {
	$inforarray["Latitude"]=$Latitude;
}

if ($Longitude!="") {
	$inforarray["Longitude"]=$Longitude;
}

if ($Elevation!="") {
	$inforarray["Elevation"]=$Elevation;
}

if ($District!="") {
$inforarray["District"]=$District;
}

if ($District!="") {
	$inforarray["LocalityNameIndex"]=$LocalityNameIndex;
}

$infonum = count($inforarray);

$count = 1;
$SQL = "Select * from `locality` where ";
foreach ($inforarray as $key=>$val) {
	if ($count!=$infonum) {
		$SQL = $SQL."`$key` like '%$val%' and ";
		$count = $count+1;
	}else{
		$SQL = $SQL."`$key` like '%$val%'";
	}
}
$countLOC = 1;
$locTR="";
$Localityarray = LogicManager::getCollectionLocality($SQL);
$LOCNUM = count($Localityarray);
foreach ($Localityarray as $locality) {
	$LocalityCode = $locality->getLocalityCode();
	$StateProvince = $locality->getStateProvince();
	$Country = $locality->getCountry();
	$Latitude = $locality->getLatitude();
	$Longitude = $locality->getLongitude();
	$Elevation = $locality->getElevation();
	$District = $locality->getDistrict();
	$LocRecordDate = $locality->getLocRecordDate();
	$LocRecordDate = LogicManager::DateAtoE($LocRecordDate);
	$AuxiliaryFields = $locality->getAuxiliaryFields();
	$LatLongAccuracy = $locality->getLatLongAccuracy();
	$AltCoordinate1 = $locality->getAltCoordinate1();
	$AltCoordinate2 = $locality->getAltCoordinate2();
	$AltCoordinate3 = $locality->getAltCoordinate3();
	$LocRecChangedDate = $locality->getLocRecChangedDate();
	$LocRecChangedDate = LogicManager::DateAtoE($LocRecChangedDate);
	$NumberImages = $locality->getNumberImages();
	$LocalityNameIndex = $locality->getLocalityNameIndex ();
	$LocRecChangedBy = $locality->getLocRecChangedBy();
	$LocalityNames = $locality->getLocalityName();


	$locTR=$locTR."<tr><td><input type='button' value='Select' onclick='setPvalue($countLOC)'/>
            <input type='hidden' id='LocalityName$countLOC' value='$LocalityNames'/>
            <input type='hidden' id='StateProvince$countLOC' value='$StateProvince'/>
            <input type='hidden' id='Country$countLOC' value='$Country'/>
            <input type='hidden' id='LocalityCode$countLOC' value='$LocalityCode'/>
            <input type='hidden' id='Elevation$countLOC' value='$Elevation'/>
            <input type='hidden' id='Latitude$countLOC' value='$Latitude'/>
            <input type='hidden' id='Longitude$countLOC' value='$Longitude'/>
            <input type='hidden' id='LocalityNameIndex$countLOC' value='$LocalityNameIndex'/></td>
    <td>$LocalityNames</td><td>$StateProvince</td><td>$Country</td><td>$Elevation</td><td>$Latitude</td><td>$Longitude</td></tr>";

	$countLOC = $countLOC+1;
}

$countLOC = 1;


echo "<input type='hidden' id='LocalityFound' value='$LOCNUM'/>";

if ($LOCNUM>0) {
echo<<<OT
<style>
#tableboarder {border:2px solid #77a594;border-collapse:collapse;width: 95%;}
#tableboarder td{border:2px solid #77a594;empty-cells:show;}
#tableboarder th{border:2px solid #77a594;empty-cells:show;background-color: #b0e0e6}
</style>



<table id='tableboarder'>
<tr><th>Select</th><th>Locality</th><th>AreaCode/State</th><th>Country</th><th>Altitude</th><th>Latitude</th><th>Longitude</th></tr>
$locTR



</table>




<script>
function setPvalue(val){

var LocalityNameid = "LocalityName"+val;
var StateProvinceid = "StateProvince"+val;
var Countryid = "Country"+val;
var Latitudeid = "Latitude"+val;
var Longitudeid = "Longitude"+val;
var Elevationid = "Elevation"+val;
var Districtid = "District"+val;
var LocalityCodeid = "LocalityCode"+val;
var LocalityNameIndexid = "LocalityNameIndex"+val;


var LOCName = document.getElementById(LocalityNameid).value;
parent.document.getElementById("LocalityName").value=LOCName;
parent.document.getElementById("Country").value = document.getElementById(Countryid).value;
parent.document.getElementById("StateProvince").value = document.getElementById(StateProvinceid).value;
parent.document.getElementById("Elevation").value = document.getElementById(Elevationid).value;
parent.document.getElementById("Latitude").value = document.getElementById(Latitudeid).value;
parent.document.getElementById("Longitude").value = document.getElementById(Longitudeid).value;
parent.document.getElementById("LocalityNameIndex").value = document.getElementById(LocalityNameIndexid).value;

parent.document.getElementById("LocalityCode").value = document.getElementById(LocalityCodeid).value;

}





</script>
OT;
}else{
echo <<<OT
No Locality Record Found"</br></br></br>

OT;
}







?>