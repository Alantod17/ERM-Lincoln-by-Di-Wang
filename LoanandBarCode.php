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
$secure_Dataadmin=LogicManager::getSecureLevelDataAdmin();
$secure_webuser=LogicManager::getSecureLevelWebUser();
$secure_Guest=LogicManager::getSecureLevelGuest();

$UserSecureLevel = isset($_SESSION["secure"]["LoginUserLevel"])?$_SESSION["secure"]["LoginUserLevel"]:$secure_Guest;


$Buttons = "";
if ($UserSecureLevel<=$secure_Dataadmin) {
	$Buttons = "<input type='submit' name='submit' value='Loan Selected Specimens'/><input type='submit' name='submit' value='Return Selected Specimens'/>";

}



$Specimenarray = LogicManager::ListofSpecimen();

echo "<div id='box1'>";
echo "<h1>Loan and BarCode Print System</h1></br></br></br>";
echo "<form method='post' action='LoanAndBarcodeProcess.php'>";
echo $Buttons;
echo "<div id='boxout'>";
echo "<table id='tableboarder'>";
echo "<tr><th></th><th>Loan Status</th><th>SpecimenCode</th><th>CollectionCode</th><th>Species</th><th>Genus</th><th>Family</th><th>Order</th><th>Class</th><th>StageSex</th><th>TypeStatus</th><th>DeterminedBy</th></tr>";
$tableonloan ="";
$tablenotloan ="";
foreach ($Specimenarray as $specimen) {
	$SpecimenCode = $specimen->getSpecimenCode();
	$CollectionCode = $specimen->getCollectionCode();
	$SpeciesCode = $specimen->getSpeciesCode();
	$Speciesname = "";
	if ($SpeciesCode!=NULL) {
		$Speciesname = LogicManager::getSpeciesNameByCode($SpeciesCode);
	}
	$DeterminedBy = $specimen->getDeterminedBy();
	$StageSex = $specimen->getStageSex();
	$TypeStatus = $specimen->getTypeStatus();
	$Genus = $specimen->getGenus();
	$Family = $specimen->getFamily();
	$Order = $specimen->getOrder();
	$Classes = $specimen->getClasses();
	$SpecimenCanLoan = LogicManager::CKSpecimenCanLoan($SpecimenCode);
	$CKBox = "<input type='checkbox' name='$SpecimenCode' id='$SpecimenCode' value='$SpecimenCode'/>";
	if ($SpecimenCanLoan) {
		$LoanStatus = "Available";
		$tablenotloan = $tablenotloan."<tr><td>$CKBox</td><td>$LoanStatus</td><td>$SpecimenCode</td><td>$CollectionCode</td><td>$Speciesname</td><td>$Genus</td><td>$Family</td>
                                       <td>$Order</td><td>$Classes</td><td>$StageSex</td><td>$TypeStatus</td><td>$DeterminedBy</td></tr>";
	}else{
		$LoanStatus = "On Loan";
		$tableonloan = $tableonloan."<tr><td>$CKBox</td><td>$LoanStatus</td><td>$SpecimenCode</td><td>$CollectionCode</td><td>$Speciesname</td><td>$Genus</td><td>$Family</td>
                                       <td>$Order</td><td>$Classes</td><td>$StageSex</td><td>$TypeStatus</td><td>$DeterminedBy</td></tr>";

	}

}

echo "$tablenotloan.$tableonloan";
echo "</table>";
echo "</div>";
echo "</form>";
echo "</div>";

/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>