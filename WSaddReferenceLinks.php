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

$TableName = (isset($_POST["TableName"]) and $_POST["TableName"]!="")?$_POST["TableName"]:NULL;
$RecordCode = (isset($_POST["RecordCode"]) and $_POST["RecordCode"]!="")?$_POST["RecordCode"]:NULL;
$ReferenceNo = (isset($_POST["ReferenceNo"]) and $_POST["ReferenceNo"]!="")?$_POST["ReferenceNo"]:NULL;


$RefLinkExist = LogicManager::CKRecordExistwithThreePK('ReferenceLinks','TableName',$TableName,'RecordCode',$RecordCode,'ReferenceNo',$ReferenceNo,'ReferenceLinks');


$OldTableName =(isset($_POST["OldTableName"]) and $_POST["OldTableName"]!="")?$_POST["OldTableName"]:NULL;
$OldRecordCode =(isset($_POST["OldRecordCode"]) and $_POST["OldRecordCode"]!="")?$_POST["OldRecordCode"]:NULL;
$OldReferenceNo =(isset($_POST["OldReferenceNo"]) and $_POST["OldReferenceNo"]!="")?$_POST["OldReferenceNo"]:NULL;
$function=isset($_POST["submit"])?$_POST["submit"]:NULL;




switch ($function) {
	case "Add a New Record":
	{
		if (!$RefLinkExist) {
				$result = LogicManager::addReferenceLinks($TableName,$RecordCode,$ReferenceNo);
		}else{
			echo "<h2>Record you entered already Exist</h2>";
			$result = False;
		}

	};
	break;
	case "Edit This Record":{
		$result = LogicManager::DeleteWithThreePK("ReferenceLinks","TableName","$OldTableName","RecordCode","$OldRecordCode","ReferenceNo","$OldReferenceNo");
		$result = LogicManager::addReferenceLinks($TableName,$RecordCode,$ReferenceNo);
	};
	break;
	case "Delete This Record":
	{
		$result = LogicManager::DeleteWithThreePK("ReferenceLinks","TableName","$OldTableName","RecordCode","$OldRecordCode","ReferenceNo","$OldReferenceNo");
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
	echo "</br></br><a href='inputReferencelinks.php'>Go back to Add Another Referencelinks</a>";
}

echo "</br></br><a href='output.php?method=Listing&table=ReferenceLinks'>View All Referencelinks</a>";
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>