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
$hg->openBody("Login");
$hg->openContent();
/** * Code that we write should go after here */
$message="";

$UserName = (isset($_POST["UserName"]) and $_POST["UserName"]!="")?$_POST["UserName"]:NULL;
$Password = (isset($_POST["Password"]) and $_POST["Password"]!="")?$_POST["Password"]:NULL;


$user=LogicManager::getUser($UserName,$Password);
if ($user!=FALSE) {
	$_SESSION["secure"]["LoginUserName"]=$user->getUserName();
	$_SESSION["secure"]["LoginUserLevel"]=(int)$user->getSecureLevel();
	$_SESSION["secure"]["LoginUserPerson"]=$user->getPerson();
	$_SESSION["LastVisitCollection"]="";

}
else{
	$message="Sorry Invaild Username or Password ";
}


$DueLoansarray = LogicManager::getLoansDueToday();
$DueLoansNum = count($DueLoansarray);


if ($user!=FALSE) {
	header("Location: index.php");
}
else{
echo<<<OT
<h1 style='color:red;'>Sorry Invalid Username or Password</h1></br></br>

<a href='login.php'>Try again here</a></br></br>

<a href='contact.php'>Contact us to get a new account</a></br></br>

</form>

OT;
}





/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>