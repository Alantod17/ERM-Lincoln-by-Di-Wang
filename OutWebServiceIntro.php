<?php

/**
 *Introduction of ERM
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
$hg->openBody("About");
$hg->openContent();
/** * Code that we write should go after here */

echo <<<OT




<h2>Searching and Listing web Service</h2>
<div id="box1">
<p><font color="forestgreen">Searching and listing can be called as a Get web service, will return a xml as result</font></br></br>
The formate of calling will be like:</br>
output.php?method="Listing/Searching"&table="Specific table searching at"&txtkey="keyword of searching"</br>
<font color="brown">for Listing method "table" is compulsory, for searching method "txtkey" is compulsory.</font></br></br></br></br>


<font color="forestgreen">An example of Listing:</font></br>
output.php?method="Listing"&table="Specimen"</br>
(This will return all Specimen records we hold)</br></br></br>


<font color="forestgreen">Examples of Searching:</font></br>
output.php?method="Searching"&table="Specimen"&txtkey="HoloType"</br>
(This will return all Specimen records related to "HoloType")</br></br>

output.php?method="Searching"&txtkey="HoloType"</br>
(This will return all records related to "HoloType")</td></tr></br>

</div>
OT;

/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>