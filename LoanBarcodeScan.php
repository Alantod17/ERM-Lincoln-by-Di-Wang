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

echo <<<OT
<h2>Scan Barcode to loan specimens</h2></br>
<form method="post" action="LoanandBarcodeProcess.php" enctype="multipart/form-data">
Specimen 0:<input type="text" name="Specimen0" /></br>
Specimen 1:<input type="text" name="Specimen1" /></br>
Specimen 2:<input type="text" name="Specimen2" /></br>
Specimen 3:<input type="text" name="Specimen3" /></br>
Specimen 4:<input type="text" name="Specimen4" /></br>
Specimen 5:<input type="text" name="Specimen5" /></br>
Specimen 6:<input type="text" name="Specimen6" /></br>
Specimen 7:<input type="text" name="Specimen7" /></br>
Specimen 8:<input type="text" name="Specimen8" /></br>
Specimen 9:<input type="text" name="Specimen9" /></br></br>

<input type='submit' name='submit' value='Loan Selected Specimens'/>
<input type='submit' name='submit' value='Return Selected Specimens'/>
</form>
OT;

/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>