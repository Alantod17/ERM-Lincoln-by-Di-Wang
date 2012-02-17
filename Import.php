<?php

/**
 *Import interface for import from biota
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
$hg->openBody("Import");
$hg->openContent();
/** * Code that we write should go after here */


$TableList="";
$TableListarray = LogicManager::TableList();
foreach ($TableListarray as $table) {
	$TableName = $table->getTableName();
	$TableList = "<option value='$TableName'>$TableName</option>".$TableList;
}



if (isset($_SESSION["secure"]["LoginUserName"])) {
echo <<<OutLogin
<h1>Import Data from Biota</h1><br/>
Please Export date information from biota by ASIN date formate<br/><br/>
<form enctype="multipart/form-data" action="wsimportbiota.php" method="post">
File From Biota: <input name="biotafile" type="file" /> <br />
Import into table: <select name="table">$TableList</select><br/><br/>
<input type="submit" value="Upload Biota File" /><br />


OutLogin;
}
else{
echo <<<OutUnLog
<h1>Import is for Authorised Person Only</h1><br/><br/>

<a href="Login.php">Please Login Here</a>

OutUnLog;
}

/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>