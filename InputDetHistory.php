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

$SpecimenCode = (isset($_POST["SpecimenCode"]) and $_POST["SpecimenCode"]!="")?$_POST["SpecimenCode"]:NULL;
$SpeciesCode = (isset($_POST["SpeciesCode"]) and $_POST["SpeciesCode"]!="")?$_POST["SpeciesCode"]:NULL;
$Genus = (isset($_POST["Genus"]) and $_POST["Genus"]!="")?$_POST["Genus"]:NULL;
$SpeciesName = (isset($_POST["SpeciesName"]) and $_POST["SpeciesName"]!="")?$_POST["SpeciesName"]:NULL;
$SpeciesAuthor = (isset($_POST["SpeciesAuthor"]) and $_POST["SpeciesAuthor"]!="")?$_POST["SpeciesAuthor"]:NULL;
$DeterminedBy = (isset($_POST["DeterminedBy"]) and $_POST["DeterminedBy"]!="")?$_POST["DeterminedBy"]:NULL;
$DateDetermined = (isset($_POST["DateDetermined"]) and $_POST["DateDetermined"]!="")?$_POST["DateDetermined"]:NULL;
$WhereChanged = (isset($_POST["WhereChanged"]) and $_POST["WhereChanged"]!="")?$_POST["WhereChanged"]:NULL;
$DateChanged = (isset($_POST["DateChanged"]) and $_POST["DateChanged"]!="")?$_POST["DateChanged"]:NULL;
$ChangedBy = (isset($_POST["ChangedBy"]) and $_POST["ChangedBy"]!="")?$_POST["ChangedBy"]:NULL;
$DateDetFlag = (isset($_POST["DateDetFlag"]) and $_POST["DateDetFlag"]!="")?$_POST["DateDetFlag"]:NULL;
$Sequence = (isset($_POST["Sequence"]) and $_POST["Sequence"]!="")?$_POST["Sequence"]:NULL;
$Subspecies = (isset($_POST["Subspecies"]) and $_POST["Subspecies"]!="")?$_POST["Subspecies"]:NULL;
$SubspAuthor = (isset($_POST["SubspAuthor"]) and $_POST["SubspAuthor"]!="")?$_POST["SubspAuthor"]:NULL;
$Variety = (isset($_POST["Variety"]) and $_POST["Variety"]!="")?$_POST["Variety"]:NULL;
$VarietyAuthor = (isset($_POST["VarietyAuthor"]) and $_POST["VarietyAuthor"]!="")?$_POST["VarietyAuthor"]:NULL;



$xmlPersonnel =LogicManager::xmlOutput("Listing","Personnel");

$SelectionSpeciesAuthor = "";
foreach ($xmlPersonnel->children() as $xmlper) {
	$xmlperShortName = $xmlper->ShortName;
	if ($xmlperShortName == $SpeciesAuthor) {
		$SelectionSpeciesAuthor = $SelectionSpeciesAuthor."<option value='$xmlperShortName' selected='selected'>$xmlperShortName</Option>";
	}
	else{
		$SelectionSpeciesAuthor = $SelectionSpeciesAuthor."<option value='$xmlperShortName'>$xmlperShortName</Option>";
	}

}


$SelectionDeterminedBy = "";
foreach ($xmlPersonnel->children() as $xmlper) {
	$xmlperShortName = $xmlper->ShortName;
	$PersonnelShortNamearray["$xmlperShortName"]="exist";
	if ($xmlperShortName == $DeterminedBy) {
		$SelectionDeterminedBy = $SelectionDeterminedBy."<option value='$xmlperShortName' selected='selected'>$xmlperShortName</Option>";
	}
	else{
		$SelectionDeterminedBy = $SelectionDeterminedBy."<option value='$xmlperShortName'>$xmlperShortName</Option>";
	}

}

$xmlSpecimen =LogicManager::xmlOutput("Listing","Specimen");

$SelectionSpecimen = "";
foreach ($xmlSpecimen->children() as $xmlSpe) {
	$xmlSpecimenCode = $xmlSpe->SpecimenCode;
	if ($xmlSpecimenCode == $SpecimenCode) {
		$SelectionSpecimen = $SelectionSpecimen."<option value='$xmlSpecimenCode' selected='selected'>$xmlSpecimenCode</Option>";
	}
	else{
		$SelectionSpecimen = $SelectionSpecimen."<option value='$xmlSpecimenCode'>$xmlSpecimenCode</Option>";
	}

}

$xmlSpecies =LogicManager::xmlOutput("Listing","Species");

