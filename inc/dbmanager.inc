<?php

/**
 * Comp315 2011
 */

require_once("dbconninfo.inc");

class DBManager {

	private static $dbconnection = NULL;

	public static function getDBConnection()
	{

	if (DBManager::$dbconnection==NULL) {
		try
		{
		DBManager::$dbconnection =new PDO('mysql:host='.DB_HOST.';dbname='.DB_DBASE, DB_USER, DB_PASS);
		}
		catch (PDOException $e)
		{
			var_dump($e);
		//	throw new Exception("DB Connection Error");
			return null;
		}
	}
	return DBManager::$dbconnection;
	}

}
?>
