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


$UserName = (isset($_POST["UserName"]) and $_POST["UserName"]!="")?$_POST["UserName"]:NULL;
$UserPassword = (isset($_POST["UserPassword"]) and $_POST["UserPassword"]!="")?$_POST["UserPassword"]:NULL;
$UserSecureLevel = (isset($_POST["UserSecureLevel"]) and $_POST["UserSecureLevel"]!="")?$_POST["UserSecureLevel"]:NULL;
$UserPerson = (isset($_POST["UserPerson"]) and $_POST["UserPerson"]!="")?$_POST["UserPerson"]:NULL;

$UserExist = LogicManager::CKRecordExistwithOnePK('Webusers','UserName',$UserName,'WebUsers');




$OldUseName =(isset($_POST["OldUseName"]) and $_POST["OldUseName"]!="")?$_POST["OldUseName"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;


switch ($function) {
	case "Add a New Record":
	{
		if (!$UserExist) {
			$result = LogicManager::addWebUsers($UserName,$UserPassword,$UserSecureLevel,$UserPerson);
		}
		else{
			echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}
	};
	break;
	case "Edit This Record":{
		$result = LogicManager::DeleteWithOnePK("Webusers","UserName","$OldUseName");
		$result = LogicManager::addWebUsers($UserName,$UserPassword,$UserSecureLevel,$UserPerson);
	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteWithOnePK("Webusers","UserName","$OldUseName");
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
	echo "</br></br><a href='inputWebuser.php'>Go back to Add Another User</a>";
}

echo "</br></br><a href='webuserlist.php'>View All Users</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>