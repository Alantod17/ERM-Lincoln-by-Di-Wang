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

$Class = (isset($_POST["Class"]) and $_POST["Class"]!="")?$_POST["Class"]:NULL;
$Subphylum = (isset($_POST["Subphylum"]) and $_POST["Subphylum"]!="")?$_POST["Subphylum"]:NULL;
$Phylum = (isset($_POST["Phylum"]) and $_POST["Phylum"]!="")?$_POST["Phylum"]:NULL;
$ClassCustom1 = (isset($_POST["ClassCustom1"]) and $_POST["ClassCustom1"]!="")?$_POST["ClassCustom1"]:NULL;
$ClassCustom2 = (isset($_POST["ClassCustom2"]) and $_POST["ClassCustom2"]!="")?$_POST["ClassCustom2"]:NULL;


$xmlPhylums =LogicManager::xmlOutput("Listing","Phylum");


$SelectionPhylum = "<option value=''>NULL</Option>";
foreach ($xmlPhylums->children() as $xmlPhylum) {
	$xmlPhylumPhylum = $xmlPhylum->Phylum;
	if ($xmlPhylumPhylum == $Phylum) {
		$SelectionPhylum = $SelectionPhylum."<option value='$xmlPhylumPhylum' selected='selected'>$xmlPhylumPhylum</Option>";
	}
	else{
		$SelectionPhylum = $SelectionPhylum."<option value='$xmlPhylumPhylum'>$xmlPhylumPhylum</Option>";
	}

}

if (isset($_SESSION["secure"]["LoginUserName"]) or isset($Class)) {
echo <<<Out

<div id="box1">
<h1> Class Record</h1>
</br></br>
<form action="wsaddclass.php" method="post" onsubmit="return CF()" >
<input type="hidden" name="OldClass" Value="$Class"/>
<table>
<tr><td>Class:</td><td> <input type="text" name="Class" id="Class" value="$Class" /></td></tr>
<tr><td>Phylum:</td><td> <select name="Phylum">$SelectionPhylum</select></td></tr>
<tr><td>Subphylum:</td><td> <input type="text" name="Subphylum" value="$Subphylum"/></td></tr>
<tr><td>ClassCustom1:</td><td> <input type="text" name="ClassCustom1" value="$ClassCustom1"/></td></tr>
<tr><td>ClassCustom2:</td><td> <input type="text" name="ClassCustom2" value="$ClassCustom2"/> </td></tr>

</table>
</Br>
$Buttons

</form>
</div>
<script type="text/javascript" src="Web.js"></script>
<script type="text/javascript">
function CF(){
if (!CKNotEmpty("Class")){
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