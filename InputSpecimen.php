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
$Today = date("d-m-Y");


$secure_Dataadmin=LogicManager::getSecureLevelDataAdmin();
$secure_webuser=LogicManager::getSecureLevelWebUser();
$secure_Guest=LogicManager::getSecureLevelGuest();

$UserSecureLevel = isset($_SESSION["secure"]["LoginUserLevel"])?$_SESSION["secure"]["LoginUserLevel"]:$secure_Guest;
$Buttons = LogicManager::SecureLevelButton($UserSecureLevel);

$isOnloan = FALSE;
$isOnloanmsg="";

$SpecimenCode = (isset($_POST["SpecimenCode"]) and $_POST["SpecimenCode"]!="")?$_POST["SpecimenCode"]:NULL;

if (isset($_POST["CollectionCode"])) {
	$CollectionCode = (isset($_POST["CollectionCode"]) and $_POST["CollectionCode"]!="")?$_POST["CollectionCode"]:NULL;
}else{
	$CollectionCode = (isset($_SESSION["LastVisitCollection"]) and $_SESSION["LastVisitCollection"]!="")?$_SESSION["LastVisitCollection"]:NULL;
}

$SpeciesCode = (isset($_POST["SpeciesCode"]) and $_POST["SpeciesCode"]!="")?$_POST["SpeciesCode"]:NULL;
$DeterminedBy = (isset($_POST["DeterminedBy"]) and $_POST["DeterminedBy"]!="")?$_POST["DeterminedBy"]:NULL;
$DateDetermined = (isset($_POST["DateDetermined"]) and $_POST["DateDetermined"]!="")?$_POST["DateDetermined"]:NULL;
$Deposited = (isset($_POST["Deposited"]) and $_POST["Deposited"]!="")?$_POST["Deposited"]:NULL;
$Medium = (isset($_POST["Medium"]) and $_POST["Medium"]!="")?$_POST["Medium"]:NULL;
$Storage = (isset($_POST["Storage"]) and $_POST["Storage"]!="")?$_POST["Storage"]:NULL;
$Abundance = (isset($_POST["Abundance"]) and $_POST["Abundance"]!="")?$_POST["Abundance"]:NULL;
$StageSex = (isset($_POST["StageSex"]) and $_POST["StageSex"]!="")?$_POST["StageSex"]:NULL;
$PreparedBy = (isset($_POST["PreparedBy"]) and $_POST["PreparedBy"]!="")?$_POST["PreparedBy"]:NULL;
$DatePrepared = (isset($_POST["DatePrepared"]) and $_POST["DatePrepared"]!="")?$_POST["DatePrepared"]:NULL;
$SpcmRecordDate = (isset($_POST["SpcmRecordDate"]) and $_POST["SpcmRecordDate"]!="")?$_POST["SpcmRecordDate"]:$Today;
$AuxiliaryFields = (isset($_POST["AuxiliaryFields"]) and $_POST["AuxiliaryFields"]!="")?$_POST["AuxiliaryFields"]:NULL;
$DateDetFlag = (isset($_POST["DateDetFlag"]) and $_POST["DateDetFlag"]!="")?$_POST["DateDetFlag"]:NULL;
$DatePrepFlag = (isset($_POST["DatePrepFlag"]) and $_POST["DatePrepFlag"]!="")?$_POST["DatePrepFlag"]:NULL;
$TypeStatus = (isset($_POST["TypeStatus"]) and $_POST["TypeStatus"]!="")?$_POST["TypeStatus"]:NULL;
$SpcmRecChangedDate = (isset($_POST["SpcmRecChangedDate"]) and $_POST["SpcmRecChangedDate"]!="")?$_POST["SpcmRecChangedDate"]:NULL;
$NumberImages = (isset($_POST["NumberImages"]) and $_POST["NumberImages"]!="")?$_POST["NumberImages"]:NULL;
$SpcmRecChangedBy = (isset($_POST["SpcmRecChangedBy"]) and $_POST["SpcmRecChangedBy"]!="")?$_POST["SpcmRecChangedBy"]:NULL;
$SpecimenCustom1 = (isset($_POST["SpecimenCustom1"]) and $_POST["SpecimenCustom1"]!="")?$_POST["SpecimenCustom1"]:NULL;
$SpecimenCustom2 = (isset($_POST["SpecimenCustom2"]) and $_POST["SpecimenCustom2"]!="")?$_POST["SpecimenCustom2"]:NULL;
$Genus = (isset($_POST["Genus"]) and $_POST["Genus"]!="")?$_POST["Genus"]:NULL;
$Family = (isset($_POST["Family"]) and $_POST["Family"]!="")?$_POST["Family"]:NULL;
$Order = (isset($_POST["Order"]) and $_POST["Order"]!="")?$_POST["Order"]:NULL;
$Classes = (isset($_POST["Classes"]) and $_POST["Classes"]!="")?$_POST["Classes"]:NULL;

