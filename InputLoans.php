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

$Today = date("d-m-Y");
$daydate = date('dmY');
$daytime = date('Gis');
$FulldateTime = $daydate.$daytime;



$secure_Guest=LogicManager::getSecureLevelGuest();
$UserSecureLevel = isset($_SESSION["secure"]["LoginUserLevel"])?$_SESSION["secure"]["LoginUserLevel"]:$secure_Guest;
$Buttons = LogicManager::SecureLevelButton($UserSecureLevel);

$LoanCode = (isset($_POST["LoanCode"]) and $_POST["LoanCode"]!="")?$_POST["LoanCode"]:NULL;
$SpecimenCode = (isset($_POST["SpecimenCode"]) and $_POST["SpecimenCode"]!="")?$_POST["SpecimenCode"]:NULL;
$DateLoaned = (isset($_POST["DateLoaned"]) and $_POST["DateLoaned"]!="")?$_POST["DateLoaned"]:$Today;
$DateDue = (isset($_POST["DateDue"]) and $_POST["DateDue"]!="")?$_POST["DateDue"]:NULL;
$Borrower = (isset($_POST["Borrower"]) and $_POST["Borrower"]!="")?$_POST["Borrower"]:NULL;
$LoanPeriod = (isset($_POST["LoanPeriod"]) and $_POST["LoanPeriod"]!="")?$_POST["LoanPeriod"]:NULL;
$Returned = (isset($_POST["Returned"]) and $_POST["Returned"]!="")?$_POST["Returned"]:NULL;
$Description = (isset($_POST["Description"]) and $_POST["Description"]!="")?$_POST["Description"]:NULL;
$NumberLent = (isset($_POST["NumberLent"]) and $_POST["NumberLent"]!="")?$_POST["NumberLent"]:NULL;
$NumberReturned = (isset($_POST["NumberReturned"]) and $_POST["NumberReturned"]!="")?$_POST["NumberReturned"]:NULL;
$LoanRecordDate = (isset($_POST["LoanRecordDate"]) and $_POST["LoanRecordDate"]!="")?$_POST["LoanRecordDate"]:NULL;
$LoanRecChangedDate = (isset($_POST["LoanRecChangedDate"]) and $_POST["LoanRecChangedDate"]!="")?$_POST["LoanRecChangedDate"]:NULL;

$CKStatus="";
if ($Returned=="Returned") {
	$CKStatus='Checked="checked"';
}

$xmlPersonnel =LogicManager::xmlOutput("Listing","Personnel");
$xmlSpecimen =LogicManager::xmlOutput("Listing","Specimen");

$SelectionBorrower = "";
foreach ($xmlPersonnel->children() as $xmlPer) {
	$xmlShortName = $xmlPer->ShortName;
	$PersonnelShortNamearray["$xmlShortName"]="exist";
	if ($xmlShortName == $Borrower) {
		$SelectionBorrower = $SelectionBorrower."<option value='$xmlShortName' selected='selected'>$xmlShortName</Option>";
	}
	else{
		$SelectionBorrower = $SelectionBorrower."<option value='$xmlShortName'>$xmlShortName</Option>";
	}

}

$SelectionSpecimen = "<option value=''>NULL</Option>";
foreach ($xmlSpecimen->children() as $xmlSpe) {
	$xmlSpecimenCode = $xmlSpe->SpecimenCode;
	if ($xmlSpecimenCode == $SpecimenCode) {
		$SelectionSpecimen = $SelectionSpecimen."<option value='$xmlSpecimenCode' selected='selected'>$xmlSpecimenCode</Option>";
	}
	else{
		$SelectionSpecimen = $SelectionSpecimen."<option value='$xmlSpecimenCode'>$xmlSpecimenCode</Option>";
	}

}


