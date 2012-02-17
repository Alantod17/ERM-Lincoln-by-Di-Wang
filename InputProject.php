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

$ProjectName = (isset($_POST["ProjectName"]) and $_POST["ProjectName"]!="")?$_POST["ProjectName"]:NULL;
$ProjectShortName = (isset($_POST["ProjectShortName"]) and $_POST["ProjectShortName"]!="")?$_POST["ProjectShortName"]:NULL;
$Note = (isset($_POST["Note"]) and $_POST["Note"]!="")?$_POST["Note"]:NULL;
$Heading = (isset($_POST["Heading"]) and $_POST["Heading"]!="")?$_POST["Heading"]:NULL;
$ProjectRecordDate = (isset($_POST["ProjectRecordDate"]) and $_POST["ProjectRecordDate"]!="")?$_POST["ProjectRecordDate"]:NULL;
$ProjectRecChangedDate = (isset($_POST["ProjectRecChangedDate"]) and $_POST["ProjectRecChangedDate"]!="")?$_POST["ProjectRecChangedDate"]:NULL;
$Active = (isset($_POST["Active"]) and $_POST["Active"]!="")?$_POST["Active"]:NULL;
$ProjectRecChangedBy = (isset($_POST["ProjectRecChangedBy"]) and $_POST["ProjectRecChangedBy"]!="")?$_POST["ProjectRecChangedBy"]:NULL;



if (isset($_SESSION["secure"]["LoginUserName"]) or isset($ProjectShortName)) {
echo <<<Out




<div id="box1">
<h1> Project Record</h1>
</br></br>
<form action="wsaddproject.php" method="post" onsubmit="return CF()">
<input type="hidden" name="OldProjectShortName" Value="$ProjectShortName"/>
<table>
<tr><td>ProjectName:</td><td> <input type="text" name="ProjectName"  id="ProjectName" value="$ProjectName"/></td></tr>
<tr><td>ProjectShortName:</td><td> <input type="text" name="ProjectShortName" id="ProjectShortName" value="$ProjectShortName"/></td></tr>
<tr><td>Note:</td><td> <input type="text" name="Note" value="$Note"/></td></tr>
<tr><td>Heading:</td><td> <input type="text" name="Heading" value="$Heading"/> </td></tr>
<tr><td>ProjectRecordDate:</td><td> <input type="text" name="ProjectRecordDate" id="ProjectRecordDate" value="$ProjectRecordDate" onblur="CheckEDate(this.value,'ProjectRecordDate','$ProjectRecordDate')"/></td></tr>
<tr><td>ProjectRecChangedDate:</td><td> <input type="text" name="ProjectRecChangedDate" id="ProjectRecChangedDate" value="$ProjectRecChangedDate" onblur="CheckEDate(this.value,'ProjectRecChangedDate','$ProjectRecChangedDate')"/></td></tr>
<tr><td>Active:</td><td> <input type="text" name="Active" value="$Active"/></td></tr>
<tr><td>ProjectRecChangedBy:</td><td> <input type="text" name="ProjectRecChangedBy" value="$ProjectRecChangedBy"/> </td></tr>

</table>
</Br>
$Buttons


</form>
</div>
<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">
function CF(){
var CKOK = true;
if (!CKNotEmpty("ProjectShortName")){
  CKOK = false;
}

if (!CKNotEmpty("ProjectName")){
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