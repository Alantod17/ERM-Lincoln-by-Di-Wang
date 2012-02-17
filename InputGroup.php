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
$secure_Guest=LogicManager::getSecureLevelGuest();
$UserSecureLevel = isset($_SESSION["secure"]["LoginUserLevel"])?$_SESSION["secure"]["LoginUserLevel"]:$secure_Guest;
$Buttons = LogicManager::SecureLevelButton($UserSecureLevel);

$GroupName = (isset($_POST["GroupName"]) and $_POST["GroupName"]!="")?$_POST["GroupName"]:NULL;
$ShortName = (isset($_POST["ShortName"]) and $_POST["ShortName"]!="")?$_POST["ShortName"]:NULL;
$MemberNumber = (isset($_POST["MemberNumber"]) and $_POST["MemberNumber"]!="")?$_POST["MemberNumber"]:NULL;


$xmlPersonnel =LogicManager::xmlOutput("Listing","Personnel");

$SelectionPerson = "";
foreach ($xmlPersonnel->children() as $xmlper) {
	$xmlperShortName = $xmlper->ShortName;
	$PersonnelShortNamearray["$xmlperShortName"]="exist";
	if ($xmlperShortName == $ShortName) {
		$SelectionPerson = $SelectionPerson."<option value='$xmlperShortName' selected='selected'>$xmlperShortName</Option>";
	}
	else{
		$SelectionPerson = $SelectionPerson."<option value='$xmlperShortName'>$xmlperShortName</Option>";
	}

}

if (isset($_SESSION["secure"]["LoginUserName"]) or isset($GroupName)) {
echo <<<Out

<div id="box1">
<h1> Group Record</h1>
</br></br>
<form action="wsaddgroup.php" method="post" onsubmit="return CF()">
<input type="hidden" name="OldGroupName" Value="$GroupName"/>
<input type="hidden" name="OldShortName" Value="$ShortName"/>
<table>
<tr><td>GroupName:</td><td> <input type="text" name="GroupName" id="GroupName" value="$GroupName"/></td></tr>
<tr><td>Person:</td><td> <select name="ShortName" id="ShortName">$SelectionPerson</select><a href="#" onclick="openwinP('inputpersonnel.php','ShortName','ShortName')">New</a></td></tr>
<tr><td>MemberNumber:</td><td> <input type="text" name="MemberNumber" id="MemberNumber" value="$MemberNumber"/></td></tr>


</table>
</Br>
$Buttons


</form>
</div>
<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">
function CF(){
var CKOK = true;
if (!CKNotEmpty("GroupName")){
  CKOK = false;
}

if (!CKNum("MemberNumber")){
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