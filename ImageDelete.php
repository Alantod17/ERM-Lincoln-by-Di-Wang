<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */
ob_start();
require_once("inc/coreincs.inc");


$hg = HtmlGenerator::getInstance();
$hg->startPage("Entomology Museum LU");
$hg->openBody("Input");
$hg->openContent();

$ImageName = isset($_POST["ImageName"])?$_POST["ImageName"]:NULL;
$SmallImageName = isset($_POST["SmallImageName"])?$_POST["SmallImageName"]:NULL;
$FilePath = isset($_POST["FilePath"])?$_POST["FilePath"]:NULL;
$SpecimenNO = isset($_POST["SpecimenNO"])?$_POST["SpecimenNO"]:NULL;
$SmallImagePath = $FilePath.$SmallImageName;
$ImagePath = $FilePath.$ImageName;

if ($ImageName!=NULL) {
	$DelOK = true;
	$DelOK = LogicManager::DeleteWithOnePK("imagearchive","ImageName",$ImageName);
	if (file_exists($SmallImagePath)) {
		$DelOK = unlink($SmallImagePath);
	}
	if (file_exists($ImagePath)) {
		$DelOK = unlink($ImagePath);
	}


}

if ($DelOK) {
	echo "<h2 style='colour:Green;'>Image Delete OK</h2>";
}
else{
	echo "<h2 style='colour:Green;'>Image Delete Fail</h2>";
}

echo "<a href='output.php?table=Specimen&txtkey=$SpecimenNO'>Go Back to See Specimen $SpecimenNO</a>";

$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>