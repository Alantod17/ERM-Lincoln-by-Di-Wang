<?php

/**
 *Home Page for ERM
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
$hg->openBody("Home");
$hg->openContent();
/** * Code that we write should go after here */

$secure_Dataadmin=LogicManager::getSecureLevelDataAdmin();
$secure_webuser=LogicManager::getSecureLevelWebUser();
$secure_Guest=LogicManager::getSecureLevelGuest();

$UserSecureLevel = isset($_SESSION["secure"]["LoginUserLevel"])?$_SESSION["secure"]["LoginUserLevel"]:$secure_Guest;


$DueLoansarray = LogicManager::getLoansDueToday();
$DueLoansNum = count($DueLoansarray);
echo <<<Out

<div id="box1">
<h2>Welcome to The Entomology Research Museum</h2>
<img class="left" src="images/pic2.jpg" width="184" height="123" alt="">
<p align = "justify">
The Lincoln University Entomology Research Museum (ERM) is one of six major entomology collections in New Zealand and is the only comprehensive university-based collection. It consists of approximately 200,000 pinned specimens plus many thousands more specimens in the spirit collection. The collection is predominantly made up from New Zealand insects, with particular emphasis on the fauna of the South Island. It houses important collections from our National Parks and offshore islands (e.g. the Three Kings Is, Chatham Is and the subantarctic islands). Taxonomic strengths include the Coleoptera, tussock grassland Lepidoptera, and parasitic Hymenoptera. The ERM includes over 50 holotype specimens. Although the collection is university-based, it functions in essentially the same manner as other museum collections with free public access to the collection and with specimens made available on loan for research purposes.


</p>
</div>


Out;

if ($UserSecureLevel<=$secure_Dataadmin) {
	if ($DueLoansNum!=0) {
		echo "</br></br>";
		echo "<h2>Loans Due Today</h2>";
		echo "<div id='boxout'>";
		echo "<table id='tableboarder'>";
		echo "<tr><td>Detail</td><th>LoanCode</th><th>SpecimenCode</th><th>DateLoaned</th><th>DateDue</th><th>Borrower</th><th>LoanPeriod</th><th>Returned</th><th>Description</th><th>NumberLent</th><th>NumberReturned</th><th>LoanRecordDate</th><th>LoanRecChangedDate</th></tr>";
foreach ($DueLoansarray as $loan) {
	$LoanCode = $loan->getLoanCode();
	$SpecimenCode = $loan->getSpecimenCode();
	$DateLoaned = $loan->getDateLoaned();
	$DateLoaned = LogicManager::DateAtoE($DateLoaned);
	$DateDue = $loan->getDateDue();
	$DateDue = LogicManager::DateAtoE($DateDue);
	$Borrower = $loan->getBorrower();
	$LoanPeriod = $loan->getLoanPeriod();
	$Returnednum = $loan->getReturned();
	if ($Returnednum==1) {
		$Returned="Returned";
	}
	else{
		$Returned="OnLoan";
	}
	$Description = $loan->getDescription();
	$NumberLent = $loan->getNumberLent();
	$NumberReturned = $loan->getNumberReturned();
	$LoanRecordDate = $loan->getLoanRecordDate();
	$LoanRecChangedDate = $loan->getLoanRecChangedDate();
	$LoanRecChangedDate = LogicManager::DateAtoE($LoanRecChangedDate);
	$FM = "<form method='post' action='inputloans.php'>
           <input type='hidden' name='LoanCode' value='$LoanCode'/>
           <input type='hidden' name='SpecimenCode' value='$SpecimenCode'/>
           <input type='hidden' name='DateLoaned' value='$DateLoaned'/>
           <input type='hidden' name='DateDue' value='$DateDue'/>
           <input type='hidden' name='Borrower' value='$Borrower'/>
           <input type='hidden' name='LoanPeriod' value='$LoanPeriod'/>
           <input type='hidden' name='Returned' value='$Returned'/>
           <input type='hidden' name='Description' value='$Description'/>
           <input type='hidden' name='NumberLent' value='$NumberLent'/>
           <input type='hidden' name='NumberReturned' value='$NumberReturned'/>
           <input type='hidden' name='LoanRecordDate' value='$LoanRecordDate'/>
           <input type='hidden' name='LoanRecChangedDate' value='$LoanRecChangedDate'/>
           <input type='submit' value='View' />
           </form>";

	echo "<tr><td>$FM</td><td>$LoanCode</td><td>$SpecimenCode</td><td>$DateLoaned</td><td>$DateDue</td><td>$Borrower</td><td>$LoanPeriod</td><td>$Returned</td><td>$Description</td><td>$NumberLent</td><td>$NumberReturned</td><td>$LoanRecordDate</td><td>$LoanRecChangedDate</td></tr>";
}


		echo "</table>";
		echo "</div>";
	}
}


/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>