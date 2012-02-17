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



$secure_Dataadmin=LogicManager::getSecureLevelDataAdmin();
$secure_webuser=LogicManager::getSecureLevelWebUser();
$secure_Guest=LogicManager::getSecureLevelGuest();


$UserSecureLevel = isset($_SESSION["secure"]["LoginUserLevel"])?$_SESSION["secure"]["LoginUserLevel"]:$secure_Guest;
$Buttons = LogicManager::SecureLevelButton($UserSecureLevel);

$daydate = date('dmY');
$daytime = date('Gis');
$FulldateTime = $daydate.$daytime;



$StateProvince = (isset($_POST["StateProvince"]) and $_POST["StateProvince"]!="")?$_POST["StateProvince"]:"";
$Country = (isset($_POST["Country"]) and $_POST["Country"]!="")?$_POST["Country"]:"";
$Latitude = (isset($_POST["Latitude"]) and $_POST["Latitude"]!="")?$_POST["Latitude"]:"";
$Longitude = (isset($_POST["Longitude"]) and $_POST["Longitude"]!="")?$_POST["Longitude"]:"";
$Elevation = (isset($_POST["Elevation"]) and $_POST["Elevation"]!="")?$_POST["Elevation"]:"";
$LocalityName = (isset($_POST["LocalityName"]) and $_POST["LocalityName"]!="")?$_POST["LocalityName"]:"";
$LocalityNameIndex = (isset($_POST["LocalityNameIndex"]) and $_POST["LocalityNameIndex"]!="")?$_POST["LocalityNameIndex"]:"";



$CollectionCode = (isset($_POST["CollectionCode"]) and $_POST["CollectionCode"]!="")?$_POST["CollectionCode"]:NULL;
$Method = (isset($_POST["Method"]) and $_POST["Method"]!="")?$_POST["Method"]:NULL;
$CollectedBy = (isset($_POST["CollectedBy"]) and $_POST["CollectedBy"]!="")?$_POST["CollectedBy"]:NULL;
$DateCollected = (isset($_POST["DateCollected"]) and $_POST["DateCollected"]!="")?$_POST["DateCollected"]:NULL;
$Site = (isset($_POST["Site"]) and $_POST["Site"]!="")?$_POST["Site"]:NULL;
$XCoordinate = (isset($_POST["XCoordinate"]) and $_POST["XCoordinate"]!="")?$_POST["XCoordinate"]:NULL;
$YCoordinate = (isset($_POST["YCoordinate"]) and $_POST["YCoordinate"]!="")?$_POST["YCoordinate"]:NULL;
$HostSpcmCode = (isset($_POST["HostSpcmCode"]) and $_POST["HostSpcmCode"]!="")?$_POST["HostSpcmCode"]:NULL;
$LocalityCode = (isset($_POST["LocalityCode"]) and $_POST["LocalityCode"]!="")?$_POST["LocalityCode"]:NULL;
$Source = (isset($_POST["Source"]) and $_POST["Source"]!="")?$_POST["Source"]:NULL;
$XYAccuracy = (isset($_POST["XYAccuracy"]) and $_POST["XYAccuracy"]!="")?$_POST["XYAccuracy"]:NULL;
$CollRecordDate = (isset($_POST["CollRecordDate"]) and $_POST["CollRecordDate"]!="")?$_POST["CollRecordDate"]:NULL;
$AuxiliaryFields = (isset($_POST["AuxiliaryFields"]) and $_POST["AuxiliaryFields"]!="")?$_POST["AuxiliaryFields"]:NULL;
$DateCollFlag = (isset($_POST["DateCollFlag"]) and $_POST["DateCollFlag"]!="")?$_POST["DateCollFlag"]:NULL;
$DateCollEnd = (isset($_POST["DateCollEnd"]) and $_POST["DateCollEnd"]!="")?$_POST["DateCollEnd"]:NULL;
$DateCollEndFlag = (isset($_POST["DateCollEndFlag"]) and $_POST["DateCollEndFlag"]!="")?$_POST["DateCollEndFlag"]:NULL;
$CollRecChangedDate = (isset($_POST["CollRecChangedDate"]) and $_POST["CollRecChangedDate"]!="")?$_POST["CollRecChangedDate"]:NULL;
$NumberImages = (isset($_POST["NumberImages"]) and $_POST["NumberImages"]!="")?$_POST["NumberImages"]:NULL;
$CollRecChangedBy = (isset($_POST["CollRecChangedBy"]) and $_POST["CollRecChangedBy"]!="")?$_POST["CollRecChangedBy"]:NULL;

