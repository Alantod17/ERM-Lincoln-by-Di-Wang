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

$Genus = (isset($_POST["Genus"]) and $_POST["Genus"]!="")?$_POST["Genus"]:NULL;
$Tribe = (isset($_POST["Tribe"]) and $_POST["Tribe"]!="")?$_POST["Tribe"]:NULL;
$Family = (isset($_POST["Family"]) and $_POST["Family"]!="")?$_POST["Family"]:NULL;
$Subfamily = (isset($_POST["Subfamily"]) and $_POST["Subfamily"]!="")?$_POST["Subfamily"]:NULL;
$GenusCustom1 = (isset($_POST["GenusCustom1"]) and $_POST["GenusCustom1"]!="")?$_POST["GenusCustom1"]:NULL;
$GenusCustom2 = (isset($_POST["GenusCustom2"]) and $_POST["GenusCustom2"]!="")?$_POST["GenusCustom2"]:NULL;
$GenusCustom3 = (isset($_POST["GenusCustom3"]) and $_POST["GenusCustom3"]!="")?$_POST["GenusCustom3"]:NULL;


$xmlFamilys =LogicManager::xmlOutput("Listing","Family");


$SelectionFamily= "<option value=''>NULL</Option>";
foreach ($xmlFamilys->children() as $xmlFamily) {
	$xmlFamilyFamily = $xmlFamily->Family;
	if ($xmlFamilyFamily == $Family) {
		$SelectionFamily = $SelectionFamily."<option value='$xmlFamilyFamily' selected='selected'>$xmlFamilyFamily</Option>";
	}
	else{
		$SelectionFamily = $SelectionFamily."<option value='$xmlFamilyFamily'>$xmlFamilyFamily</Option>";
	}

}

if (isset($_SESSION["secure"]["LoginUserName"]) or isset($Genus)) {
echo <<<Out

<div id="box1">
<h1> Genus Record</h1>
</br></br>
<form action="wsaddgenus.php" method="post" onsubmit="return CF()">
<input type="hidden" name="OldGenus" Value="$Genus"/>
<table>
<tr><td>Genus:</td><td> <input type="text" name="Genus" id="Genus" value="$Genus"/></td></tr>
<tr><td>Family:</td><td> <select name="Family">$SelectionFamily</select></td></tr>
<tr><td>Subfamily:</td><td> <input type="text" name="Subfamily" value="$Subfamily"/></td></tr>
<tr><td>Tribe:</td><td> <input type="text" name="Tribe" value="$Tribe"/></td></tr>
<tr><td>GenusCustom1:</td><td> <input type="text" name="GenusCustom1" value="$GenusCustom1"/></td></tr>
<tr><td>GenusCustom2:</td><td> <input type="text" name="GenusCustom2" value="$GenusCustom2"/> </td></tr>
<tr><td>GenusCustom3:</td><td> <input type="text" name="GenusCustom3" value="$GenusCustom3"/> </td></tr>

</table>
</Br>
$Buttons


</form>
</div>
<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">
function CF(){
if (!CKNotEmpty("Genus")){
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