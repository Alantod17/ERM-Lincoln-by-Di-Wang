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

$GroupName = (isset($_POST["GroupName"]) and $_POST["GroupName"]!="")?$_POST["GroupName"]:NULL;
$ShortName = (isset($_POST["ShortName"]) and $_POST["ShortName"]!="")?$_POST["ShortName"]:NULL;
$MemberNumber = (isset($_POST["MemberNumber"]) and $_POST["MemberNumber"]!="")?$_POST["MemberNumber"]:NULL;


$GroupExist = LogicManager::CKRecordExistwithTwoPK('Group','GroupName',$GroupName,'ShortName',$ShortName,'Group');



$OldGroupName =(isset($_POST["OldGroupName"]) and $_POST["OldGroupName"]!="")?$_POST["OldGroupName"]:NULL;
$OldShortName =(isset($_POST["OldShortName"]) and $_POST["OldShortName"]!="")?$_POST["OldShortName"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;


switch ($function) {
	case "Add a New Record":
	{
		if (!$GroupExist) {
			$result = LogicManager::addGroup($GroupName,$ShortName,$MemberNumber);
		}else{
			echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}

	};
	break;
	case "Edit This Record":{
		$result = LogicManager::DeleteWithTwoPK("Group","GroupName","$OldGroupName","ShortName","$OldShortName");
		$result = LogicManager::addGroup($GroupName,$ShortName,$MemberNumber);
	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteWithTwoPK("Group","GroupName","$OldGroupName","ShortName","$OldShortName");
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
	echo "</br></br><a href='inputGroup.php'>Go back to Add Another Group</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=Group'>View All Group</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();

?>