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

$secure_Guest=LogicManager::getSecureLevelGuest();
$UserSecureLevel = isset($_SESSION["secure"]["LoginUserLevel"])?$_SESSION["secure"]["LoginUserLevel"]:$secure_Guest;
$Buttons = LogicManager::SecureLevelButton($UserSecureLevel);

$LoanCode = (isset($_POST["LoanCode"]) and $_POST["LoanCode"]!="")?$_POST["LoanCode"]:NULL;
$NoteDate = (isset($_POST["NoteDate"]) and $_POST["NoteDate"]!="")?$_POST["NoteDate"]:$Today;
$NoteBy = (isset($_POST["NoteBy"]) and $_POST["NoteBy"]!="")?$_POST["NoteBy"]:NULL;
$NoteText = (isset($_POST["NoteText"]) and $_POST["NoteText"]!="")?$_POST["NoteText"]:NULL;
$Null = (isset($_POST["Null"]) and $_POST["Null"]!="")?$_POST["Null"]:NULL;


$xmlLoans =LogicManager::xmlOutput("Listing","Loans");

$SelectionLoansCode = "";
foreach ($xmlLoans->children() as $xmlLon) {
	$xmlLoansCode = $xmlLon->LoanCode;
	if ($xmlLoansCode == $LoanCode) {
		$SelectionLoansCode = $SelectionLoansCode."<option value='$xmlLoansCode' selected='selected'>$xmlLoansCode</Option>";
	}
	else{
		$SelectionLoansCode = $SelectionLoansCode."<option value='$xmlLoansCode'>$xmlLoansCode</Option>";
	}

}


$xmlPersonnel =LogicManager::xmlOutput("Listing","Personnel");

$SelectionPerson = "";
foreach ($xmlPersonnel->children() as $xmlper) {
	$xmlperShortName = $xmlper->ShortName;
	$PersonnelShortNamearray["$xmlperShortName"]="exist";
	if ($xmlperShortName == $NoteBy) {
		$SelectionPerson = $SelectionPerson."<option value='$xmlperShortName' selected='selected'>$xmlperShortName</Option>";
	}
	else{
		$SelectionPerson = $SelectionPerson."<option value='$xmlperShortName'>$xmlperShortName</Option>";
	}

}

if (isset($_SESSION["secure"]["LoginUserName"]) or isset($LoanCode)) {
echo <<<Out


<div id="box1">
<h1> Loans Note Record</h1>
</br></br>
<form action="wsaddloansnotes.php" method="post" onsubmit="return CF()">
<input type="hidden" name="OldNoteTypeCode" Value="$LoanCode"/>
<input type="hidden" name="OldNoteDate" Value="$NoteDate"/>
<input type="hidden" name="OldNoteBy" Value="$NoteBy"/>
<input type="hidden" name="OldNoteText" Value="$NoteText"/>



<table>
<tr><td>LoanCode:</td><td> <select name="LoanCode" id="LoanCode">$SelectionLoansCode</select></td></tr>
<tr><td>NoteDate:</td><td> <input type="text" name="NoteDate" id="NoteDate" value="$NoteDate" onblur="CheckEDate(this.value,'NoteDate','$NoteDate')"/></td></tr>
<tr><td>NoteBy:</td><td> <select name="NoteBy" id="NoteBy">$SelectionPerson</select><a href="#" onclick="openwinP('inputpersonnel.php','ShortName','NoteBy')">New</a></td></tr>
<tr><td>NoteText:</td><td> <textarea id="txtarea" name="NoteText" id="NoteText" >$NoteText</textarea></td></tr>

</table>
</Br>
$Buttons


</form>
</div>
<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">
function CF(){
var CKOK = true;
if (!CKNotEmpty("NoteDate")){
  CKOK = false;
}
if (!CKNotEmpty("NoteText")){
  CKOK = false;
}
if (!CKOK){
alert ("Please Check Coloured fileds!");}
return CKOK;
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