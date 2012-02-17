<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */

require("inc/coreincs.inc");

$ImageNumber = (isset($_POST["ImageNumber"]) and $_POST["ImageNumber"]!="")?$_POST["ImageNumber"]:NULL;
$ImageName = (isset($_POST["ImageName"]) and $_POST["ImageName"]!="")?$_POST["ImageName"]:NULL;
$PathToFile = (isset($_POST["PathToFile"]) and $_POST["PathToFile"]!="")?$_POST["PathToFile"]:NULL;
$ImageNote = (isset($_POST["ImageNote"]) and $_POST["ImageNote"]!="")?$_POST["ImageNote"]:NULL;
$SpecimenNo = (isset($_POST["SpecimenNo"]) and $_POST["SpecimenNo"]!="")?$_POST["SpecimenNo"]:NULL;



$addOK = LogicManager::addImageArchive($ImageNumber,$ImageName,$PathToFile,$ImageNote,$SpecimenNo);

if ($addOK) {
	echo "Add Group Succeed";
}
else{
	echo "Add Group Fail";
}

?>