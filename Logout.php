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

$username = isset($_SESSION["secure"]["LoginUserName"])?$_SESSION["secure"]["LoginUserName"]:NULL;

$message="See You Next Time $username";

unset($_SESSION["secure"]["LoginUserName"]);
unset($_SESSION["secure"]["LoginUserLevel"]);
unset($_SESSION["secure"]["LoginUserPerson"]);
echo <<<Out

<div id="box1">
<h1>$message</h1></br></br>


<h2>Please Login Here</h2></br>
<form method="post" action="LoginProcess.php">
<table>
<tr><td>User Name:</td><td> <input type="text" name="UserName"/></td></tr>
<tr><td>Password:</td><td><input type="password" name="Password"/></td></tr>
</table>
<input type="submit" name="submit" value="Login"/>
<input type="reset" name="reset" value="reset" />

</form>
</div>




Out;

header("Location: index.php");
/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>