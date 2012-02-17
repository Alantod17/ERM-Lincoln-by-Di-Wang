<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */
ob_start();
require("inc/coreincs.inc");
$hg = HtmlGenerator::getInstance();
$hg->startPage("Entomology Museum LU");
$hg->openBody("Input");
$hg->openContent();

$CollectionCode = (isset($_POST["CollectionCode"]) and $_POST["CollectionCode"]!="")?$_POST["CollectionCode"]:NULL;
$NoteDate = (isset($_POST["NoteDate"]) and $_POST["NoteDate"]!="")?$_POST["NoteDate"]:NULL;
$NoteDate = LogicManager::DateEtoA($NoteDate);
$NoteBy = (isset($_POST["NoteBy"]) and $_POST["NoteBy"]!="")?$_POST["NoteBy"]:NULL;
$NoteText = (isset($_POST["NoteText"]) and $_POST["NoteText"]!="")?$_POST["NoteText"]:NULL;
$Null = (isset($_POST["Null"]) and $_POST["Null"]!="")?$_POST["Null"]:NULL;


$NoteExist = LogicManager::CKRecordExistwithFourPK('Collectionnotes','CollectionCode',$CollectionCode,'NoteDate',$NoteDate,'NoteBy',$NoteBy,'NoteText',$NoteText,'Classes');

$OldNoteTypeCode =(isset($_POST["OldNoteTypeCode"]) and $_POST["OldNoteTypeCode"]!="")?$_POST["OldNoteTypeCode"]:NULL;
$OldNoteDate =(isset($_POST["OldNoteDate"]) and $_POST["OldNoteDate"]!="")?$_POST["OldNoteDate"]:NULL;
$OldNoteDate = LogicManager::DateEtoA($OldNoteDate);
$OldNoteBy =(isset($_POST["OldNoteBy"]) and $_POST["OldNoteBy"]!="")?$_POST["OldNoteBy"]:NULL;
$OldNoteText =(isset($_POST["OldNoteText"]) and $_POST["OldNoteText"]!="")?$_POST["OldNoteText"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;



switch ($function) {
	case "Add a New Record":
	{
		if (!$NoteExist) {
			$result = LogicManager::addCollectionNotes($CollectionCode,$NoteDate,$NoteBy,$NoteText,$Null);

		}else{
			echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}
			};
	break;
	case "Edit This Record":{
		$result = LogicManager::DeleteNotes("CollectionNotes","CollectionCode",$OldNoteTypeCode,$OldNoteDate,$OldNoteBy,$OldNoteText);
		$result = LogicManager::addCollectionNotes($CollectionCode,$NoteDate,$NoteBy,$NoteText,$Null);
	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteNotes("CollectionNotes","CollectionCode",$OldNoteTypeCode,$OldNoteDate,$OldNoteBy,$OldNoteText);
	};
	break;
} // switch



if ($result) {
	echo "<h1 style='color:Green;'>".$function." OK</h1>";
}
else{
	echo "<h1 style='color:Red;'>".$function." Fail</h1>";
}

if ($function=="Add a New Record") {
	echo "</br></br><a href='inputCollectionnotes.php'>Go back to Add Another Collection Note</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=Collectionnotes'>View All Collection Notes</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>