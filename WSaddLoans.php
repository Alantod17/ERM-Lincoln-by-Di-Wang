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


$LoanCode = (isset($_POST["LoanCode"]) and $_POST["LoanCode"]!="")?$_POST["LoanCode"]:NULL;
$SpecimenCode = (isset($_POST["SpecimenCode"]) and $_POST["SpecimenCode"]!="")?$_POST["SpecimenCode"]:NULL;
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


$LoanExist = LogicManager::CKRecordExistwithOnePK('Loans','LoanCode',$LoanCode,'Loans');


$OldLoanCode =(isset($_POST["OldLoanCode"]) and $_POST["OldLoanCode"]!="")?$_POST["OldLoanCode"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;

switch ($function) {
	case "Add a New Record":
	{
		if (LogicManager::CKSpecimenCanLoan($SpecimenCode)) {
			if (!$LoanExist) {
			$result = LogicManager::addLoans($LoanCode,$SpecimenCode,$DateLoaned,$DateDue,$Borrower,$LoanPeriod,$Returned,$Description,$NumberLent,$NumberReturned,$LoanRecordDate,$LoanRecChangedDate);

		}else{
			echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}
		}else{
			echo "<h2>Specimen is on loan</h2>";
			$result = False;
		}

			};
	break;
	case "Edit This Record":{
		$result = LogicManager::DeleteWithOnePK("Loans","LoanCode","$OldLoanCode");
		$result = LogicManager::addLoans($LoanCode,$SpecimenCode,$DateLoaned,$DateDue,$Borrower,$LoanPeriod,$Returned,$Description,$NumberLent,$NumberReturned,$LoanRecordDate,$LoanRecChangedDate);

	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteWithOnePK("Loans","LoanCode","$OldLoanCode");
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
	echo "</br></br><a href='inputLoans.php'>Go back to Add Another Loan</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=Loans'>View All Loans</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>