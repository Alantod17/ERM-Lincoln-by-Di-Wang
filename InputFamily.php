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

$Family = (isset($_POST["Family"]) and $_POST["Family"]!="")?$_POST["Family"]:NULL;
$Superfamily = (isset($_POST["Superfamily"]) and $_POST["Superfamily"]!="")?$_POST["Superfamily"]:NULL;
$Order = (isset($_POST["Order"]) and $_POST["Order"]!="")?$_POST["Order"]:NULL;
$Suborder = (isset($_POST["Suborder"]) and $_POST["Suborder"]!="")?$_POST["Suborder"]:NULL;
$FamilyCustom1 = (isset($_POST["FamilyCustom1"]) and $_POST["FamilyCustom1"]!="")?$_POST["FamilyCustom1"]:NULL;
$FamilyCustom2 = (isset($_POST["FamilyCustom2"]) and $_POST["FamilyCustom2"]!="")?$_POST["FamilyCustom2"]:NULL;
$FamilyCustom3 = (isset($_POST["FamilyCustom3"]) and $_POST["FamilyCustom3"]!="")?$_POST["FamilyCustom3"]:NULL;


$xmlOrders =LogicManager::xmlOutput("Listing","Order");


$SelectionOrder = "<option value=''>NULL</Option>";
foreach ($xmlOrders->children() as $xmlOrders) {
	$xmlOrderorder = $xmlOrders->Order;
	if ($xmlOrderorder == $Order) {
		$SelectionOrder = $SelectionOrder."<option value='$xmlOrderorder' selected='selected'>$xmlOrderorder</Option>";
	}
	else{
		$SelectionOrder = $SelectionOrder."<option value='$xmlOrderorder'>$xmlOrderorder</Option>";
	}

}

if (isset($_SESSION["secure"]["LoginUserName"]) or isset($Family)) {
echo <<<Out

<div id="box1">
<h1> Family Record</h1>
</br></br>
<form action="wsaddfamily.php" method="post" onsubmit="return CF()">
<input type="hidden" name="OldFamily" Value="$Family"/>
<table>
<tr><td>Family:</td><td> <input type="text" name="Family" id="Family" value="$Family"/></td></tr>
<tr><td>Superfamily:</td><td> <input type="text" name="Superfamily" value="$Superfamily"/></td></tr>
<tr><td>Order:</td><td> <select name="Order">$SelectionOrder</select></td></tr>
<tr><td>Suborder:</td><td> <input type="text" name="Suborder" value="$Suborder"/></td></tr>
<tr><td>FamilyCustom1:</td><td> <input type="text" name="FamilyCustom1" value="$FamilyCustom1"/> </td></tr>
<tr><td>FamilyCustom2:</td><td> <input type="text" name="FamilyCustom2" value="$FamilyCustom2"/> </td></tr>
<tr><td>FamilyCustom3:</td><td> <input type="text" name="FamilyCustom3" value="$FamilyCustom3"/> </td></tr>

</table>
</Br>
$Buttons


</form>
</div>
<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">
function CF(){
if (!CKNotEmpty("Family")){
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