if ($SpecimenCode!=NULL) {
	if (!LogicManager::CKSpecimenCanLoan($SpecimenCode)) {
		$isOnloanmsg ="<p style='color:red;'>This Specimen is On Loan</p>";
	}
}

$UploadImage ="";
if (isset($SpecimenCode)) {
	if ($UserSecureLevel<$secure_webuser or $UserSecureLevel==$secure_webuser) {

	$UploadImage = "<a href='#' onclick='UpLoadImage()'>Upload a new Picture</a></Br>";
}
}




$xmlPersonnel =LogicManager::xmlOutput("Listing","Personnel");
$xmlCollection =LogicManager::xmlOutput("Listing","Collection");
$xmlSpecies =LogicManager::xmlOutput("Listing","Species");
$xmlGenus =LogicManager::xmlOutput("Listing","Genus");
$xmlFamily =LogicManager::xmlOutput("Listing","Family");
$xmlOrder =LogicManager::xmlOutput("Listing","Order");
$xmlClass =LogicManager::xmlOutput("Listing","Class");



$SpeciesGenusarray=array();
$GenusFamilyarray=array();
$FamilyOrderarray=array();
$OrderClassarray=array();
$PersonnelShortNamearray=array();

$SelectionCollectionCode = "<option value=''>NULL</Option>";
foreach ($xmlCollection->children() as $collection) {
	$xmlCollectionCode = $collection->CollectionCode;
	if ($xmlCollectionCode == $CollectionCode) {
		$SelectionCollectionCode = $SelectionCollectionCode."<option value='$xmlCollectionCode' selected='selected'>$xmlCollectionCode</Option>";
	}
	else{
		$SelectionCollectionCode = $SelectionCollectionCode."<option value='$xmlCollectionCode'>$xmlCollectionCode</Option>";
	}

}


$SelectionDeterminedBy = "<option value=''>NULL</Option>";
foreach ($xmlPersonnel->children() as $Person ) {
	$ShortName = $Person->ShortName;
	$PersonnelShortNamearray["$ShortName"]="exist";

	if ($ShortName==$DeterminedBy) {
		$SelectionDeterminedBy = $SelectionDeterminedBy."<option value='$ShortName' selected='selected'>$ShortName</Option>";
	}
	else{
		$SelectionDeterminedBy = $SelectionDeterminedBy."<option value='$ShortName'>$ShortName</Option>";
	}
}


$SelectionPreparedBy = "<option value=''>NULL</Option>";
foreach ($xmlPersonnel->children() as $Person ) {
	$ShortName = $Person->ShortName;
	if ($ShortName==$PreparedBy) {
		$SelectionPreparedBy = $SelectionPreparedBy."<option value='$ShortName' selected='selected'>$ShortName</Option>";
	}
	else{
		$SelectionPreparedBy = $SelectionPreparedBy."<option value='$ShortName'>$ShortName</Option>";
	}
}


