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

$ReferenceNo = (isset($_POST["ReferenceNo"]) and $_POST["ReferenceNo"]!="")?$_POST["ReferenceNo"]:NULL;
$ReferenceType = (isset($_POST["ReferenceType"]) and $_POST["ReferenceType"]!="")?$_POST["ReferenceType"]:NULL;
$Author = (isset($_POST["Author"]) and $_POST["Author"]!="")?$_POST["Author"]:NULL;
$Year = (isset($_POST["Year"]) and $_POST["Year"]!="")?$_POST["Year"]:NULL;
$Title = (isset($_POST["Title"]) and $_POST["Title"]!="")?$_POST["Title"]:NULL;
$Editor = (isset($_POST["Editor"]) and $_POST["Editor"]!="")?$_POST["Editor"]:NULL;
$JournalOrEditedBook = (isset($_POST["JournalOrEditedBook"]) and $_POST["JournalOrEditedBook"]!="")?$_POST["JournalOrEditedBook"]:NULL;
$PlacePublished = (isset($_POST["PlacePublished"]) and $_POST["PlacePublished"]!="")?$_POST["PlacePublished"]:NULL;
$Publisher = (isset($_POST["Publisher"]) and $_POST["Publisher"]!="")?$_POST["Publisher"]:NULL;
$Volume = (isset($_POST["Volume"]) and $_POST["Volume"]!="")?$_POST["Volume"]:NULL;
$Pages = (isset($_POST["Pages"]) and $_POST["Pages"]!="")?$_POST["Pages"]:NULL;
$URL = (isset($_POST["URL"]) and $_POST["URL"]!="")?$_POST["URL"]:NULL;
$AuthorIndex = (isset($_POST["AuthorIndex"]) and $_POST["AuthorIndex"]!="")?$_POST["AuthorIndex"]:NULL;
$TitleIndex = (isset($_POST["TitleIndex"]) and $_POST["TitleIndex"]!="")?$_POST["TitleIndex"]:NULL;
$JournalOrEditedBookIndex = (isset($_POST["JournalOrEditedBookIndex"]) and $_POST["JournalOrEditedBookIndex"]!="")?$_POST["JournalOrEditedBookIndex"]:NULL;
$ReferenceRecordDate = (isset($_POST["ReferenceRecordDate"]) and $_POST["ReferenceRecordDate"]!="")?$_POST["ReferenceRecordDate"]:NULL;
$ReferenceRecChangedDate = (isset($_POST["ReferenceRecChangedDate"]) and $_POST["ReferenceRecChangedDate"]!="")?$_POST["ReferenceRecChangedDate"]:NULL;
$ReferenceRecChangedBy = (isset($_POST["ReferenceRecChangedBy"]) and $_POST["ReferenceRecChangedBy"]!="")?$_POST["ReferenceRecChangedBy"]:NULL;



if (isset($_SESSION["secure"]["LoginUserName"]) or isset($ReferenceNo)) {
echo <<<Out




<div id="box1">
<h1> Reference Record</h1>
</br></br>
<form action="wsaddReference.php" method="post" onsubmit="return CF()">
<input type="hidden" name="OldReferenceNo" Value="$ReferenceNo"/>
<table>
<tr><td>ReferenceNo:</td><td> <input style="width:300px;" type="text" name="ReferenceNo" id="ReferenceNo" value="$ReferenceNo"/></td></tr>
<tr><td>ReferenceType:</td><td> <input style="width:300px;" type="text" name="ReferenceType" value="$ReferenceType"/></td></tr>
<tr><td>Author:</td><td> <input style="width:300px;" type="text" name="Author" value="$Author"/></td></tr>
<tr><td>Year:</td><td> <input style="width:300px;" type="text" name="Year" value="$Year"/> </td></tr>
<tr><td>Title:</td><td> <input style="width:300px;" type="text" name="Title" value="$Title"/></td></tr>
<tr><td>Editor:</td><td> <input style="width:300px;" type="text" name="Editor" value="$Editor"/></td></tr>
<tr><td>JournalOrEditedBook:</td><td> <input style="width:300px;" type="text" name="JournalOrEditedBook" value="$JournalOrEditedBook"/></td></tr>
<tr><td>PlacePublished:</td><td> <input style="width:300px;" type="text" name="PlacePublished" value="$PlacePublished"/> </td></tr>
<tr><td>Publisher:</td><td> <input style="width:300px;" type="text" name="Publisher" value="$Publisher"/></td></tr>
<tr><td>Volume:</td><td> <input style="width:300px;" type="text" name="Volume" value="$Volume"/></td></tr>
<tr><td>Pages:</td><td> <input style="width:300px;" type="text" name="Pages" value="$Pages"/></td></tr>
<tr><td>URL:</td><td> <input style="width:300px;" type="text" name="URL" value="$URL"/> </td></tr>
<tr><td>AuthorIndex:</td><td> <input style="width:300px;" type="text" name="AuthorIndex" value="$AuthorIndex"/></td></tr>
<tr><td>TitleIndex:</td><td> <input style="width:300px;" type="text" name="TitleIndex" value="$TitleIndex"/></td></tr>
<tr><td>JournalOrEditedBookIndex:</td><td> <input style="width:300px;" type="text" name="JournalOrEditedBookIndex" value="$JournalOrEditedBookIndex"/></td></tr>
<tr><td>ReferenceRecordDate:</td><td> <input style="width:300px;" type="text" name="ReferenceRecordDate" id="ReferenceRecordDate" value="$ReferenceRecordDate" onblur="CheckEDate(this.value,'ReferenceRecordDate','$ReferenceRecordDate')"/> </td></tr>
<tr><td>ReferenceRecChangedDate:</td><td> <input style="width:300px;" type="text" name="ReferenceRecChangedDate" id="ReferenceRecChangedDate" value="$ReferenceRecChangedDate" onblur="CheckEDate(this.value,'ReferenceRecChangedDate','$ReferenceRecChangedDate')"/></td></tr>
<tr><td>ReferenceRecChangedBy:</td><td> <input style="width:300px;" type="text" name="ReferenceRecChangedBy" value="$ReferenceRecChangedBy"/></td></tr>

</table>
</Br>
$Buttons


</form>
</div>
<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">
function CF(){
var CKOK = true;
if (!CKNotEmpty("ReferenceNo")){
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