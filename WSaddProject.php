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

$ProjectName = (isset($_POST["ProjectName"]) and $_POST["ProjectName"]!="")?$_POST["ProjectName"]:NULL;
$ProjectShortName = (isset($_POST["ProjectShortName"]) and $_POST["ProjectShortName"]!="")?$_POST["ProjectShortName"]:NULL;
$Note = (isset($_POST["Note"]) and $_POST["Note"]!="")?$_POST["Note"]:NULL;
$Heading = (isset($_POST["Heading"]) and $_POST["Heading"]!="")?$_POST["Heading"]:NULL;
$ProjectRecordDate = (isset($_POST["ProjectRecordDate"]) and $_POST["ProjectRecordDate"]!="")?$_POST["ProjectRecordDate"]:NULL;
$ProjectRecordDate = LogicManager::DateEtoA($ProjectRecordDate);
$ProjectRecChangedDate = (isset($_POST["ProjectRecChangedDate"]) and $_POST["ProjectRecChangedDate"]!="")?$_POST["ProjectRecChangedDate"]:NULL;
$ProjectRecChangedDate = LogicManager::DateEtoA($ProjectRecChangedDate);
$Active = (isset($_POST["Active"]) and $_POST["Active"]!="")?$_POST["Active"]:NULL;
$ProjectRecChangedBy = (isset($_POST["ProjectRecChangedBy"]) and $_POST["ProjectRecChangedBy"]!="")?$_POST["ProjectRecChangedBy"]:NULL;


$ProjectExist = LogicManager::CKRecordExistwithOnePK('Project','ProjectShortName',$ProjectShortName,'Project');


$OldProjectShortName =(isset($_POST["OldProjectShortName"]) and $_POST["OldProjectShortName"]!="")?$_POST["OldProjectShortName"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;


switch ($function) {
	case "Add a New Record":
	{
		if (!$ProjectExist) {
			$result = LogicManager::addProject($ProjectName,$ProjectShortName,$Note,$Heading,$ProjectRecordDate,$ProjectRecChangedDate,$Active,$ProjectRecChangedBy);

		}else{
			echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}
			};
	break;
	case "Edit This Record":{
		$result = LogicManager::DeleteWithOnePK("project","ProjectShortName","$OldProjectShortName");
		$result = LogicManager::addProject($ProjectName,$ProjectShortName,$Note,$Heading,$ProjectRecordDate,$ProjectRecChangedDate,$Active,$ProjectRecChangedBy);
	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteWithOnePK("project","ProjectShortName","$OldProjectShortName");
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
	echo "</br></br><a href='inputproject.php'>Go back to Add Another project</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=Project'>View All project</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>