$SelectionSpeciesName = "<option value=''>NULL</Option>";
foreach ($xmlSpecies->children() as $xmlSpecies ) {
	$xmlSPeciesName = $xmlSpecies->SpeciesName;
	$xmlSpeciesCode = $xmlSpecies->SpeciesCode;
	$xmlSpeciesGenus =$xmlSpecies->Genus;
	$SpeciesGenusarray["$xmlSpeciesCode"]="$xmlSpeciesGenus";
	if ($xmlSpeciesCode==$SpeciesCode) {
		$SelectionSpeciesName = $SelectionSpeciesName."<option value='$xmlSpeciesCode' selected='selected'>$xmlSPeciesName</Option>";
	}
	else{
		$SelectionSpeciesName = $SelectionSpeciesName."<option value='$xmlSpeciesCode' >$xmlSPeciesName</Option>";
	}
}



$SelectionGenus = "<option value=''>NULL</Option>";
foreach ($xmlGenus->children() as $xmlGen ) {
	$xmlGenName = $xmlGen->Genus;
	$xmlGenFamily = $xmlGen->Family;
	$GenusFamilyarray["$xmlGenName"] = "$xmlGenFamily";
	if ($xmlGenName==$Genus) {
		$SelectionGenus = $SelectionGenus."<option value='$xmlGenName' selected='selected'>$xmlGenName</Option>";
	}
	else{
		$SelectionGenus = $SelectionGenus."<option value='$xmlGenName'>$xmlGenName</Option>";
	}
}


$SelectionFamily = "<option value=''>NULL</Option>";
foreach ($xmlFamily->children() as $xmlFam) {
	$xmlFamilyName = $xmlFam->Family;
	$xmlFamilyOrder = $xmlFam->Order;
	$FamilyOrderarray["$xmlFamilyName"]="$xmlFamilyOrder";
	if ($xmlFamilyName==$Family) {
		$SelectionFamily = $SelectionFamily."<option value='$xmlFamilyName' selected='selected'>$xmlFamilyName</Option>";
	}
	else{
		$SelectionFamily = $SelectionFamily."<option value='$xmlFamilyName'>$xmlFamilyName</Option>";
	}
}


$SelectionOrder = "<option value=''>NULL</Option>";
foreach ($xmlOrder->children() as $xmlOrd) {
	$xmlOrderName = $xmlOrd->Order;
	$xmlOrderClass = $xmlOrd->Class;
	$OrderClassarray["$xmlOrderName"]="$xmlOrderClass";
	if ($xmlOrderName==$Order) {
		$SelectionOrder = $SelectionOrder."<option value='$xmlOrderName' selected='selected'>$xmlOrderName</Option>";
	}
	else{
		$SelectionOrder = $SelectionOrder."<option value='$xmlOrderName'>$xmlOrderName</Option>";
	}
}



$SelectionClasses = "<option value=''>NULL</Option>";
foreach ($xmlClass->children() as $xmlCla) {
	$xmlClassName = $xmlCla->Class;
	if ($xmlClassName==$Classes) {
		$SelectionClasses = $SelectionClasses."<option value='$xmlClassName' selected='selected'>$xmlClassName</Option>";
	}
	else{
		$SelectionClasses = $SelectionClasses."<option value='$xmlClassName'>$xmlClassName</Option>";
	}
}

switch ($TypeStatus) {
	case "Holotype":
	{
		$selectionTypeStatus = "<option value=''>NULL</Option><option value='Holotype' selected='selected'>Holotype</Option><option value='Paratype'>Paratype</Option>";

	};
		break;
	case "Paratype":
	{
		$selectionTypeStatus = "<option value=''>NULL</Option><option value='Holotype'>Holotype</Option><option value='Paratype' selected='selected'>Paratype</Option>";;

	};
		break;
	default:
	{
		$selectionTypeStatus = "<option value=''>NULL</Option><option value='Holotype'>Holotype</Option><option value='Paratype'>Paratype</Option>";

	};
} // switch


