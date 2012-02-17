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


$Class = (isset($_POST["Class"]) and $_POST["Class"]!="")?$_POST["Class"]:NULL;
$Subphylum = (isset($_POST["Subphylum"]) and $_POST["Subphylum"]!="")?$_POST["Subphylum"]:NULL;
$Phylum = (isset($_POST["Phylum"]) and $_POST["Phylum"]!="")?$_POST["Phylum"]:NULL;
$ClassCustom1 = (isset($_POST["ClassCustom1"]) and $_POST["ClassCustom1"]!="")?$_POST["ClassCustom1"]:NULL;
$ClassCustom2 = (isset($_POST["ClassCustom2"]) and $_POST["ClassCustom2"]!="")?$_POST["ClassCustom2"]:NULL;


$ClassExist = LogicManager::CKRecordExistwithOnePK('Class','Class',$Class,'Classes');




$OldClass =(isset($_POST["OldClass"]) and $_POST["OldClass"]!="")?$_POST["OldClass"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;


switch ($function) {
	case "Add a New Record":
	{
		if (!$ClassExist) {
		$result = LogicManager::addClass($Class,$Subphylum,$Phylum,$ClassCustom1,$ClassCustom2);
		}
		else{
				echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}
	};
	break;
	case "Edit This Record":{
		$result = LogicManager::DeleteWithOnePK("Class","Class","$OldClass");
		$result = LogicManager::addClass($Class,$Subphylum,$Phylum,$ClassCustom1,$ClassCustom2);
	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteWithOnePK("Class","Class","$OldClass");
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
	echo "</br></br><a href='inputclass.php'>Go back to Add Another Class</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=Class'>View All Classes</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>