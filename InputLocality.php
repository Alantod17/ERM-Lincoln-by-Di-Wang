<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2011
 */
ob_start();
require_once("inc/coreincs.inc");


/*
   * Setup HTML Generator and open ready for output.
*/
$hg = HtmlGenerator::getInstance();
$hg->startPage("Entomology Museum LU");
$hg->openBody("Input");
$hg->openContent();
/** * Code that we write should go after here */
$secure_Guest=LogicManager::getSecureLevelGuest();
$UserSecureLevel = isset($_SESSION["secure"]["LoginUserLevel"])?$_SESSION["secure"]["LoginUserLevel"]:$secure_Guest;
$Buttons = LogicManager::SecureLevelButton($UserSecureLevel);

$daydate = date('dmY');
$daytime = date('Gis');
$FulldateTime = $daydate.$daytime;

if (isset($_GET["LocalityCode"])) {
	$LocalityCode = (isset($_GET["LocalityCode"]) and $_GET["LocalityCode"]!="")?$_GET["LocalityCode"]:NULL;
}
else{
	$LocalityCode = (isset($_POST["LocalityCode"]) and $_POST["LocalityCode"]!="")?$_POST["LocalityCode"]:NULL;
}


$StateProvince = (isset($_POST["StateProvince"]) and $_POST["StateProvince"]!="")?$_POST["StateProvince"]:NULL;
$Country = (isset($_POST["Country"]) and $_POST["Country"]!="")?$_POST["Country"]:NULL;
$Latitude = (isset($_POST["Latitude"]) and $_POST["Latitude"]!="")?$_POST["Latitude"]:NULL;
$Longitude = (isset($_POST["Longitude"]) and $_POST["Longitude"]!="")?$_POST["Longitude"]:NULL;
$Elevation = (isset($_POST["Elevation"]) and $_POST["Elevation"]!="")?$_POST["Elevation"]:NULL;
$District = (isset($_POST["District"]) and $_POST["District"]!="")?$_POST["District"]:NULL;
$LocalityName = (isset($_POST["LocalityName"]) and $_POST["LocalityName"]!="")?$_POST["LocalityName"]:NULL;
$LocRecordDate = (isset($_POST["LocRecordDate"]) and $_POST["LocRecordDate"]!="")?$_POST["LocRecordDate"]:NULL;
$AuxiliaryFields = (isset($_POST["AuxiliaryFields"]) and $_POST["AuxiliaryFields"]!="")?$_POST["AuxiliaryFields"]:NULL;
$LatLongAccuracy = (isset($_POST["LatLongAccuracy"]) and $_POST["LatLongAccuracy"]!="")?$_POST["LatLongAccuracy"]:NULL;
$AltCoordinate1 = (isset($_POST["AltCoordinate1"]) and $_POST["AltCoordinate1"]!="")?$_POST["AltCoordinate1"]:NULL;
$AltCoordinate2 = (isset($_POST["AltCoordinate2"]) and $_POST["AltCoordinate2"]!="")?$_POST["AltCoordinate2"]:NULL;
$AltCoordinate3 = (isset($_POST["AltCoordinate3"]) and $_POST["AltCoordinate3"]!="")?$_POST["AltCoordinate3"]:NULL;
$LocRecChangedDate = (isset($_POST["LocRecChangedDate"]) and $_POST["LocRecChangedDate"]!="")?$_POST["LocRecChangedDate"]:NULL;
$NumberImages = (isset($_POST["NumberImages"]) and $_POST["NumberImages"]!="")?$_POST["NumberImages"]:NULL;
$LocalityNameIndex = (isset($_POST["LocalityNameIndex"]) and $_POST["LocalityNameIndex"]!="")?$_POST["LocalityNameIndex"]:NULL;
$LocRecChangedBy = (isset($_POST["LocRecChangedBy"]) and $_POST["LocRecChangedBy"]!="")?$_POST["LocRecChangedBy"]:NULL;


$xmlPersonnel =LogicManager::xmlOutput("Listing","Personnel");


$SelectionPersonnel = "<option value=''>NULL</Option>";
foreach ($xmlPersonnel->children() as $xmlPer) {
	$xmlPersonnelShortName = $xmlPer->ShortName;
	$PersonnelShortNamearray["$xmlPersonnelShortName"]="exist";
	if ($xmlPersonnelShortName == $LocRecChangedBy) {
		$SelectionPersonnel = $SelectionPersonnel."<option value='$xmlPersonnelShortName' selected='selected'>$xmlPersonnelShortName</Option>";
	}
	else{
		$SelectionPersonnel = $SelectionPersonnel."<option value='$xmlPersonnelShortName'>$xmlPersonnelShortName</Option>";
	}

}

