<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */
require_once("inc/coreincs.inc");

$method = isset($_GET["method"])?$_GET["method"]:"Searching";
$table = isset($_GET["table"])?$_GET["table"]:"Any";
$key = isset($_GET["txtkey"])?$_GET["txtkey"]:"";



$xml = LogicManager::xmlOutput($method,$table,$key);


echo "<h1>Result of filtering</h1>";
echo "<a href='wsoutput.php?method=$method&table=$table&txtkey=$key'>Export as XML</a>";



$xmltablenameRef="";
$xmlcount = 0;
foreach ($xml as $xmltable) {
	$xmlcount = $xmlcount+1;
	$xmltablename = $xmltable->getName();
	if ($xmlcount==1) {
		if ($xmltablename != $xmltablenameRef) {
			echo "</br></br><h2>Table: $xmltablename</h2>";
			$xmltablenameRef = $xmltablename;
			echo "<div id='boxout'>";
			echo "<table id='tableboarder'>";
			$xmlfiledtitles = "";
			$xmlfiledrecords = "";
			$link ="";
			foreach ($xmltable as $xmlfiled) {
				$xmlfiledtitle = $xmlfiled->getName();
				$xmlfiledtitles = $xmlfiledtitles."<th>$xmlfiledtitle</th>";
				$xmlfiledrecords = $xmlfiledrecords."<td>$xmlfiled</td>";
				$link = $link."<input type='hidden' name='$xmlfiledtitle' value='$xmlfiled'/>";
			}
			$linkform = "<form method='post' action='input$xmltablename.php'><input type='submit' value='View' />$link</form>";
			echo "<tr><td>Detail </td>$xmlfiledtitles</tr>";
			echo "<tr><td>$linkform</td>$xmlfiledrecords</tr>";
		}
		else{
			$xmlfiledrecords = "";
			foreach ($xmltable as $xmlfiled) {
				$xmlfiledtitle = $xmlfiled->getName();
				$xmlfiledrecords = $xmlfiledrecords."<td>$xmlfiled</td>";
				$link = $link."<input type='hidden' name='$xmlfiledtitle' value='$xmlfiled'/>";
			}
			$linkform = "<form method='post' action='input$xmltablename.php'><input type='submit' value='View' />$link</form>";
			echo "<tr><td>$linkform</td>$xmlfiledrecords</tr>";
		}
	}
	else{
		if ($xmltablename != $xmltablenameRef) {
			echo"</table>";
			echo "</div>";
			echo "<h2>Table: $xmltablename</h2>";
			$xmltablenameRef = $xmltablename;
			echo "<div id='boxout'>";
			echo "<table id='tableboarder'>";
			$xmlfiledtitles = "";
			$xmlfiledrecords = "";
			foreach ($xmltable as $xmlfiled) {
				$xmlfiledtitle = $xmlfiled->getName();
				$xmlfiledtitles = $xmlfiledtitles."<th>$xmlfiledtitle</th>";
				$xmlfiledrecords = $xmlfiledrecords."<td>$xmlfiled</td>";
				$link = $link."<input type='hidden' name='$xmlfiledtitle' value='$xmlfiled'/>";
			}
			$linkform = "<form method='post' action='input$xmltablename.php'><input type='submit' value='View' />$link</form>";
			echo "<tr><td>Detail </td>$xmlfiledtitles</tr>";
			echo "<tr><td>$linkform</td>$xmlfiledrecords</tr>";
		}
		else{
			$xmlfiledrecords = "";
			foreach ($xmltable as $xmlfiled) {
				$xmlfiledtitle = $xmlfiled->getName();
				$xmlfiledrecords = $xmlfiledrecords."<td>$xmlfiled</td>";
				$link = $link."<input type='hidden' name='$xmlfiledtitle' value='$xmlfiled'/>";
			}
			$linkform = "<form method='post' action='input$xmltablename.php'><input type='submit' value='View' />$link</form>";
			echo "<tr><td>$linkform</td>$xmlfiledrecords</tr>";
		}
	}

}

echo"</table></div>";

if ($xmlcount==0) {
	echo "<h2>     Sorry no records found";
}


?>