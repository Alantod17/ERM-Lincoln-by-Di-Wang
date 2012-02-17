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

$Kingdom = (isset($_POST["Kingdom"]) and $_POST["Kingdom"]!="")?$_POST["Kingdom"]:NULL;
$Superkingdom = (isset($_POST["Superkingdom"]) and $_POST["Superkingdom"]!="")?$_POST["Superkingdom"]:NULL;
$KingdomCustom1 = (isset($_POST["KingdomCustom1"]) and $_POST["KingdomCustom1"]!="")?$_POST["KingdomCustom1"]:NULL;
$KingdomCustom2 = (isset($_POST["KingdomCustom2"]) and $_POST["KingdomCustom2"]!="")?$_POST["KingdomCustom2"]:NULL;

$KingdomExist = LogicManager::CKRecordExistwithOnePK('Kingdom','Kingdom',$Kingdom,'Kingdom');


$OldKingdom =(isset($_POST["OldKingdom"]) and $_POST["OldKingdom"]!="")?$_POST["OldKingdom"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;

switch ($function) {
	case "Add a New Record":
	{
		if (!$KingdomExist) {
			$result = LogicManager::addKingdom($Kingdom,$Superkingdom,$KingdomCustom1,$KingdomCustom2);
		}else{
			echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}

	};
	break;
	case "Edit This Record":{
		$result = LogicManager::DeleteWithOnePK("Kingdom","Kingdom","$OldKingdom");
		$result = LogicManager::addKingdom($Kingdom,$Superkingdom,$KingdomCustom1,$KingdomCustom2);
	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteWithOnePK("Kingdom","Kingdom","$OldKingdom");;
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
	echo "</br></br><a href='inputKingdom.php'>Go back to Add Another Kingdom</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=Kingdom'>View All Kingdom</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>