if (isset($_POST["LocalityCode"])) {
	$locality = LogicManager::getLocality($_POST["LocalityCode"]);

	if ($locality!=FALSE) {
	$StateProvince = $locality->getStateProvince();
	$Country = $locality->getCountry();
	$Latitude = $locality->getLatitude();
	$Longitude = $locality->getLongitude();
	$Elevation = $locality->getElevation();
	$District = $locality->getDistrict();
	$LocalityName = $locality->getLocalityName();
    $LocalityNameIndex = $locality->getLocalityNameIndex();
	}else{
		$LocalityCode=NULL;
	}

}


$_SESSION["LastVisitCollection"] = $CollectionCode;
$xmlPersonnel =LogicManager::xmlOutput("Listing","Personnel");
$xmlLocality = LogicManager::xmlOutput("Listing","Locality");



$SelectionCollectedBy = "<option value=''>NULL</Option>";
foreach ($xmlPersonnel->children() as $Person ) {
	$xmlShortName = $Person->ShortName;
	$PersonnelShortNamearray["$xmlShortName"]="exist";
	if ($xmlShortName==$CollectedBy) {
		$SelectionCollectedBy = $SelectionCollectedBy."<option value='$xmlShortName' selected='selected'>$xmlShortName</Option>";
	}
	else{
		$SelectionCollectedBy = $SelectionCollectedBy."<option value='$xmlShortName'>$xmlShortName</Option>";
	}
}




$PrintFMHL="";

if (isset($_POST["CollectionCode"]) and $UserSecureLevel<=$secure_Dataadmin){
	$PrintFM = "<form method='get' action=''>
                <input type='submit' name='CollectionLabelPrint' id='CollectionLabelPrint' value='Print Collection Label'/>
                <input type='hidden' name='CC' value='$CollectionCode'>
                </form>";
	$CreatSpecimenHL ="<a href='inputSpecimen.php'>Add a Specimen of This Collection</a>";
	$PrintFMHL=$CreatSpecimenHL.$PrintFM."</br></br>";
}