switch ($StageSex) {
	case NULL:
	{
		$SelectionStageSex ="<option value=''>NULL</Option><option value='Adult'>Adult</Option><option value='Immature'>Immature</Option><option value='Pupa'>Pupa</Option>
                             <option value='Male'>Male</Option><option value='Female'>Female</Option><option value='Egg'>Egg</Option><option value='Other' onclick='OnOtherSelected()'>Other</Option>";
	};
	break;
	case "Adult":
	{
		$SelectionStageSex ="<option value=''>NULL</Option><option value='Adult' selected='selected'>Adult</Option><option value='Immature'>Immature</Option><option value='Pupa'>Pupa</Option>
                             <option value='Male'>Male</Option><option value='Female'>Female</Option><option value='Egg'>Egg</Option><option value='Other' onclick='OnOtherSelected()'>Other</Option>";

	};
		break;
	case "Immature":
	{
		$SelectionStageSex ="<option value=''>NULL</Option><option value='Adult'>Adult</Option><option value='Immature' selected='selected'>Immature</Option><option value='Pupa'>Pupa</Option>
                             <option value='Male'>Male</Option><option value='Female'>Female</Option><option value='Egg'>Egg</Option><option value='Other' onclick='OnOtherSelected()'>Other</Option>";

	};
		break;
	case "Pupa":
	{
		$SelectionStageSex ="<option value=''>NULL</Option><option value='Adult'>Adult</Option><option value='Immature'>Immature</Option><option value='Pupa' selected='selected'>Pupa</Option>
                             <option value='Male'>Male</Option><option value='Female'>Female</Option><option value='Egg'>Egg</Option><option value='Other' onclick='OnOtherSelected()'>Other</Option>";

	};
	break;
	case "Male":
	{
		$SelectionStageSex ="<option value=''>NULL</Option><option value='Adult'>Adult</Option><option value='Immature'>Immature</Option><option value='Pupa'>Pupa</Option>
                             <option value='Male' selected='selected'>Male</Option><option value='Female'>Female</Option><option value='Egg'>Egg</Option><option value='Other' onclick='OnOtherSelected()'>Other</Option>";

	};
	break;
	case "Female":
	{
		$SelectionStageSex ="<option value=''>NULL</Option><option value='Adult'>Adult</Option><option value='Immature'>Immature</Option><option value='Pupa'>Pupa</Option>
                             <option value='Male'>Male</Option><option value='Female' selected='selected'>Female</Option><option value='Egg'>Egg</Option><option value='Other' onclick='OnOtherSelected()'>Other</Option>";

	};
	break;
	case "Egg":
	{
		$SelectionStageSex ="<option value=''>NULL</Option><option value='Adult'>Adult</Option><option value='Immature'>Immature</Option><option value='Pupa'>Pupa</Option>
                             <option value='Male'>Male</Option><option value='Female'>Female</Option><option value='Egg' selected='selected'>Egg</Option><option value='Other' onclick='OnOtherSelected()'>Other</Option>";
	};
	break;
	default:
	{
		$SelectionStageSex ="<option value=''>NULL</Option><option value='Adult'>Adult</Option><option value='Immature'>Immature</Option><option value='Pupa'>Pupa</Option>
                             <option value='Male'>Male</Option><option value='Female'>Female</Option><option value='Egg'>Egg</Option><option value='$StageSex' selected='selected'>$StageSex</Option>
                             <option value='Other' onclick='OnOtherSelected()'>Other</Option>";
	};
} // switch



//$Barcodeimg = "<img height=25px src='http://barcode.tec-it.com/barcode.ashx?code=DataMatrix&modulewidth=fit&data=$SpecimenCode&dpi=96&imagetype=gif&rotation=0&color=&bgcolor=&fontcolor=&quiet=0&qunit=mm' />";


//$Barcodetxt = "Entomology Research Museum PO Box 84 Lincoln University New Zealand";



