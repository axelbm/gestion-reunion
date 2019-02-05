<?php

namespace core;

abstract class Database {

	static private $instance;


	static public function connect(string $hostname, string $dbname=null, string $username=null, string $password=null, string $option=null){
		$dsn = 'mysql:host='.$hostname.';dbname='.$dbname;
		
		$db = new \PDO($dsn, $username, $password, $option);
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
		$db->exec("set names utf8");
		
		self::$instance = $db;
	}
	
	static public function getInstance() : \PDO {
		if (\is_null(self::$instance))
			throw(new \Exception("La base de données n'est pas initialisé"));
		else
			return self::$instance;
	}
	
	static public function query(string $statement, ?int $opt1, $opt2, ?array $opt3) : \PDOStatement {
		if (\is_null(self::$instance))
			throw(new \Exception("La base de données n'est pas initialisé"));
		else
			return self::$instance->query($statement, $opt1, $opt2, $opt3);
	}
	
	static public function prepare(string $statement, ?array $options=array()) : \PDOStatement {
		if (\is_null(self::$instance))
			throw(new \Exception("La base de données n'est pas initialisé"));
		else
			return self::$instance->prepare($statement, $options);
	}

	/**
	 * Convertie une value d'une base de données pour PHP
	 *
	 * @param midex $var
	 * @param string $type
	 * @return void
	 */
	static public function convertireVersPHP($var, string $type) {
		switch ($type) {
			case 'boolean':
				return $var == 1;
				break;
			
			default:
				return $var;
				break;
		}
	}

	/**
	 * Convertie une value de PHP pour une basse de données
	 *
	 * @param midex $var
	 * @param string $type
	 * @return void
	 */
	static public function convertireVersDB($var, string $type) {
		switch ($type) {
			case 'boolean':
				return $var ? 1 : 0;
				break;
			
			default:
				return $var;
				break;
		}
	}
}