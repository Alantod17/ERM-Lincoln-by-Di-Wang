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
$ReferenceRecordDate = LogicManager::DateEtoA($ReferenceRecordDate);
$ReferenceRecChangedDate = (isset($_POST["ReferenceRecChangedDate"]) and $_POST["ReferenceRecChangedDate"]!="")?$_POST["ReferenceRecChangedDate"]:NULL;
$ReferenceRecChangedDate = LogicManager::DateEtoA($ReferenceRecChangedDate);
$ReferenceRecChangedBy = (isset($_POST["ReferenceRecChangedBy"]) and $_POST["ReferenceRecChangedBy"]!="")?$_POST["ReferenceRecChangedBy"]:NULL;


$RefExist = LogicManager::CKRecordExistwithOnePK('Reference','ReferenceNo',$ReferenceNo,'Reference');




$OldReferenceNo =(isset($_POST["OldReferenceNo"]) and $_POST["OldReferenceNo"]!="")?$_POST["OldReferenceNo"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;


switch ($function) {
	case "Add a New Record":
	{
		if (!$RefExist) {
			$result = LogicManager::addReference($ReferenceNo,$ReferenceType,$Author,$Year,$Title,$Editor,
	$JournalOrEditedBook,$PlacePublished,$Publisher,$Volume,$Pages,$URL,$AuthorIndex,$TitleIndex,
	$JournalOrEditedBookIndex,$ReferenceRecordDate,$ReferenceRecChangedDate,$ReferenceRecChangedBy);

		}else{
			echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}

	};
	break;
	case "Edit This Record":{
		$result = LogicManager::DeleteWithOnePK("reference","ReferenceNo","$OldReferenceNo");
		$result = LogicManager::addReference($ReferenceNo,$ReferenceType,$Author,$Year,$Title,$Editor,
	$JournalOrEditedBook,$PlacePublished,$Publisher,$Volume,$Pages,$URL,$AuthorIndex,$TitleIndex,
	$JournalOrEditedBookIndex,$ReferenceRecordDate,$ReferenceRecChangedDate,$ReferenceRecChangedBy);

	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteWithOnePK("reference","ReferenceNo","$OldReferenceNo");
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
	echo "</br></br><a href='inputreference.php'>Go back to Add Another Reference</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=Reference'>View All Reference</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();

?>