$SelectionSpeciesName = "<option value=''>NULL</Option>";
foreach ($xmlSpecies->children() as $xmlSpecies ) {
	$xmlSPeciesName = $xmlSpecies->SpeciesName;
	$xmlSpeciesCode = $xmlSpecies->SpeciesCode;
	if ($xmlSpeciesCode==$SpeciesCode) {
		$SelectionSpeciesName = $SelectionSpeciesName."<option value='$xmlSpeciesCode' selected='selected'>$xmlSPeciesName</Option>";
	}
	else{
		$SelectionSpeciesName = $SelectionSpeciesName."<option value='$xmlSpeciesCode'>$xmlSPeciesName</Option>";
	}
}



$xmlGenus =LogicManager::xmlOutput("Listing","Genus");


$SelectionGenus = "";
foreach ($xmlGenus->children() as $xmlGen) {
	$xmlGenName = $xmlGen->Genus;
	if ($xmlGenName == $Genus) {
		$SelectionGenus = $SelectionGenus."<option value='$xmlGenName' selected='selected'>$xmlGenName</Option>";
	}
	else{
		$SelectionGenus = $SelectionGenus."<option value='$xmlGenName'>$xmlGenName</Option>";
	}

}
if (isset($_SESSION["secure"]["LoginUserName"]) or isset($SpecimenCode)) {
echo <<<Out




<div id="box1">
<h1> DetHistory Record</h1>
</br></br>
<form action="wsadddethistory.php" method="post" onsubmit="return CF()" >
<input type="hidden" name="OldSpecimenCode" Value="$SpecimenCode"/>
<input type="hidden" name="OldDeterminedBy" Value="$DeterminedBy"/>
<input type="hidden" name="OldDateDetermined" Value="$DateDetermined"/>
<table>
<tr><td>SpecimenCode:</td><td> <select name="SpecimenCode" id="SpecimenCode">$SelectionSpecimen</select></td></tr>
<tr><td>SpeciesCode:</td><td>  <input type="text" name="SpeciesCode" value="$SpeciesCode"/></td></tr>
<tr><td>Genus:</td><td> <select name="Genus">$SelectionGenus</select></td></tr>
<tr><td>SpeciesName:</td><td> <select name="SpeciesName">$SelectionSpeciesName</select></td></tr>
<tr><td>SpeciesAuthor:</td><td> <select name="SpeciesAuthor" id="SpeciesAuthor">$SelectionSpeciesAuthor</select><a href="#" onclick="openwinP('inputpersonnel.php','ShortName','SpeciesAuthor')">New</a> </td></tr>
<tr><td>DeterminedBy:</td><td> <select name="DeterminedBy" id="DeterminedBy">$SelectionDeterminedBy</select><a href="#" onclick="openwinP('inputpersonnel.php','ShortName','DeterminedBy')">New</a></td></tr>
<tr><td>DateDetermined:</td><td> <input type="text" name="DateDetermined" id="DateDetermined" value="$DateDetermined" onblur="CheckEDate(this.value,'DateDetermined','$DateDetermined')"/></td></tr>
<tr><td>WhereChanged:</td><td> <input type="text" name="WhereChanged" value="$WhereChanged"/> </td></tr>
<tr><td>DateChanged:</td><td> <input type="text" name="DateChanged" id="DateChanged" value="$DateChanged" onblur="CheckEDate(this.value,'DateChanged','$DateChanged')"/> </td></tr>
<tr><td>ChangedBy:</td><td> <input type="text" name="ChangedBy" value="$ChangedBy"/></td></tr>
<tr><td>DateDetFlag:</td><td> <input type="text" name="DateDetFlag" id="DateDetFlag" value="$DateDetFlag"/></td></tr>
<tr><td>Sequence:</td><td> <input type="text" name="Sequence" id="Sequence" value="$Sequence"/> </td></tr>
<tr><td>Subspecies:</td><td> <input type="text" name="Subspecies" value="$Subspecies"/></td></tr>
<tr><td>SubspAuthor:</td><td> <input type="text" name="SubspAuthor" value="$SubspAuthor"/></td></tr>
<tr><td>Variety:</td><td> <input type="text" name="Variety" value="$Variety"/> </td></tr>
<tr><td>VarietyAuthor:</td><td> <input type="text" name="VarietyAuthor" value="$VarietyAuthor"/></td></tr>


</table>
</Br>
$Buttons


</form>
</div>
<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">
function CF(){
var CKOK = true;
if (!CKNotEmpty("SpecimenCode")){
  CKOK = false;
}

if (!CKNotEmpty("DeterminedBy")){
  CKOK = false;
}

if (!CKNotEmpty("DateDetermined")){
  CKOK = false;
}

if (!CKNum("Sequence")){
  CKOK = false;
}

if (!CKNum("DateDetFlag")){
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