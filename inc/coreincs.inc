<?php
/*=-----------------------------------------------------------=
 * coreincs.inc
 *=-----------------------------------------------------------=
 *
 * This file includes for us all the libraries and classes
 * and other supplmental code we will use in our web
 * application.
 *
 * This file includes the htmlgen.inc file, but if you are
 * creating a page that does not actually present any UI,
 * you can simply ignore it.
 */
require_once('session.inc');
$parts = explode('.', PHP_VERSION);

$PHP_MAJOR = $parts[0];
$PHP_MINOR = $parts[1];

date_default_timezone_set('Pacific/Auckland');




/*
 * Includes for this web application.
 */


require_once('datamanager.inc');
require_once('logicmanager.inc');
require_once('dbmanager.inc');
require_once('Alldataclasses.inc');

/*
 * Standard includes
 */

//// sets up session with some security

//
///**
// * If you don't actually generate any UI in your page, then
// * just don't instantiate the HtmlGenerator class ....
// */
require_once('htmlgen.inc');
?>
