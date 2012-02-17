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

$Phylum = (isset($_POST["Phylum"]) and $_POST["Phylum"]!="")?$_POST["Phylum"]:NULL;
$Subkingdom = (isset($_POST["Subkingdom"]) and $_POST["Subkingdom"]!="")?$_POST["Subkingdom"]:NULL;
$Kingdom = (isset($_POST["Kingdom"]) and $_POST["Kingdom"]!="")?$_POST["Kingdom"]:NULL;
$PhylumCustom1 = (isset($_POST["PhylumCustom1"]) and $_POST["PhylumCustom1"]!="")?$_POST["PhylumCustom1"]:NULL;
$PhylumCustom2 = (isset($_POST["PhylumCustom2"]) and $_POST["PhylumCustom2"]!="")?$_POST["PhylumCustom2"]:NULL;


$xmlKingdom =LogicManager::xmlOutput("Listing","Kingdom");


$SelectionKingdom = "<option value=''>NULL</Option>";
foreach ($xmlKingdom->children() as $xmlKin) {
	$xmlKinName = $xmlKin->Kingdom;
	if ($xmlKinName == $Kingdom) {
		$SelectionKingdom = $SelectionKingdom."<option value='$xmlKinName' selected='selected'>$xmlKinName</Option>";
	}
	else{
		$SelectionKingdom = $SelectionKingdom."<option value='$xmlKinName'>$xmlKinName</Option>";
	}

}

if (isset($_SESSION["secure"]["LoginUserName"]) or isset($Phylum)) {
echo <<<Out




<div id="box1">
<h1> Phylum Record</h1>
</br></br>
<form action="wsaddPhylum.php" method="post" onsubmit="return CF()">
<input type="hidden" name="OldPhylum" Value="$Phylum"/>
<table>
<tr><td>Phylum:</td><td> <input type="text" name="Phylum" id="Phylum" value="$Phylum"/></td></tr>
<tr><td>Kingdom:</td><td> <select name="Kingdom">$SelectionKingdom</select></td></tr>
<tr><td>Subkingdom:</td><td> <input type="text" name="Subkingdom" value="$Subkingdom"/></td></tr>
<tr><td>PhylumCustom1:</td><td> <input type="text" name="PhylumCustom1" value="$PhylumCustom1"/></td></tr>
<tr><td>PhylumCustom1:</td><td> <input type="text" name="PhylumCustom1" value="$PhylumCustom2"/> </td></tr>

</table>
</Br>
$Buttons


</form>
</div>
<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">
function CF(){
if (!CKNotEmpty("Phylum")){
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