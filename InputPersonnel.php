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

if (isset($_GET["ShortName"])) {
	$ShortName = (isset($_GET["ShortName"]) and $_GET["ShortName"]!="")?$_GET["ShortName"]:NULL;
}
else{
	$ShortName = (isset($_POST["ShortName"]) and $_POST["ShortName"]!="")?$_POST["ShortName"]:NULL;
}


$LastName = (isset($_POST["LastName"]) and $_POST["LastName"]!="")?$_POST["LastName"]:NULL;
$FirstName = (isset($_POST["FirstName"]) and $_POST["FirstName"]!="")?$_POST["FirstName"]:NULL;
$Title = (isset($_POST["Title"]) and $_POST["Title"]!="")?$_POST["Title"]:NULL;
$Address1 = (isset($_POST["Address1"]) and $_POST["Address1"]!="")?$_POST["Address1"]:NULL;
$Address2 = (isset($_POST["Address2"]) and $_POST["Address2"]!="")?$_POST["Address2"]:NULL;
$Address3 = (isset($_POST["Address3"]) and $_POST["Address3"]!="")?$_POST["Address3"]:NULL;
$Institution = (isset($_POST["Institution"]) and $_POST["Institution"]!="")?$_POST["Institution"]:NULL;
$City = (isset($_POST["City"]) and $_POST["City"]!="")?$_POST["City"]:NULL;
$StateProvZip = (isset($_POST["StateProvZip"]) and $_POST["StateProvZip"]!="")?$_POST["StateProvZip"]:NULL;
$Country = (isset($_POST["Country"]) and $_POST["Country"]!="")?$_POST["Country"]:NULL;
$VoicePhone1 = (isset($_POST["VoicePhone1"]) and $_POST["VoicePhone1"]!="")?$_POST["VoicePhone1"]:NULL;
$VoicePhone2 = (isset($_POST["VoicePhone2"]) and $_POST["VoicePhone2"]!="")?$_POST["VoicePhone2"]:NULL;
$FaxPhone = (isset($_POST["FaxPhone"]) and $_POST["FaxPhone"]!="")?$_POST["FaxPhone"]:NULL;
$Internet = (isset($_POST["Internet"]) and $_POST["Internet"]!="")?$_POST["Internet"]:NULL;
$PersonnelRecChangedDate = (isset($_POST["PersonnelRecChangedDate"]) and $_POST["PersonnelRecChangedDate"]!="")?$_POST["PersonnelRecChangedDate"]:NULL;
$Notes = (isset($_POST["Notes"]) and $_POST["Notes"]!="")?$_POST["Notes"]:NULL;
$Group = (isset($_POST["Group"]) and $_POST["Group"]!="")?$_POST["Group"]:NULL;
$PersonnelRecordDate = (isset($_POST["PersonnelRecordDate"]) and $_POST["PersonnelRecordDate"]!="")?$_POST["PersonnelRecordDate"]:NULL;
$Project = (isset($_POST["Project"]) and $_POST["Project"]!="")?$_POST["Project"]:NULL;
$PersonnelRecChangedBy = (isset($_POST["PersonnelRecChangedBy"]) and $_POST["PersonnelRecChangedBy"]!="")?$_POST["PersonnelRecChangedBy"]:NULL;


$xmlPhylums =LogicManager::xmlOutput("Listing","Phylum");




if (isset($_SESSION["secure"]["LoginUserName"]) or isset($ShortName)) {
echo <<<Out




<div id="box1">
<h1> Personnel Record</h1>
</br></br>
<form action="wsaddPersonnel.php" method="post" onsubmit="return CF()" >
<input type="hidden" name="OldShortName" Value="$ShortName"/>
<table>
<tr><td>LastName:</td><td> <input type="text" name="LastName"  value="$LastName"/></td></tr>
<tr><td>FirstName:</td><td> <input type="text" name="FirstName" value="$FirstName"/></td></tr>
<tr><td>ShortName:</td><td> <input type="text" name="ShortName" id="ShortName" value="$ShortName"/></td></tr>
<tr><td>Title:</td><td> <input type="text" name="Title" value="$Title"/> </td></tr>
<tr><td>Address1:</td><td> <input type="text" name="Address1" value="$Address1"/></td></tr>
<tr><td>Address2:</td><td> <input type="text" name="Address2" value="$Address2"/></td></tr>
<tr><td>Address3:</td><td> <input type="text" name="Address3" value="$Address3"/></td></tr>
<tr><td>Institution:</td><td> <input type="text" name="Institution" value="$Institution"/> </td></tr>
<tr><td>City:</td><td> <input type="text" name="City" value="$City"/></td></tr>
<tr><td>StateProvZip:</td><td> <input type="text" name="StateProvZip" value="$StateProvZip"/></td></tr>
<tr><td>Country:</td><td> <input type="text" name="Country" value="$Country"/></td></tr>
<tr><td>VoicePhone1:</td><td> <input type="text" name="VoicePhone1" value="$VoicePhone1"/> </td></tr>
<tr><td>VoicePhone2:</td><td> <input type="text" name="VoicePhone2" value="$VoicePhone2"/></td></tr>
<tr><td>FaxPhone:</td><td> <input type="text" name="FaxPhone" value="$FaxPhone"/></td></tr>
<tr><td>Internet/Email:</td><td> <input type="text" name="Internet" value="$Internet"/></td></tr>
<tr><td>PersonnelRecChangedDate:</td><td> <input type="text" name="PersonnelRecChangedDate" id="PersonnelRecChangedDate" value="$PersonnelRecChangedDate" onblur="CheckEDate(this.value,'PersonnelRecChangedDate','$PersonnelRecChangedDate')"/> </td></tr>
<tr><td>Notes:</td><td> <input type="text" name="Notes" value="$Notes"/></td></tr>
<tr><td>Group:</td><td> <input type="text" name="Group" value="$Group"/></td></tr>
<tr><td>PersonnelRecordDate:</td><td> <input type="text" name="PersonnelRecordDate" id="PersonnelRecordDate" value="$PersonnelRecordDate" onblur="CheckEDate(this.value,'PersonnelRecordDate','$PersonnelRecordDate')"/></td></tr>
<tr><td>Project:</td><td> <input type="text" name="Project" value="$Project"/> </td></tr>
<tr><td>PersonnelRecChangedBy:</td><td> <input type="text" name="PersonnelRecChangedBy" value="$PersonnelRecChangedBy"/> </td></tr>

</table>
</Br>
$Buttons


</form>
</div>
<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">
function CF(){
var CKOK = true;
if (!CKNotEmpty("ShortName")){
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