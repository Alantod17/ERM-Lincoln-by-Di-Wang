<?php
/**
 *=-----------------------------------------------------------=
 * session.inc
 *=-----------------------------------------------------------=
 *
 * This file will contain the core session handling code that
 * we will use in our web application. We will add a 'created'
 * variable to the session data to verify that we were the ones
 * who created this session (this helps avoid session fixation attacks).
 */


/**
 *=-----------------------------------------------------------=
 * nuke_session
 *=-----------------------------------------------------------=
 * This function completely destroys a session and all of its
 * data after we have logged a user out of our system.  In
 * addition to destroying the session data, we destroy the session
 * cookie and also make sure that $_SESSION is unset.
 */
function nuke_session()
{
	session_destroy();
	setcookie(session_name(), '', time() - 3600);
	$_SESSION[] = array();
}

/**
 * One of these sessions can last 60 minutes
 */
ini_set('session.gc_maxlifetime', 3600);
session_start();


/**
 * Try to prevent session fixation by ensuring that we created
 * the session id.
 */
if (!isset($_SESSION['created']))
{
	session_regenerate_id();
	$_SESSION['created'] = TRUE;
}


?>
