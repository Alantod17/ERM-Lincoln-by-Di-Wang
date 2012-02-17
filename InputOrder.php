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

$Order = (isset($_POST["Order"]) and $_POST["Order"]!="")?$_POST["Order"]:NULL;
$Superorder = (isset($_POST["Superorder"]) and $_POST["Superorder"]!="")?$_POST["Superorder"]:NULL;
$Class = (isset($_POST["Class"]) and $_POST["Class"]!="")?$_POST["Class"]:NULL;
$SubClass = (isset($_POST["SubClass"]) and $_POST["SubClass"]!="")?$_POST["SubClass"]:NULL;
$OrderCustom1 = (isset($_POST["OrderCustom1"]) and $_POST["OrderCustom1"]!="")?$_POST["OrderCustom1"]:NULL;
$OrderCustom2 = (isset($_POST["OrderCustom2"]) and $_POST["OrderCustom2"]!="")?$_POST["OrderCustom2"]:NULL;
$OrderCustom3 = (isset($_POST["OrderCustom3"]) and $_POST["OrderCustom3"]!="")?$_POST["OrderCustom3"]:NULL;


$xmlClass =LogicManager::xmlOutput("Listing","Class");


$SelectionClass = "<option value=''>NULL</Option>";
foreach ($xmlClass->children() as $xmlCla) {
	$xmlClassName = $xmlCla->Class;
	if ($xmlClassName == $Class) {
		$SelectionClass = $SelectionClass."<option value='$xmlClassName' selected='selected'>$xmlClassName</Option>";
	}
	else{
		$SelectionClass = $SelectionClass."<option value='$xmlClassName'>$xmlClassName</Option>";
	}

}

if (isset($_SESSION["secure"]["LoginUserName"]) or isset($Order)) {
echo <<<Out




<div id="box1">
<h1> Order Record</h1>
</br></br>
<form action="wsaddOrder.php" method="post" onsubmit="return CF()" >
<input type="hidden" name="OldOrder" Value="$Order"/>
<table>
<tr><td>Order:</td><td> <input type="text" name="Order" id="Order" value="$Order"/></td></tr>
<tr><td>Superorder:</td><td> <input type="text" name="Superorder" value="$Superorder"/></td></tr>
<tr><td>Class:</td><td> <select name="Class">$SelectionClass</select></td></tr>
<tr><td>SubClass:</td><td> <input type="text" name="SubClass" value="$SubClass"/></td></tr>
<tr><td>OrderCustom1:</td><td> <input type="text" name="OrderCustom1" value="$OrderCustom1"/> </td></tr>
<tr><td>OrderCustom2:</td><td> <input type="text" name="OrderCustom2" value="$OrderCustom2"/> </td></tr>
<tr><td>OrderCustom3:</td><td> <input type="text" name="OrderCustom3" value="$OrderCustom3"/> </td></tr>

</table>
</Br>
$Buttons


</form>
</div>
<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">
function CF(){
if (!CKNotEmpty("Order")){
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