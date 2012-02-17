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

$SpeciesCode = (isset($_POST["SpeciesCode"]) and $_POST["SpeciesCode"]!="")?$_POST["SpeciesCode"]:NULL;
$ValidSpCode = (isset($_POST["ValidSpCode"]) and $_POST["ValidSpCode"]!="")?$_POST["ValidSpCode"]:NULL;
$SpeciesName = (isset($_POST["SpeciesName"]) and $_POST["SpeciesName"]!="")?$_POST["SpeciesName"]:NULL;
$Genus = (isset($_POST["Genus"]) and $_POST["Genus"]!="")?$_POST["Genus"]:NULL;
$SpeciesAuthor = (isset($_POST["SpeciesAuthor"]) and $_POST["SpeciesAuthor"]!="")?$_POST["SpeciesAuthor"]:NULL;
$Subgenus = (isset($_POST["Subgenus"]) and $_POST["Subgenus"]!="")?$_POST["Subgenus"]:NULL;
$NumberImages = (isset($_POST["NumberImages"]) and $_POST["NumberImages"]!="")?$_POST["NumberImages"]:NULL;
$SppRecordDate = (isset($_POST["SppRecordDate"]) and $_POST["SppRecordDate"]!="")?$_POST["SppRecordDate"]:NULL;
$AuxiliaryFields = (isset($_POST["AuxiliaryFields"]) and $_POST["AuxiliaryFields"]!="")?$_POST["AuxiliaryFields"]:NULL;
$Subspecies = (isset($_POST["Subspecies"]) and $_POST["Subspecies"]!="")?$_POST["Subspecies"]:NULL;
$SubspAuthor = (isset($_POST["SubspAuthor"]) and $_POST["SubspAuthor"]!="")?$_POST["SubspAuthor"]:NULL;
$Variety = (isset($_POST["Variety"]) and $_POST["Variety"]!="")?$_POST["Variety"]:NULL;
$VarietyAuthor = (isset($_POST["VarietyAuthor"]) and $_POST["VarietyAuthor"]!="")?$_POST["VarietyAuthor"]:NULL;
$CommonName = (isset($_POST["CommonName"]) and $_POST["CommonName"]!="")?$_POST["CommonName"]:NULL;
$Distribution = (isset($_POST["Distribution"]) and $_POST["Distribution"]!="")?$_POST["Distribution"]:NULL;
$TypeLocality = (isset($_POST["TypeLocality"]) and $_POST["TypeLocality"]!="")?$_POST["TypeLocality"]:NULL;
$TypeDepository = (isset($_POST["TypeDepository"]) and $_POST["TypeDepository"]!="")?$_POST["TypeDepository"]:NULL;
$Section = (isset($_POST["Section"]) and $_POST["Section"]!="")?$_POST["Section"]:NULL;
$SppRecChangedDate = (isset($_POST["SppRecChangedDate"]) and $_POST["SppRecChangedDate"]!="")?$_POST["SppRecChangedDate"]:NULL;
$SppRecChangedBy = (isset($_POST["SppRecChangedBy"]) and $_POST["SppRecChangedBy"]!="")?$_POST["SppRecChangedBy"]:NULL;


$xmlGenus =LogicManager::xmlOutput("Listing","Genus");


$SelectionGenus = "<option value=''>NULL</Option>";
foreach ($xmlGenus->children() as $xmlGen) {
	$xmlGenName = $xmlGen->Genus;
	if ($xmlGenName == $Genus) {
		$SelectionGenus = $SelectionGenus."<option value='$xmlGenName' selected='selected'>$xmlGenName</Option>";
	}
	else{
		$SelectionGenus = $SelectionGenus."<option value='$xmlGenName'>$xmlGenName</Option>";
	}

}

if (isset($_SESSION["secure"]["LoginUserName"]) or isset($SpeciesCode)) {
echo <<<Out




<div id="box1">
<h1> Species Record</h1>
</br></br>
<form action="wsaddspecies.php" method="post" onsubmit="return CF()">
<input type="hidden" name="OldSpeciesCode" Value="$SpeciesCode"/>
<table>
<tr><td>SpeciesCode:</td><td> <input type="text" name="SpeciesCode" id="SpeciesCode" value="$SpeciesCode"/></td></tr>
<tr><td>ValidSpCode:</td><td> <input type="text" name="ValidSpCode" value="$ValidSpCode"/></td></tr>
<tr><td>SpeciesName:</td><td> <input type="text" name="SpeciesName" value="$SpeciesName"/></td></tr>
<tr><td>Genus:</td><td> <select name="Genus">$SelectionGenus</select></td></tr>
<tr><td>SpeciesAuthor:</td><td> <input type="text" name="SpeciesAuthor" value="$SpeciesAuthor"/> </td></tr>
<tr><td>Subgenus:</td><td> <input type="text" name="Subgenus" value="$Subgenus"/></td></tr>
<tr><td>NumberImages:</td><td> <input type="text" name="NumberImages" id="NumberImages" value="$NumberImages"/></td></tr>
<tr><td>SppRecordDate:</td><td> <input type="text" name="SppRecordDate" id="SppRecordDate" value="$SppRecordDate" onblur="CheckEDate(this.value,'SppRecordDate','$SppRecordDate')"/></td></tr>
<tr><td>AuxiliaryFields:</td><td> <input type="text" name="AuxiliaryFields" id="AuxiliaryFields" value="$AuxiliaryFields"/> </td></tr>
<tr><td>Subspecies:</td><td> <input type="text" name="Subspecies" value="$Subspecies"/> </td></tr>
<tr><td>SubspAuthor:</td><td> <input type="text" name="SubspAuthor" value="$SubspAuthor"/></td></tr>
<tr><td>Variety:</td><td> <input type="text" name="Variety" value="$Variety"/></td></tr>
<tr><td>VarietyAuthor:</td><td> <input type="text" name="VarietyAuthor" value="$VarietyAuthor"/></td></tr>
<tr><td>CommonName:</td><td> <input type="text" name="CommonName" value="$CommonName"/> </td></tr>
<tr><td>Distribution:</td><td> <input type="text" name="Distribution" value="$Distribution"/> </td></tr>
<tr><td>TypeLocality:</td><td> <input type="text" name="TypeLocality" value="$TypeLocality"/></td></tr>
<tr><td>TypeDepository:</td><td> <input type="text" name="TypeDepository" value="$TypeDepository"/></td></tr>
<tr><td>Section:</td><td> <input type="text" name="Section" value="$Section"/></td></tr>
<tr><td>SppRecChangedDate:</td><td> <input type="text" name="SppRecChangedDate" id="SppRecChangedDate" value="$SppRecChangedDate" onblur="CheckEDate(this.value,'SppRecChangedDate','$SppRecChangedDate')"/> </td></tr>
<tr><td>SppRecChangedBy:</td><td> <input type="text" name="SppRecChangedBy" value="$SppRecChangedBy"/> </td></tr>

</table>
</Br>
$Buttons


</form>
</div>
<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">
function CF(){
var CKOK = true;
if (!CKNotEmpty("SpeciesCode")){
  CKOK = false;
}


if (!CKNum("NumberImages")){
  CKOK = false;
}

if (!CKNum("AuxiliaryFields")){
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

/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>