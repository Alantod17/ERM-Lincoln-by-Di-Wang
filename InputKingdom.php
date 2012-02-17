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

$Kingdom = (isset($_POST["Kingdom"]) and $_POST["Kingdom"]!="")?$_POST["Kingdom"]:NULL;
$Superkingdom = (isset($_POST["Superkingdom"]) and $_POST["Superkingdom"]!="")?$_POST["Superkingdom"]:NULL;
$KingdomCustom1 = (isset($_POST["KingdomCustom1"]) and $_POST["KingdomCustom1"]!="")?$_POST["KingdomCustom1"]:NULL;
$KingdomCustom2 = (isset($_POST["KingdomCustom2"]) and $_POST["KingdomCustom2"]!="")?$_POST["KingdomCustom2"]:NULL;




if (isset($_SESSION["secure"]["LoginUserName"]) or isset($Kingdom)) {
echo <<<Out




<div id="box1">
<h1> Kingdom Record</h1>
</br></br>
<form action="wsaddKingdom.php" method="post" onsubmit="return CF()">
<input type="hidden" name="OldKingdom" Value="$Kingdom"/>
<table>
<tr><td>Kingdom:</td><td> <input type="text" name="Kingdom" id="Kingdom" value="$Kingdom"/></td></tr>
<tr><td>Superkingdom:</td><td> <input type="text" name="Superkingdom" value="$Superkingdom"/></td></tr>
<tr><td>KingdomCustom1:</td><td> <input type="text" name="KingdomCustom1" value="$KingdomCustom1"/></td></tr>
<tr><td>KingdomCustom2:</td><td> <input type="text" name="KingdomCustom2" value="$KingdomCustom2"/> </td></tr>

</table>
</Br>
$Buttons


</form>
</div>
<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">
function CF(){
if (!CKNotEmpty("Kingdom")){
alert ("Please check coloured filed");
return false;
}
else{return true;}
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

/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>