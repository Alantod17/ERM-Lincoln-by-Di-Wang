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
$hg->openBody("Home");
$hg->openContent();
/** * Code that we write should go after here */

$SpecimenNO = isset($_GET["SpecimenNO"])?$_GET["SpecimenNO"]:NULL;



if ($SpecimenNO!=NULL) {
echo <<<Out

    <div id="box1">
    <h1>Upload Picture for Specimen</h1>

    <form method="post" action="UploadPictureProcess.php" enctype="multipart/form-data">
    <input type="hidden" name="SpecimenNO" value='$SpecimenNO'>
    Picture1: <input name="SpecimenPic1" type="file"   /> <br />
    Picture2: <input name="SpecimenPic2" type="file"   /> <br />
    Picture3: <input name="SpecimenPic3" type="file"   /> <br />
    Picture4: <input name="SpecimenPic4" type="file"   /> <br />
    Picture5: <input name="SpecimenPic5" type="file"   /> <br />
    <input type="submit" value="Upload Picture" /><br />



    </form>
    </div>


Out;
}
else{
	echo "<h2 style='colour:red'>SpecimenNO not defined</h2>";
}




/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>