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

$Userarray = LogicManager::getWebUsers();

echo "<div id='box1'>";
echo "<h1>Web Users</h1>";
echo "<table id='tableboarder'>";
echo "<tr><td>Detail</td><td>UserName</td><td>Password</td><td>SecureLevel</td><td>Person</td></tr>";
foreach ($Userarray as $User) {
	$UserName = $User->getUserName();
	$UserPassword = $User->getPassword();
	$UserSecureLevel = $User->getSecureLevel();
	$Person = $User->getPerson();
	$FM = "<form method='post' action='inputWebUser.php'><input type='submit' value='View' />
           <input type='hidden' name='UserName' value='$UserName'/>
           <input type='hidden' name='UserPassword' value='$UserPassword'/>
           <input type='hidden' name='UserSecureLevel' value='$UserSecureLevel'/>
           <input type='hidden' name='Person' value='$Person'/></form>";
	echo"<tr><td>$FM</td><td>$UserName</td><td>******</td><td>$UserSecureLevel</td><td>$Person</td></tr>";

}


echo "</table>";
echo "</div>";
/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>