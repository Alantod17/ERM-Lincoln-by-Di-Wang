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

$TableName = (isset($_POST["TableName"]) and $_POST["TableName"]!="")?$_POST["TableName"]:NULL;
$RecordCode = (isset($_POST["RecordCode"]) and $_POST["RecordCode"]!="")?$_POST["RecordCode"]:NULL;
$ReferenceNo = (isset($_POST["ReferenceNo"]) and $_POST["ReferenceNo"]!="")?$_POST["ReferenceNo"]:NULL;


$xmlReference =LogicManager::xmlOutput("Listing","Reference");
$tablearray = LogicManager::TableList();

$SelectionReference = "";
foreach ($xmlReference->children() as $xmlRef) {
	$xmlReferenceNo = $xmlRef->ReferenceNo;
	$xmlReferenceTitle = $xmlRef->Title;
	if ($xmlReferenceNo == $ReferenceNo) {
		$SelectionReference = $SelectionReference."<option value='$xmlReferenceNo' selected='selected'>$xmlReferenceTitle</Option>";
	}
	else{
		$SelectionReference = $SelectionReference."<option value='$xmlReferenceNo'>$xmlReferenceTitle</Option>";
	}

}

$selectionTableName = "";
foreach ($tablearray as $table) {
	$arrTableName = $table->getTableName();
	if ($arrTableName==$TableName) {
		$selectionTableName = $selectionTableName."<option value='$arrTableName' selected='selected'>$arrTableName</Option>";
	}
	else{
		$selectionTableName = $selectionTableName."<option value='$arrTableName' >$arrTableName</Option>";
	}
}

$SpecimenReferenceTable="";
if ($TableName=="Specimen") {
	$SpecimenReference = LogicManager::getSpecimenReferences($RecordCode);
	$SpecimenReferenceTB="";
	foreach ($SpecimenReference as $reference) {
		$ReferenceNo = $reference->getReferenceNo();
		$ReferenceType = $reference->getReferenceType();
		$Author = $reference->getAuthor();
		$Year = $reference->getYear();
		$Title = $reference->getTitle();
		$Editor = $reference->getEditor();
		$JournalOrEditedBook = $reference->getJournalOrEditedBook();
		$PlacePublished = $reference->getPlacePublished();
		$Publisher = $reference->getPublisher();
		$Volume = $reference->getVolume();
		$Pages = $reference->getPages();
		$URL = $reference->getURL();
		$AuthorIndex = $reference->getAuthorIndex();
		$TitleIndex = $reference->getTitleIndex();
		$JournalOrEditedBookIndex = $reference->getJournalOrEditedBookIndex();
		$ReferenceRecordDate = $reference->getReferenceRecordDate();
		$ReferenceRecordDate = LogicManager::DateAtoE($ReferenceRecordDate);
		$ReferenceRecChangedDate = $reference->getReferenceRecChangedDate();
		$ReferenceRecChangedDate = LogicManager::DateAtoE($ReferenceRecChangedDate);
		$ReferenceRecChangedBy = $reference->getReferenceRecChangedBy();
		$SpecimenReferenceFM = "<form method='post' action='inputReference.php'>
                                <input type='hidden' name='ReferenceNo' value='$ReferenceNo'/>
                                <input type='hidden' name='ReferenceType' value='$ReferenceType'/>
                                <input type='hidden' name='Author' value='$Author'/>
                                <input type='hidden' name='Year' value='$Year'/>
                                <input type='hidden' name='Title' value='$Title'/>
                                <input type='hidden' name='Editor' value='$Editor'/>
                                <input type='hidden' name='JournalOrEditedBook' value='$JournalOrEditedBook'/>
                                <input type='hidden' name='PlacePublished' value='$PlacePublished'/>
                                <input type='hidden' name='Publisher' value='$Publisher'/>
                                <input type='hidden' name='Volume' value='$Volume'/>
                                <input type='hidden' name='Pages' value='$Pages'/>
                                <input type='hidden' name='URL' value='$URL'/>
                                <input type='hidden' name='AuthorIndex' value='$AuthorIndex'/>
                                <input type='hidden' name='TitleIndex' value='$TitleIndex'/>
                                <input type='hidden' name='JournalOrEditedBookIndex' value='$JournalOrEditedBookIndex'/>
                                <input type='hidden' name='ReferenceRecordDate' value='$ReferenceRecordDate'/>
                                <input type='hidden' name='ReferenceRecChangedDate' value='$ReferenceRecChangedDate'/>
                                <input type='hidden' name='ReferenceRecChangedBy' value='$ReferenceRecChangedBy'/>
                                <input type='submit' name='submit' value='View'/>
                                </form>";
		$SpecimenReferenceTB=$SpecimenReferenceTB."<tr><td>$SpecimenReferenceFM</td><td>$ReferenceNo</td><td>$ReferenceType</td><td>$Author</td>
                                                    <td>$Year</td><td>$Title</td><td>$Editor</td><td>$JournalOrEditedBook</td><td>$PlacePublished</td>
                                                    <td>$Publisher</td><td>$Volume</td><td>$Pages</td><td>$URL</td><td>$AuthorIndex</td><td>$TitleIndex</td>
                                                    <td>$JournalOrEditedBookIndex</td><td>$ReferenceRecordDate</td><td>$ReferenceRecChangedDate</td><td>$ReferenceRecChangedBy</td></tr>";
	}
	$SpecimenReferenceTable = "<h2>Currnent References for $RecordCode</h2>
                              <div id='boxout'><table id='tableboarder'><tr><th>Detail</th><th>ReferenceNo</th><th>ReferenceType</th><th>Author</th>
                              <th>Year</th><th>Title</th><th>Editor</th><th>JournalOrEditedBook</th><th>PlacePublished</th>
                              <th>Publisher</th><th>Volume</th><th>Pages</th><th>URL</th><th>AuthorIndex</th><th>TitleIndex</th>
                              <th>JournalOrEditedBookIndex</th><th>ReferenceRecordDate</th><th>ReferenceRecChangedDate</th><th>ReferenceRecChangedBy</th></tr>
                              $SpecimenReferenceTB
							  </table></div>";

}









if (isset($_SESSION["secure"]["LoginUserName"]) or isset($ReferenceNo)) {
echo <<<Out




<div id="box1">
<h1> Reference Link Record</h1>
</br></br>
<form action="wsaddreferencelinks.php" method="post" onsubmit="return CF()">
<input type="hidden" name="OldTableName" Value="$TableName"/>
<input type="hidden" name="OldRecordCode" Value="$RecordCode"/>
<input type="hidden" name="OldReferenceNo" Value="$ReferenceNo"/>
<table>
<tr><td>ReferenceTitle:</td><td> <select name="ReferenceNo" style="width:300px;">$SelectionReference</select></td></tr>
<tr><td>TableName:</td><td> <select name="TableName" id="TableName">$selectionTableName</select></td></tr>
<tr><td>RecordCode:</td><td> <input type="text" name="RecordCode" id="RecordCode" value="$RecordCode"/></td></tr>

</table>
</Br>
$Buttons


</form>
</div>
<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">
function CF(){
var CKOK = true;
if (!CKNotEmpty("TableName")){
  CKOK = false;
}

if (!CKNotEmpty("RecordCode")){
  CKOK = false;
}



if (!CKOK){
alert ("Please Check Coloured fileds!");}
return CKOK;

}
</script>

$SpecimenReferenceTable
Out;
}
else{
echo <<<UnLogin
$SpecimenReferenceTable

UnLogin;
}

/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>