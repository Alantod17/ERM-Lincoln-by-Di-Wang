<?php

//require('nusoap/lib/nusoap.php');
require("inc/coreincs.inc");

/**
 *
 *
 * @version $Id$
 * @copyright 2011
 */

//header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//header("Pragma: public");
//header("Content-type: text/xml; charset=UTF-8");




$method = isset($_GET["method"])?$_GET["method"]:"Searching";
$table = isset($_GET["table"])?$_GET["table"]:"Any";
$key = isset($_GET["txtkey"])?$_GET["txtkey"]:"";
//var_dump($method);

header("Content-disposition: attachment; filename=Result.xml");
$res = LogicManager::xmlOutput($method,$table,$key);
echo $res->asXML();


//
//$res = LogicManager::xmlOutput("oo");
//var_dump($res);





?>