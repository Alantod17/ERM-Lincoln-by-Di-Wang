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

$Order = (isset($_POST["Order"]) and $_POST["Order"]!="")?$_POST["Order"]:NULL;
$Superorder = (isset($_POST["Superorder"]) and $_POST["Superorder"]!="")?$_POST["Superorder"]:NULL;
$Class = (isset($_POST["Class"]) and $_POST["Class"]!="")?$_POST["Class"]:NULL;
$SubClass = (isset($_POST["SubClass"]) and $_POST["SubClass"]!="")?$_POST["SubClass"]:NULL;
$OrderCustom1 = (isset($_POST["OrderCustom1"]) and $_POST["OrderCustom1"]!="")?$_POST["OrderCustom1"]:NULL;
$OrderCustom2 = (isset($_POST["OrderCustom2"]) and $_POST["OrderCustom2"]!="")?$_POST["OrderCustom2"]:NULL;
$OrderCustom3 = (isset($_POST["OrderCustom3"]) and $_POST["OrderCustom3"]!="")?$_POST["OrderCustom3"]:NULL;

$OrderExist = LogicManager::CKRecordExistwithOnePK('Order','Order',$Order,'Order');



$OldOrder =(isset($_POST["OldOrder"]) and $_POST["OldOrder"]!="")?$_POST["OldOrder"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;


switch ($function) {
	case "Add a New Record":
	{
		if (!$OrderExist) {
			$result = LogicManager::addOrder($Order,$Superorder,$Class,$SubClass,$OrderCustom1,$OrderCustom2,$OrderCustom3);
		}else{
			echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}


	};
	break;
	case "Edit This Record":{
		$result = LogicManager::DeleteWithOnePK("order","order","$OldOrder");
		$result = LogicManager::addOrder($Order,$Superorder,$Class,$SubClass,$OrderCustom1,$OrderCustom2,$OrderCustom3);

	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteWithOnePK("order","order","$OldOrder");
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
	echo "</br></br><a href='inputorder.php'>Go back to Add Another Order</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=Order'>View All Order</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();

?>