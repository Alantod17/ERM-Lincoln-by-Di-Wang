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
$hg->openBody("Listing");
$hg->openContent();
/** * Code that we write should go after here */
$secure_Sysadmin=LogicManager::getSecureLevelSystemAdmin();
$secure_Guest=LogicManager::getSecureLevelGuest();
$LoginUserSecureLevel = isset($_SESSION["secure"]["LoginUserLevel"])?$_SESSION["secure"]["LoginUserLevel"]:$secure_Guest;
$Buttons = LogicManager::SecureLevelButton($LoginUserSecureLevel);

$UserName = (isset($_POST["UserName"]) and $_POST["UserName"]!="")?$_POST["UserName"]:NULL;
$UserPassword = (isset($_POST["UserPassword"]) and $_POST["UserPassword"]!="")?$_POST["UserPassword"]:NULL;
$UserSecureLevel = (isset($_POST["UserSecureLevel"]) and $_POST["UserSecureLevel"]!="")?$_POST["UserSecureLevel"]:NULL;
$UserPerson = (isset($_POST["Person"]) and $_POST["Person"]!="")?$_POST["Person"]:NULL;



$xmlPersonnel =LogicManager::xmlOutput("Listing","Personnel");

$SelectionPerson = "<option value=''>NULL</Option>";
foreach ($xmlPersonnel->children() as $Person ) {
	$xmlShortName = $Person->ShortName;
	if ($xmlShortName==$UserPerson) {
		$SelectionPerson = $SelectionPerson."<option value='$xmlShortName' selected='selected'>$xmlShortName</Option>";
	}
	else{
		$SelectionPerson = $SelectionPerson."<option value='$xmlShortName'>$xmlShortName</Option>";
	}
}


if ($LoginUserSecureLevel==$secure_Sysadmin) {
echo <<<Out

<div id="box1">
<h1> Web Users</h1>
</br></br>
<form action="wsaddWebUser.php" method="post" onsubmit="return CF()" >
<input type="hidden" name="OldUseName" Value="$UserName"/>
<table>
<tr><td>UserName:</td><td> <input type="text" name="UserName" id="UserName" value="$UserName" /></td></tr>
<tr><td>UserPassword:</td><td> <input type="Password" name="UserPassword" id="UserPassword" value="$UserPassword"/></td></tr>
<tr><td>ConfirmPassword:</td><td> <input type="Password" name="ConfirmPassword" id="ConfirmPassword" value="$UserPassword" onblur="CP(this.value)"/></td></tr>
<tr><td>UserSecureLevel:</td><td> <input type="text" name="UserSecureLevel" id="UserSecureLevel" value="$UserSecureLevel"/></td></tr>
<tr><td>Person:</td><td> <select name="UserPerson">$SelectionPerson</select></td></tr>
</table>
</Br>
<p style="color:Green";>Secure Level</p>
System Administrator:0 || Data Administrator:5 || Web User:10</Br>
</Br>
$Buttons

</form>
</div>
<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">
function CF(){
var CKOK = true;
if (!CKNotEmpty("UserName")){
  CKOK = false;
}

if (!CKNotEmpty("UserPassword")){
  CKOK = false;
}

if (!CKNotEmpty("ConfirmPassword")){
  CKOK = false;
}

if (!CKNum("UserSecureLevel")){
  CKOK = false;
}

if (!CKNotEmpty("UserSecureLevel")){
  CKOK = false;
}



if (!CKOK){
alert ("Please Check Coloured fileds!");}
return CKOK;

}


function CP(val){

   var Password = document.getElementById('UserPassword').value;
   if (val!=""){
   if (Password != val){
   document.getElementById('ConfirmPassword').style.backgroundColor = "aquamarine";
   alert ("Passwords entered not same");
   document.getElementById('ConfirmPassword').value = "";
   document.getElementById('ConfirmPassword').focus();
   }}
}
</script>
Out;
}
else{
echo <<<UnLogin
<h1>System Admin Only</h1><br/><br/>

<a href="Login.php">Please Login Here</a>

UnLogin;
}

/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>