<?php
class Dbfactory
{
	public static function getMysqlConnexionWithPDO()
	{
		$db = new PDO('mysql:host=localhost;dbname=epharma',
		'root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);
		return $db;
	}
	
	
}