//if ($SpecimenCode != NULL) {
//	$barCode = "<tr><td>BarcodeLable:</td><td><table border=0 cellpadding=0 cellspacing=0 style='line-height:1.2;' ><tr><td valign=top width=53px style='font-size: 5.3px'>$Barcodetxt</td><td align=right width=15px>$Barcodeimg</td></tr><tr><td colspan=2 width=68px align=center style='font-size:10px'>$SpecimenCode</td></tr></table>
//</td></tr>";
//}
//else{
//	$barCode ="";
//}



$imagearray = LogicManager::getImageArchive($SpecimenCode);
$creatuploadimagetxt="";

if ($UserSecureLevel<=$secure_webuser and !isset($SpecimenCode)) {
	$creatuploadimagetxt = "Creat Specimen First then Upload the Picture";

}

$FMImage="";
$count = 1;
foreach($imagearray as $image){
	$imageName = $image->getImageName();
	$SmallImageName = $image->getSmallImageName();
	$SpecimenNO = $image->getSpecimenNo();
	$FilePath = $image->getPathToFile();
	$SmallImageURL = $FilePath.$SmallImageName;
	$ImageURL = $FilePath.$imageName;
	$DelFM="";
	if ($UserSecureLevel<=$secure_Dataadmin) {
		$DelFM = "</br><form method='post' action='imagedelete.php'>
                  <input type='submit' value='Delete'>
                  <input type='hidden' name='ImageName' value='$imageName'>
                  <input type='hidden' name='SmallImageName' value='$SmallImageName'>
                  <input type='hidden' name='FilePath' value='$FilePath'>
                  <input type='hidden' name='SpecimenNO' value='$SpecimenNO'>
                  </form>";

	}
		$onclick = 'OpenWindowImage("'.$ImageURL.'")';
	switch ($count) {
		case 1:
		{
		 $FMImage=$FMImage."<tr><td><img src='$SmallImageURL' alt='$imageName' onclick='$onclick'/>$DelFM</td>";
			$count = $count + 1;
		};
			break;
		case 2:
		{
			$FMImage=$FMImage."<td><img src='$SmallImageURL' alt='$imageName' onclick='$onclick'/>$DelFM</td>";
			$count = $count + 1;
		};
			break;
		case 3:
		{
			$FMImage=$FMImage."<td><img src='$SmallImageURL' alt='$imageName' onclick='$onclick'/>$DelFM</td></tr>";
			$count = $count - 2;
		};
			break;
		default:
			;
	} // switch
}

$LinkReferenceFM ="";
if ($SpecimenCode!=NULL) {
	$LinkReferenceFM = "<form method='post' action='inputreferencelinks.php'>
                        <input type='hidden' name='RecordCode' value='$SpecimenCode'>
                        <input type='hidden' name='TableName' value='Specimen'>
                        <input type='submit' name='submit' value='References'>
						</form>";

}



