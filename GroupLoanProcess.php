<?php

/**
 *page process group loan and return
 *
 * @version $Id$
 * @copyright 2012
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

if ($_POST["submit"]=="ADD Loan") {
	$LoanCode = (isset($_POST["LoanCode"]) and $_POST["LoanCode"]!="")?$_POST["LoanCode"]:NULL;
	$DateLoaned = (isset($_POST["DateLoaned"]) and $_POST["DateLoaned"]!="")?$_POST["DateLoaned"]:NULL;
	$DateLoaned = LogicManager::DateEtoA($DateLoaned);
	$DateDue = (isset($_POST["DateDue"]) and $_POST["DateDue"]!="")?$_POST["DateDue"]:NULL;
	$DateDue = LogicManager::DateEtoA($DateDue);
	$Borrower = (isset($_POST["Borrower"]) and $_POST["Borrower"]!="")?$_POST["Borrower"]:NULL;
	$LoanPeriod = (isset($_POST["LoanPeriod"]) and $_POST["LoanPeriod"]!="")?$_POST["LoanPeriod"]:NULL;
	$Returned = (isset($_POST["Returned"]) and $_POST["Returned"]!="")?1:0;
	$Description = (isset($_POST["Description"]) and $_POST["Description"]!="")?$_POST["Description"]:NULL;
	$NumberLent = (isset($_POST["NumberLent"]) and $_POST["NumberLent"]!="")?$_POST["NumberLent"]:NULL;
	$NumberReturned = (isset($_POST["NumberReturned"]) and $_POST["NumberReturned"]!="")?$_POST["NumberReturned"]:NULL;
	$LoanRecordDate = (isset($_POST["LoanRecordDate"]) and $_POST["LoanRecordDate"]!="")?$_POST["LoanRecordDate"]:NULL;
	$LoanRecordDate = LogicManager::DateEtoA($LoanRecordDate);
	$LoanRecChangedDate = (isset($_POST["LoanRecChangedDate"]) and $_POST["LoanRecChangedDate"]!="")?$_POST["LoanRecChangedDate"]:NULL;
	$LoanRecChangedDate = LogicManager::DateEtoA($LoanRecChangedDate);

	$Specimenarray = unserialize($_POST["Specimenarray"]);
	$LoanQuantity = count($Specimenarray);
	$count =1;
	foreach ($Specimenarray as $key=>$val) {
		$SpecimenCode=$val;
		if (LogicManager::CKSpecimenCanLoan($SpecimenCode)) {
			$GroupLoanCode = $LoanCode."-".$count."/".$LoanQuantity;
			$count = $count+1;
			$result = LogicManager::addLoans($GroupLoanCode,$SpecimenCode,$DateLoaned,$DateDue,$Borrower,$LoanPeriod,$Returned,$Description,$NumberLent,$NumberReturned,$LoanRecordDate,$LoanRecChangedDate);
			if ($result) {
				echo "<h2 style='color:green;'>".$SpecimenCode." Loan Success</h2>";
			}else{
				echo "<h2 style='color:red;'>Add Loan Fail</h2>";
			}

		}else{
			echo "<h2 style='color:red;'>".$SpecimenCode." is On Loan</h2>";
		}
	}
		echo "<a href='loanandbarcode.php'>Back to Specimen List</a>";
}






/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();

?>