if (isset($_SESSION["secure"]["LoginUserName"]) or isset($LoanCode)) {
echo <<<Out




<div id="box1">
<h1> Loans Record</h1>
</br></br>
<form action="wsaddloans.php" method="post" onsubmit="return CF()" >
<input type="hidden" name="OldLoanCode" Value="$LoanCode"/>
<table>

<tr><td>SpecimenCode:</td><td> <select name="SpecimenCode" id="SpecimenCode" onchange="setLoanCode('$FulldateTime',this.value)">$SelectionSpecimen</select></td></tr>
<tr><td>Borrower:</td><td> <select name="Borrower" id="Borrower">$SelectionBorrower</select><a href="#" onclick="openwinP('inputpersonnel.php','ShortName','Borrower')">New</a></td></tr>
<tr><td>DateLoaned:</td><td> <input type="text" name="DateLoaned" id="DateLoaned" value="$DateLoaned" onblur="CheckEDate(this.value,'DateLoaned','$DateLoaned');LoanP('$LoanPeriod');"/></td></tr>
<tr><td>DateDue:</td><td> <input type="text" name="DateDue" id="DateDue" value="$DateDue" onblur="CK_DateLateEqualThanTarget('DateLoaned','DateDue','$DateDue');LoanP('$LoanPeriod');"/></td></tr>
<tr><td>LoanPeriod:</td><td> <input type="text" id="LoanPeriod" name="LoanPeriod" value="$LoanPeriod" onblur="DateCalculate('DateLoaned','DateDue',this.value)"/>Days</td></tr>
<tr><td>Returned:</td><td> <input type="checkbox" name="Returned" value=1 $CKStatus/></td></tr>
<tr><td>Description:</td><td> <input type="text" name="Description" value="$Description"/> </td></tr>
<tr><td>NumberLent:</td><td> <input type="text" name="NumberLent" id="NumberLent" value="$NumberLent"/> </td></tr>
<tr><td>NumberReturned:</td><td> <input type="text" name="NumberReturned" id="NumberReturned" value="$NumberReturned"/> </td></tr>
<tr><td>LoanRecordDate:</td><td> <input type="text" name="LoanRecordDate" id="LoanRecordDate" value="$LoanRecordDate" onblur="CheckEDate(this.value,'LoanRecordDate','$LoanRecordDate')"/> </td></tr>
<tr><td>LoanRecChangedDate:</td><td> <input type="text" name="LoanRecChangedDate" value="$LoanRecChangedDate" onblur="CheckEDate(this.value,'LoanRecChangedDate','$LoanRecChangedDate')"/> </td></tr>
<tr><td>LoanCode:</td><td> <input type="text" name="LoanCode" id="LoanCode" value="$LoanCode"/></td></tr>

</table>
</Br>
$Buttons


</form>
</div>
<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">

function LoanP(Default){
var LoanPer = DateDiff('DateDue','DateLoaned',Default);

document.getElementById('LoanPeriod').value = LoanPer;
}

LoanP('$LoanPeriod');


function CF(){
var CKOK = true;
if (!CKNotEmpty("SpecimenCode")){
  CKOK = false;
}

if (!CKNotEmpty("LoanCode")){
  CKOK = false;
}

if (!CKNum("NumberLent")){
  CKOK = false;
}

if (!CKNum("NumberReturned")){
  CKOK = false;
}


if (!CKOK){
alert ("Please Check Coloured fileds!");}
return CKOK;

}


function setLoanCode(date,SpecimenNo){
var LoanCode = date + SpecimenNo;
document.getElementById('LoanCode').value = LoanCode;
}

</script>
Out;
}
else{
echo <<<UnLogin
<h1>Input is for Authorised Person Only</h1><br/><br/>

<a href="Login.php">Please Login Here</a>

UnLogin;
}

echo '<script>';
echo 'function openwinP(table,PK,selectid){';
echo 'var sStr = prompt("Pleas enter your ShortName");';
echo 'if(sStr!=null&&sStr!=""){';
echo 'var arr = new Array();';
foreach ($PersonnelShortNamearray as $key=>$value ) {
	$keys='"'.$key.'"';
	$Values='"'.$value.'"';
	echo 'arr['.$keys.']='.$Values.';';
}
echo 'if(arr[sStr]!="exist"){';
echo 'var url=table+"?"+PK+"="+sStr;';
echo 'window.open(url,"","channelmode=0,scrollbars=1,resizable=1,width=800,height=500,fullscreen=0");';
echo 'document.getElementById(selectid).options.add(new Option(sStr,sStr))';
echo '}';
echo 'else{alert("ShortName exsit")}';
echo '}';
echo 'else{alert("Please enter your ShortName");}';

echo '}';
echo '</script>';


/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>