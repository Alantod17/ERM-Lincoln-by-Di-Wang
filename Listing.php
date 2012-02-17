<?php

/**
 *Listing and searching list page
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


$count = 1;
$TableList="";
$TableTable="";

$TableListarray = LogicManager::TableList();
foreach ($TableListarray as $table) {
	$TableName = $table->getTableName();
	if ($TableName=="Specimen") {
		$TableList = $TableList."<option value='$TableName' selected='selected'>$TableName</option>";
	}
	else{
		$TableList = $TableList."<option value='$TableName'>$TableName</option>";
	}

}

foreach ($TableListarray as $tables ) {
	global $count;
	$TablesName = $tables->getTableName();
	if ($count==1) {
		$TableTable=$TableTable."<tr><td><a href='output.php?method=Listing&table=$TablesName'>$TablesName</a></td>";
		$count = $count+1;
	}
	elseif ($count==5) {
		$TableTable=$TableTable."<td><a href='output.php?method=Listing&table=$TablesName'>$TablesName</a></td></tr>";
		$count = $count-4;
	}
	else {
		$TableTable=$TableTable."<td><a href='output.php?method=Listing&table=$TablesName'>$TablesName</a></td>";
		$count = $count+1;
	}

}


echo <<<Out

<div id="box1">
<h1>Searching in Specified Table</h1><br/>

<form action="output.php" method="get">

Search for: <input type="text" name="txtkey"/>
in table <select name="table">$TableList</select>
<input type="submit" name="submit" value="Search" />

</form>

</div>



<br/><br/><br/><br/><br/>




<div id="box1">
<h1>Listing Records in Table</h1><br/><br/>
<table  width= 100% boarder = 0>$TableTable</table>
</div>

Out;


/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>