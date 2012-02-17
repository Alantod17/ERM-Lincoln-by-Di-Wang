<?php

/**
 *Contact info of ERM
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
$hg->openBody("Contact");
$hg->openContent();
/** * Code that we write should go after here */

echo <<<OT
<h2>Contact Us</h2>
<div id="box1">

John Marris</br>
Curator - Entomology Research Museum</br></br>

Burns Building - 5th floor, Room B510A</br>
Extn: 8391</br></br>

Ecology Department - Faculty of Agriculture & Life Sciences</br>
P O Box 84</br>
Lincoln University 7647</br>
Christchurch, New Zealand</br></br>

p +64 3 321 8391 | f +64 3 3253882</br>
Email: john.marris@lincoln.ac.nz</br>
web www.lincoln.ac.nz | web http://ecolincnz.blogspot.com/ (Ecology Department research blog)</br>



</div>
OT;

/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>