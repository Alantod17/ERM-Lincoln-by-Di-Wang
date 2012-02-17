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

$SpecimenCode = (isset($_POST["SpecimenCode"]) and $_POST["SpecimenCode"]!="")?$_POST["SpecimenCode"]:NULL;
$NoteDate = (isset($_POST["NoteDate"]) and $_POST["NoteDate"]!="")?$_POST["NoteDate"]:NULL;
$NoteDate = LogicManager::DateEtoA($NoteDate);
$NoteBy = (isset($_POST["NoteBy"]) and $_POST["NoteBy"]!="")?$_POST["NoteBy"]:NULL;
$NoteText = (isset($_POST["NoteText"]) and $_POST["NoteText"]!="")?$_POST["NoteText"]:NULL;
$Null = (isset($_POST["Null"]) and $_POST["Null"]!="")?$_POST["Null"]:NULL;


$NoteExist = LogicManager::CKRecordExistwithFourPK('Specimennotes','specimencode',$SpecimenCode,'NoteDate',$NoteDate,'NoteBy',$NoteBy,'NoteText',$NoteText,'SpecimenNotes');



$OldNoteTypeCode =(isset($_POST["OldNoteTypeCode"]) and $_POST["OldNoteTypeCode"]!="")?$_POST["OldNoteTypeCode"]:NULL;
$OldNoteDate =(isset($_POST["OldNoteDate"]) and $_POST["OldNoteDate"]!="")?$_POST["OldNoteDate"]:NULL;
$OldNoteDate = LogicManager::DateEtoA($OldNoteDate);
$OldNoteBy =(isset($_POST["OldNoteBy"]) and $_POST["OldNoteBy"]!="")?$_POST["OldNoteBy"]:NULL;
$OldNoteText =(isset($_POST["OldNoteText"]) and $_POST["OldNoteText"]!="")?$_POST["OldNoteText"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;



switch ($function) {
	case "Add a New Record":
	{
		$result = LogicManager::addSpecimenNotes($SpecimenCode,$NoteDate,$NoteBy,$NoteText,$Null);
	};
	break;
	case "Edit This Record":{
		$result = LogicManager::DeleteNotes("Specimennotes","specimencode",$OldNoteTypeCode,$OldNoteDate,$OldNoteBy,$OldNoteText);
		$result = LogicManager::addSpecimenNotes($SpecimenCode,$NoteDate,$NoteBy,$NoteText,$Null);
	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteNotes("Specimennotes","specimencode",$OldNoteTypeCode,$OldNoteDate,$OldNoteBy,$OldNoteText);
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
	echo "</br></br><a href='inputSpecimennotes.php'>Go back to Add Another Specimen Note</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=SpecimenNotes'>View All Specimen Notes</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>