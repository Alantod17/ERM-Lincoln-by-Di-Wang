<?php

/**
 *Group Loan Process page
 *
 * @version $Id$
 * @copyright 2012
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






if ($_POST["submit"]=="Loan Selected Specimens") {
    $count = 1;
	$Today = date("d-m-Y");
	$daydate = date('dmY');
	$daytime = date('Gis');
	$FulldateTime = $daydate.$daytime;
	$Specimenarray = array();


	$LoanCode = (isset($_POST["LoanCode"]) and $_POST["LoanCode"]!="")?$_POST["LoanCode"]:NULL;

	$DateLoaned = (isset($_POST["DateLoaned"]) and $_POST["DateLoaned"]!="")?$_POST["DateLoaned"]:$Today;
	$DateDue = (isset($_POST["DateDue"]) and $_POST["DateDue"]!="")?$_POST["DateDue"]:NULL;
	$Borrower = (isset($_POST["Borrower"]) and $_POST["Borrower"]!="")?$_POST["Borrower"]:NULL;
	$LoanPeriod = (isset($_POST["LoanPeriod"]) and $_POST["LoanPeriod"]!="")?$_POST["LoanPeriod"]:NULL;

	$Description = (isset($_POST["Description"]) and $_POST["Description"]!="")?$_POST["Description"]:NULL;
	$LoanRecordDate = (isset($_POST["LoanRecordDate"]) and $_POST["LoanRecordDate"]!="")?$_POST["LoanRecordDate"]:NULL;
	$LoanRecChangedDate = (isset($_POST["LoanRecChangedDate"]) and $_POST["LoanRecChangedDate"]!="")?$_POST["LoanRecChangedDate"]:NULL;



	$xmlPersonnel =LogicManager::xmlOutput("Listing","Personnel");
	$xmlSpecimen =LogicManager::xmlOutput("Listing","Specimen");

	$SelectionBorrower = "<option value=''>NULL</Option>";
foreach ($xmlPersonnel->children() as $xmlPer) {
	$xmlShortName = $xmlPer->ShortName;
	$PersonnelShortNamearray["$xmlShortName"]="exist";
	$SelectionBorrower = $SelectionBorrower."<option value='$xmlShortName'>$xmlShortName</Option>";

}
	echo "<div id='box1'>";
	echo "<form method='post' action='GroupLoanProcess.php' onsubmit='return CF()'>";
	echo "<h1>Rent Specimen:</h1></br>";
	foreach ($_POST as $key=>$val ) {
		if ($key != "submit" and $val!="") {
			if ($count<7) {
				echo $val.",  ";
			array_push($Specimenarray,$val );
				$count = $count+1;
			}else{
				echo $val."</br>";
				array_push($Specimenarray,$val );
				$count = $count-6;
			}

		}
	}
	$LoanNumber = count($Specimenarray);
	$Specimenarray = serialize($Specimenarray);

if ($LoanNumber>0) {
	echo "<input type='hidden' name='Specimenarray' value='$Specimenarray'/>";
echo <<<TB
</br></br></br></br>
<table>

<tr><td>Borrower:</td><td> <select name="Borrower" id="Borrower" onchange="setLoanCode('$FulldateTime',this.value)">$SelectionBorrower</select><a href="#" onclick="openwinP('inputpersonnel.php','ShortName','Borrower')">New</a></td></tr>
<tr><td>DateLoaned:</td><td> <input type="text" name="DateLoaned" id="DateLoaned" value="$DateLoaned" onblur="CheckEDate(this.value,'DateLoaned','$DateLoaned');LoanP('$LoanPeriod');"/></td></tr>
<tr><td>DateDue:</td><td> <input type="text" name="DateDue" id="DateDue" value="$DateDue" onblur="CK_DateLateEqualThanTarget('DateLoaned','DateDue','$DateDue');LoanP('$LoanPeriod');"/></td></tr>
<tr><td>LoanPeriod:</td><td> <input type="text" id="LoanPeriod" name="LoanPeriod" value="$LoanPeriod" onblur="DateCalculate('DateLoaned','DateDue',this.value)"/>Days</td></tr>
<tr><td>Description:</td><td> <input type="text" name="Description" value="$Description"/> </td></tr>
<tr><td>LoanRecordDate:</td><td> <input type="text" name="LoanRecordDate" id="LoanRecordDate" value="$LoanRecordDate" onblur="CheckEDate(this.value,'LoanRecordDate','$LoanRecordDate')"/> </td></tr>
<tr><td>LoanRecChangedDate:</td><td> <input type="text" name="LoanRecChangedDate" value="$LoanRecChangedDate" onblur="CheckEDate(this.value,'LoanRecChangedDate','$LoanRecChangedDate')"/> </td></tr>
<tr><td>LoanCode:</td><td> <input type="text" name="LoanCode" id="LoanCode" value="$LoanCode"/></td></tr>

</table>

<input type='submit' name='submit' Value='ADD Loan' onclick='AddConfirm();return false;'>
<input type='reset' name='reset' Value='Reset'>
TB;
}else{
	echo "<h1 style='color:red;'>Please Select Specimen to Rent</h1></br></br>";
	echo "<a href='loanandbarcode.php'>Back to Specimen List</a>";
}


echo <<<TB
<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">

function LoanP(Default){
var LoanPer = DateDiff('DateDue','DateLoaned',Default);

document.getElementById('LoanPeriod').value = LoanPer;
}

LoanP('$LoanPeriod');


function CF(){
var CKOK = true;

if (!CKNotEmpty("LoanCode")){
  CKOK = false;
}

if (!CKNotEmpty("Borrower")){
  CKOK = false;
}


if (!CKOK){
alert ("Please Check Coloured fileds!");}
return CKOK;

}


function setLoanCode(date,Borrower){
var LoanCode = "GroupLoan" + date + Borrower;
document.getElementById('LoanCode').value = LoanCode;
}

</script>
TB;
	echo "</form>";
	echo "</div>";

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
}


if ($_POST["submit"]=="Return Selected Specimens") {
foreach ($_POST as $key=>$val) {
	if ($key!="submit" and $val!="") {
		if (!LogicManager::CKSpecimenCanLoan($val)) {
			$ReturnOK = LogicManager::updateReturnLoan($val);
			if ($ReturnOK) {
				echo "<h2 style='color:green;'>".$val." Return Success</h2>";
			}else{
				echo "<h2 style='color:red;'>".$val." Return Fail</h2>";
			}
		}else{
			echo "<h2 style='color:red;'>".$val." is not on loan</h2>";
		}
	}
}
echo "<a href='loanandbarcode.php'>Back to Specimen List</a>";
}

/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();

?>