if (isset($_SESSION["secure"]["LoginUserName"]) or isset($CollectionCode)) {
echo <<<Out

<div id="box1">
<h1> Collection Record</h1>
</br>
$PrintFMHL

<form action="CollectionLocation.php" method="post" target="localityiFrame">
<table>
<tr><td colspan=2><p style="color:brown;">Collection Locality informatioin: <input type="reset" value="Reset"></p></td></tr>
<tr><td>Country:</td><td> <input type="text" name="Country" id="Country" value="$Country" onkeyup="this.form.submit()"/></td></tr>
<tr><td>AreaCode/State:</td><td> <input type="text" name="StateProvince" id="StateProvince" value="$StateProvince" onkeyup="this.form.submit()"/></td></tr>
<tr><td>Locality:</td><td> <input type="text" name="LocalityName" id="LocalityName" value="$LocalityName" onkeyup="this.form.submit()"></tr>
<tr><td>Altitude:</td><td> <input type="text" name="Elevation" id="Elevation" value="$Elevation" onkeyup="this.form.submit()"/></td></tr>
<tr><td>Latitude:</td><td> <input type="text" name="Latitude" id="Latitude" value="$Latitude" onkeyup="this.form.submit()"/> </td></tr>
<tr><td>Longitude:</td><td> <input type="text" name="Longitude" id="Longitude" value="$Longitude" onkeyup="this.form.submit()"/></td></tr>
<tr><td>LiteralLocality:</td><td><textarea id="LocalityNameIndex" name="LocalityNameIndex">$LocalityNameIndex</textarea></td></tr>
</table>
</form>

<iframe name="localityiFrame" id="localityiFrame" src="Blank.php" frameborder="no" width =100% border="0" marginwidth="0" marginheight="0" ></iframe>



<form action="wsaddCollection.php" method="post" onsubmit="return CF('$FulldateTime')">
<input type="hidden" name="OldCollectionCode" Value="$CollectionCode"/>

<input type="hidden" name="CountryColl" id="CountryColl" Value="$Country"/>
<input type="hidden" name="StateProvinceColl" id="StateProvinceColl" Value="$StateProvince"/>
<input type="hidden" name="LocalityNameColl" id="LocalityNameColl" Value="$LocalityName"/>
<input type="hidden" name="ElevationColl" id="ElevationColl" Value="$Elevation"/>
<input type="hidden" name="LatitudeColl" id="LatitudeColl" Value="$Latitude"/>
<input type="hidden" name="LongitudeColl" id="LongitudeColl" Value="$Longitude"/>
<input type="hidden" name="LocalityNameIndexColl" id="LocalityNameIndexColl" Value="$LocalityNameIndex"/>

<table>
<tr><td colspan=2><p style="color:forestgreen;">Collection Infomation:</p></td></tr>

<tr><td>Method:</td><td> <input type="text" name="Method" value="$Method"/></td></tr>
<tr><td>CollectedBy:</td><td> <select name="CollectedBy" id="CollectedBy">$SelectionCollectedBy</select><a href="#" onclick="openwinP('inputpersonnel.php','ShortName','CollectedBy')">New</a> </td></tr>
<tr><td>DateCollected:</td><td> <input type="text" name="DateCollected" id="DateCollected" value="$DateCollected" onblur="CheckEDate(this.value,'DateCollected','$DateCollected')"/></td></tr>
<tr><td>GeoreferenceAccuracy:</td><td> <input type="text" name="XYAccuracy" id="XYAccuracy" value="$XYAccuracy"/> </td></tr>
<tr><td>HostSpcmCode:</td><td> <input type="text" name="HostSpcmCode" value="$HostSpcmCode"/> </td></tr>
<tr><td>AuxiliaryFields:</td><td> <input type="text" name="AuxiliaryFields" id="AuxiliaryFields" value="$AuxiliaryFields"/></td></tr>

<tr><td>Site:</td><td> <input type="text" name="Site" value="$Site"/></td></tr>
<tr><td>XCoordinate:</td><td> <input type="text" name="XCoordinate" id="XCoordinate" value="$XCoordinate"/> </td></tr>
<tr><td>YCoordinate:</td><td> <input type="text" name="YCoordinate" id="YCoordinate" value="$YCoordinate"/> </td></tr>
<tr><td>Source:</td><td> <input type="text" name="Source" value="$Source"/> </td></tr>
<tr><td>CollRecordDate:</td><td> <input type="text" name="CollRecordDate" id="CollRecordDate" value="$CollRecordDate" onblur="CheckEDate(this.value,'CollRecordDate','$CollRecordDate')"/> </td></tr>
<tr><td>DateCollFlag:</td><td> <input type="text" name="DateCollFlag" id="DateCollFlag" value="$DateCollFlag"/> </td></tr>
<tr><td>DateCollEnd:</td><td> <input type="text" name="DateCollEnd" id="DateCollEnd" value="$DateCollEnd" onblur="CheckEDate(this.value,'DateCollEnd','$DateCollEnd')"/> </td></tr>
<tr><td>DateCollEndFlag:</td><td> <input type="text" name="DateCollEndFlag" id="DateCollEndFlag" value="$DateCollEndFlag"/> </td></tr>
<tr><td>CollRecChangedDate:</td><td> <input type="text" name="CollRecChangedDate" id="CollRecChangedDate" value="$CollRecChangedDate" onblur="CheckEDate(this.value,'CollRecChangedDate','$CollRecChangedDate')"/> </td></tr>
<tr><td>NumberImages:</td><td> <input type="text" name="NumberImages" id="NumberImages" value="$NumberImages"/> </td></tr>
<tr><td>CollRecChangedBy:</td><td> <input type="text" name="CollRecChangedBy" value="$CollRecChangedBy"/> </td></tr>
<tr><td>LocalityCode:</td><td> <input type="text" name="LocalityCode" id="LocalityCode" value="$LocalityCode"/></td></tr>
<tr><td>CollectionCode:</td><td> <input type="text" name="CollectionCode" id="CollectionCode" value="$CollectionCode"/></td></tr>
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
var LOCCD = "Locality" + date;
document.getElementById('LocalityCode').value = LOCCD;
document.getElementById('CountryColl').value = document.getElementById('Country').value;
document.getElementById('StateProvinceColl').value = document.getElementById('StateProvince').value;
document.getElementById('LocalityNameColl').value = document.getElementById('LocalityName').value;
document.getElementById('ElevationColl').value = document.getElementById('Elevation').value;
document.getElementById('LatitudeColl').value = document.getElementById('Latitude').value;
document.getElementById('LongitudeColl').value = document.getElementById('Longitude').value;
document.getElementById('LocalityNameIndexColl').value = document.getElementById('LocalityNameIndex').value;
}