if (isset($_SESSION["secure"]["LoginUserName"]) or isset($SpecimenCode)) {
echo <<<Out


<div id="box1">
<h1> Specimen Record</h1>
$isOnloanmsg
$LinkReferenceFM
<form name="InputSP" action="wsaddspecimen.php" method="post" onsubmit="return CF()">
<input type="hidden" name="OldSpecimenCode" Value="$SpecimenCode"/>
<table border=0>
<tr><td>AccessionCode:</td><td> <input type="text" name="SpecimenCode" id="SpecimenCode" value="$SpecimenCode"/></td></tr>
<tr><td>Species:</td><td> <select id="selectSpecies" name="SpeciesCode" onchange="SGset(this.value)">$SelectionSpeciesName</select> </td></tr>
<tr><td>Genus:</td><td> <select id="selectGenus" name="Genus" onfocus="ClearOnGen()" onchange="GFset(this.value)">$SelectionGenus</select> </td></tr>
<tr><td>Family:</td><td> <select id="selectFamily" name="Family" onfocus="ClearOnFamily()" onchange="FOset(this.value)">$SelectionFamily</select> </td></tr>
<tr><td>Order:</td><td> <select id="selectOrder" name="Order" onfocus="ClearOnOrder()" onchange="OCset(this.value)">$SelectionOrder</select> </td></tr>
<tr><td>Class:</td><td> <select id="selectClass" onfocus="ClearOnClass()" name="Classes">$SelectionClasses</select> </td></tr>
<tr><td>TypeStatus:</td><td> <select name="TypeStatus">$selectionTypeStatus</select> </td></tr>
<tr><td>Abundance:</td><td> <input type="text" name="Abundance" id="Abundance" value="$Abundance"/> </td></tr>
<tr><td>StageSex:</td><td> <select name="StageSex" id="StageSex">$SelectionStageSex</select></td></tr>
<tr><td>DeterminedBy:</td><td> <select name="DeterminedBy" id="DeterminedBy">$SelectionDeterminedBy</select><a href="#" onclick="openwin('inputpersonnel.php','ShortName','DeterminedBy')">New</a></td></tr>
<tr><td>Storage:</td><td> <input type="text" name="Storage" value="$Storage"/> </td></tr>
<tr><td>SpcmRecordDate:</td><td> <input type="text" name="SpcmRecordDate" id="SpcmRecordDate" value="$SpcmRecordDate" onblur="CheckEDate(this.value,'SpcmRecordDate','$SpcmRecordDate')"/></td></tr>
<tr><td>Repository:</td><td> <input type="text" name="Deposited" value="$Deposited"/> </td></tr>
<tr><td>AuxiliaryFields:</td><td> <input type="text" name="AuxiliaryFields" id="AuxiliaryFields" value="$AuxiliaryFields"/> </td></tr>

<tr><td>Medium:</td><td> <input type="text" name="Medium" value="$Medium"/> </td></tr>
<tr><td>DateDetermined:</td><td> <input type="text" name="DateDetermined" id="DateDetermined" value="$DateDetermined" onblur="CheckEDate(this.value,'DateDetermined','$DateDetermined')"/></td></tr>
<tr><td>DateDetFlag:</td><td> <input type="text" name="DateDetFlag" id="DateDetFlag" value="$DateDetFlag"/> </td></tr>
<tr><td>DatePrepFlag:</td><td> <input type="text" name="DatePrepFlag" id="DatePrepFlag" value="$DatePrepFlag"/> </td></tr>
<tr><td>SpcmRecChangedDate:</td><td> <input type="text" name="SpcmRecChangedDate" id="SpcmRecChangedDate" value="$SpcmRecChangedDate" onblur="CheckEDate(this.value,'SpcmRecChangedDate','$SpcmRecChangedDate')"/> </td></tr>
<tr><td>NumberImages:</td><td> <input type="text" name="NumberImages" value="$NumberImages"/> </td></tr>
<tr><td>SpcmRecChangedBy:</td><td> <input type="text" name="SpcmRecChangedBy" value="$SpcmRecChangedBy"/> </td></tr>
<tr><td>CollectionCode:</td><td> <select name="CollectionCode">$SelectionCollectionCode</select></td></tr>
<tr><td>PreparedBy:</td><td> <select id="selectPreparedBy" name="PreparedBy">$SelectionPreparedBy</select><a href="#" onclick="openwin('inputpersonnel.php','ShortName','selectPreparedBy')">New</a>  </td></tr>
<tr><td>DatePrepared:</td><td> <input type="text" name="DatePrepared" id="DatePrepared" value="$DatePrepared" onblur="CheckEDate(this.value,'DatePrepared','$DatePrepared')"/> </td></tr>
<tr><td>SpecimenCustom1:</td><td> <input type="text" name="SpecimenCustom1" value="$SpecimenCustom1"/> </td></tr>
<tr><td>GenBank No:</td><td> <input type="text" name="SpecimenCustom2" value="$SpecimenCustom2"/> </td></tr></Br>


</table>
$Buttons
</form>
</br></br></br>

<h2>Images</h2>
$creatuploadimagetxt
<table>
$FMImage
</table>
$UploadImage

</div>
<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">
function CF(){
var CKOK = true;
if (!CKNotEmpty("SpecimenCode")){
  CKOK = false;
}


if (!CKNum("Abundance")){
  CKOK = false;
}

if (!CKNum("DateDetFlag")){
  CKOK = false;
}

if (!CKNum("Abundance")){
  CKOK = false;
}

if (!CKNum("DatePrepFlag")){
  CKOK = false;
}

if (!CKOK){
alert ("Please Check Coloured fileds!");}
return CKOK;

}




function OpenWindowImage(url){
window.open(url,"","channelmode=0,scrollbars=1,resizable=1,width=800,height=500,fullscreen=0");
}


function UpLoadImage(){
var ScmNo = document.getElementById('SpecimenCode').value;
var url = "uploadpicture.php?SpecimenNO=" + ScmNo;
window.open(url,"","channelmode=0,scrollbars=1,resizable=1,width=800,height=500,fullscreen=0");
}


function OnOtherSelected(){
var sStr = prompt("Pleas enter a new stage/sex");
if(sStr!=null&&sStr!=""){
document.getElementById("StageSex").options.add(new Option(sStr,sStr));
document.getElementById("StageSex").options[document.getElementById("StageSex").options.length-1].selected="selected";
}
else{alert("Please enter a stage or sex");}
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

echo 'function openwin(table,PK,selectid){';
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





echo 'function SGset(val){';
echo 'var arr = new Array();';
foreach ($SpeciesGenusarray as $key=>$value ) {
$keys='"'.$key.'"';
$Values='"'.$value.'"';
echo 'arr['.$keys.']='.$Values.';';
}
echo 'var x = arr[val];';
echo 'document.getElementById("selectGenus").value =x ;';
echo 'var y=GFset(x);';
echo 'var z=FOset(y);';
echo 'var w=OCset(z);';
echo 'return x;';

echo '}';



echo 'function GFset(val){';
echo 'var arr = new Array();';
foreach ($GenusFamilyarray as $key=>$value ) {
	$keys='"'.$key.'"';
	$Values='"'.$value.'"';
	echo 'arr['.$keys.']='.$Values.';';
}
echo 'var x = arr[val];';
echo 'document.getElementById("selectFamily").value =x ;';
echo 'var y=FOset(x);';
echo 'var z=OCset(y);';
echo 'return x;';
echo '}';



echo 'function FOset(val){';
echo 'var arr = new Array();';
foreach ($FamilyOrderarray as $key=>$value ) {
	$keys='"'.$key.'"';
	$Values='"'.$value.'"';
	echo 'arr['.$keys.']='.$Values.';';
}
echo 'var x = arr[val];';
echo 'document.getElementById("selectOrder").value =x ;';
echo 'var y=OCset(x);';
echo 'return x;';
echo '}';



echo 'function OCset(val){';
echo 'var arr = new Array();';
foreach ($OrderClassarray as $key=>$value ) {
	$keys='"'.$key.'"';
	$Values='"'.$value.'"';
	echo 'arr['.$keys.']='.$Values.';';
}
echo 'var x = arr[val];';
echo 'document.getElementById("selectClass").value =x ;';
echo 'return x;';
echo '}';



echo 'function ClearOnGen(){';
echo 'document.getElementById("selectSpecies").value ="" ;';
echo '}';

echo 'function ClearOnFamily(){';
echo 'document.getElementById("selectSpecies").value ="" ;';
echo 'document.getElementById("selectGenus").value ="" ;';
echo '}';

echo 'function ClearOnOrder(){';
echo 'document.getElementById("selectSpecies").value ="" ;';
echo 'document.getElementById("selectGenus").value ="" ;';
echo 'document.getElementById("selectFamily").value ="" ;';
echo '}';

echo 'function ClearOnClass(){';
echo 'document.getElementById("selectSpecies").value ="" ;';
echo 'document.getElementById("selectGenus").value ="" ;';
echo 'document.getElementById("selectFamily").value ="" ;';
echo 'document.getElementById("selectOrder").value ="" ;';
echo '}';

echo "</script>";

/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>