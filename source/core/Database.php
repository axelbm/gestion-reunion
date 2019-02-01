<?php

namespace core;

class Database {

	static private $instance;


	static public function connect(string $hostname, string $dbname=null, string $username=null, string $password=null, string $option=null){
		$dsn = 'mysql:host='.$hostname.';dbname='.$dbname;
		
		$db = new \PDO($dsn, $username, $password, $option);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$db->exec("set names utf8");
		
		self::$instance = $db;
	}
	
	static public function getInstance() : \PDO {
		if (\is_null($instance))
			throw(new \Exception("La base de données n'est pas initialisé"));
		else
			return self::$instance;
	}
}