if (isset($_SESSION["secure"]["LoginUserName"]) or isset($LocalityCode)) {
echo <<<Out




<div id="box1">
<h1> Locality Record</h1>
</br></br>
<form action="wsaddLocality.php" method="post" onsubmit="return CF($FulldateTime)" >
<input type="hidden" name="OldLocalityCode" Value="$LocalityCode"/>
<table>
<tr><td>Country:</td><td> <input type="text" name="Country" id="Country" value="$Country"/></td></tr>
<tr><td>AreaCode/State:</td><td> <input type="text" name="StateProvince" id="StateProvince" value="$StateProvince"/></td></tr>
<tr><td>Locality:</td><td> <input type="text" name="LocalityName" id="LocalityName" value="$LocalityName"/> </td></tr>
<tr><td>Altitude:</td><td> <input type="text" name="Elevation" value="$Elevation"/></td></tr>
<tr><td>Latitude:</td><td> <input type="text" name="Latitude" id="Latitude" value="$Latitude"/> </td></tr>
<tr><td>Longitude:</td><td> <input type="text" name="Longitude" id="Longitude" value="$Longitude"/></td></tr>
<tr><td>AuxiliaryFields:</td><td> <input type="text" name="AuxiliaryFields" id="AuxiliaryFields" value="$AuxiliaryFields"/></td></tr>
<tr><td>LiteralLocality:</td><td><textarea id="LocalityNameIndex" name="LocalityNameIndex">$LocalityNameIndex</textarea></td></tr>

<tr><td>District:</td><td> <input type="text" name="District" id="District" value="$District"/></td></tr>
<tr><td>LocRecordDate:</td><td> <input type="text" name="LocRecordDate" value="$LocRecordDate"/></td></tr>
<tr><td>LatLongAccuracy:</td><td> <input type="text" name="LatLongAccuracy" value="$LatLongAccuracy"/></td></tr>
<tr><td>AltCoordinate1:</td><td> <input type="text" name="AltCoordinate1" value="$AltCoordinate1"/> </td></tr>
<tr><td>AltCoordinate2:</td><td> <input type="text" name="AltCoordinate2" value="$AltCoordinate2"/></td></tr>
<tr><td>AltCoordinate3:</td><td> <input type="text" name="AltCoordinate3" value="$AltCoordinate3"/></td></tr>
<tr><td>LocRecChangedDate:</td><td> <input type="text" name="LocRecChangedDate" value="$LocRecChangedDate"/></td></tr>
<tr><td>NumberImages:</td><td> <input type="text" name="NumberImages" id="NumberImages" value="$NumberImages"/> </td></tr>
<tr><td>LocRecChangedBy:</td><td> <select name="LocRecChangedBy" id="LocRecChangedBy">$SelectionPersonnel</select><a href="#" onclick="openwinP('inputpersonnel.php','ShortName','LocRecChangedBy')">New</a></td></td></tr>
<tr><td>LocalityCode:</td><td> <input type="text" name="LocalityCode" id="LocalityCode" value="$LocalityCode"/></td></tr>

</table>
</Br>
$Buttons


</form>
</div>


<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">
function CF(date){
var CKOK = true;

LOCCodeOLD = document.getElementById('LocalityCode').value;
if (LOCCodeOLD==""){
var LOCCode = "Locality" + date;
document.getElementById('LocalityCode').value = LOCCode;
}


if (!CKNotEmpty("LocalityCode")){
  CKOK = false;
}

if (!CKNotEmpty("LocalityName")){
  CKOK = false;
}

if (!CKNum("Latitude")){
  CKOK = false;
}


if (!CKNum("AuxiliaryFields")){
  CKOK = false;
}

if (!CKNum("NumberImages")){
  CKOK = false;
}
if (!CKOK){
alert ("Please Check Coloured fileds!");}
return CKOK;

}

</script>
Out;
}
else{
echo <<<UnLogin
<h1>Input is for Authorised Person Only</h1><br/><br/>

<a href="Login.php">Please Login Here</a>

UnLogin;
}
echo '<script>';
echo 'function openwinP(table,PK,selectid){';
echo 'var sStr = prompt("Pleas enter your ShortName");';
echo 'if(sStr!=null&&sStr!=""){';
echo 'var arr = new Array();';
foreach ($PersonnelShortNamearray as $key=>$value ) {
	$keys='"'.$key.'"';
	$Values='"'.$value.'"';
	echo 'arr['.$keys.']='.$Values.';';
}
echo 'if(arr[sStr]!="exist"){';
echo 'var url=table+"?"+PK+"="+sStr;';
echo 'window.open(url,"","channelmode=0,scrollbars=1,resizable=1,width=800,height=500,fullscreen=0");';
echo 'document.getElementById(selectid).options.add(new Option(sStr,sStr))';
echo '}';
echo 'else{alert("ShortName exsit")}';
echo '}';
echo 'else{alert("Please enter your ShortName");}';

echo '}';
echo '</script>';
/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>