<?php

/**
 *Input tables list
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


$count = 1;

$TableTable="";

$TableListarray = LogicManager::TableList();


foreach ($TableListarray as $tables ) {
	global $count;
	$TablesName = $tables->getTableName();
	if ($count==1) {
		$TableTable=$TableTable."<tr><td><a href='Input$TablesName.php'>$TablesName</a></td>";
		$count = $count+1;
	}
	elseif ($count==5) {
		$TableTable=$TableTable."<td><a href='Input$TablesName.php'>$TablesName</a></td></tr>";
		$count = $count-4;
	}
	else {
		$TableTable=$TableTable."<td><a href='Input$TablesName.php'>$TablesName</a></td>";
		$count = $count+1;
	}

}

if (isset($_SESSION["secure"]["LoginUserName"])) {
echo <<<OutLogin

<div id="box1">
<h1>Input Record Into Table</h1><br/><br/>
<table  width= 100%>$TableTable</table>
</div>

OutLogin;
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