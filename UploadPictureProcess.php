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

$FilePath = "SpecimenImage/";
$SpecimenNo = isset($_POST["SpecimenNO"])?$_POST["SpecimenNO"]:NULL;


echo "<div id='box1'>";

for ($i=1; $i<=5; $i++)
{
	$inputname = "SpecimenPic"."$i";

	if ($_FILES["$inputname"]["name"]!="") {

	$PictureName =  $_FILES["$inputname"]["name"];
	$SmallPictureName = "s_".$PictureName;


if (($_FILES["$inputname"]["type"] == "image/gif")
	|| ($_FILES["$inputname"]["type"] == "image/jpeg")
	|| ($_FILES["$inputname"]["type"] == "image/pjpeg"))
{
	if ($_FILES["$inputname"]["error"] > 0)
	{
		echo "Return Code: " . $_FILES["$inputname"]["error"] . "<br />";
	}
	else
	{
		echo "Upload: " . $_FILES["$inputname"]["name"] . "<br />";
		echo "Type: " . $_FILES["$inputname"]["type"] . "<br />";
		echo "Size: " . ($_FILES["$inputname"]["size"] / 1024) . " Kb<br />";

		if (file_exists($FilePath . $_FILES["$inputname"]["name"]))
		{
			echo"<p style='color:Red;'>". $_FILES["$inputname"]["name"] . " already exists. </p>";
		}
		else
		{
			move_uploaded_file($_FILES["$inputname"]["tmp_name"],
			$FilePath . $_FILES["$inputname"]["name"]);
			echo "Stored in: " . $FilePath . $_FILES["$inputname"]["name"];
		}
	}
}
else
{
	echo "Invalid file";
}

LogicManager::bigtosmallimg($PictureName,$FilePath);


$addOK = LogicManager::addImageArchive($PictureName,$SmallPictureName ,$FilePath ,$SpecimenNo );

if ($addOK) {
	echo "<p style='color:Green;'></br>Add to database OK</p>";
}else{
	echo "<p style='color:Red;'></br>Add to database Fail</p>";
}

}
}
echo"</div>";





/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>