var CollOD = document.getElementById('CollectionCode').value;

if (CollOD==""){
var CollectionCode = "Collection" + date;
document.getElementById('CollectionCode').value = CollectionCode ;
}

if (!CKNotEmpty("CollectionCode")){
  CKOK = false;
}


if (!CKNotEmpty("CollectedBy")){
  CKOK = false;
}

if (!CKNotEmpty("LocalityName")){
  CKOK = false;
}

if (!CKNotEmpty("LocalityCode")){
  CKOK = false;
}

if (!CKNum("XCoordinate")){
  CKOK = false;
}

if (!CKNum("YCoordinate")){
  CKOK = false;
}

if (!CKNum("XYAccuracy")){
  CKOK = false;
}

if (!CKNum("AuxiliaryFields")){
  CKOK = false;
}

if (!CKNum("DateCollFlag")){
  CKOK = false;
}

if (!CKNum("DateCollEndFlag")){
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
echo 'document.getElementById(selectid).options.add(new Option(sStr,sStr));';
echo 'document.getElementById(selectid).options[document.getElementById(selectid).options.length-1].selected="selected";';
echo '}';
echo 'else{alert("ShortName exsit")}';
echo '}';
echo 'else{alert("Please enter your ShortName");}';

echo '}';




//echo 'function openwinL(table,PK,selectid){';
//echo 'var sStr = prompt("Pleas enter your LocalityCode");';
//echo 'if(sStr!=null&&sStr!=""){';
//echo 'var arr = new Array();';
//foreach ($Localityarray as $key=>$value ) {
//	$keys='"'.$key.'"';
//	$Values='"'.$value.'"';
//	echo 'arr['.$keys.']='.$Values.';';
//}
//echo 'if(arr[sStr]!="exist"){';
//echo 'var url=table+"?"+PK+"="+sStr;';
//echo 'window.open(url,"","channelmode=0,scrollbars=1,resizable=1,width=800,height=500,fullscreen=0");';
//echo 'document.getElementById(selectid).options.add(new Option(sStr,sStr))';
//echo '}';
//echo 'else{alert("LocalityCode exsit")}';
//echo '}';
//echo 'else{alert("Please enter your LocalityCode");}';
//
//echo '}';
echo '</script>';


/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>