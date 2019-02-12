<?php

namespace core;

abstract class Database {

	static private $instance;

	/**
	 * Crée une connexion a un base de donnée.
	 *
	 * @param string $hostname
	 * @param string $dbname
	 * @param string $username
	 * @param string $password
	 * @param array|null $option
	 * @return void
	 */
	static public function connect(string $hostname, string $dbname=null, string $username=null, string $password=null, ?array $option=[]){
		$dsn = 'mysql:host='.$hostname.';dbname='.$dbname;
		
		$db = new \PDO($dsn, $username, $password, $option);
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
		$db->exec("set names utf8");
		
		self::$instance = $db;
	}
	
	/**
	 * Retourne l'instance PDO connecté de la base de donnée.
	 *
	 * @return \PDO
	 */
	static public function getInstance() : \PDO {
		if (\is_null(self::$instance))
			throw(new \Exception("La base de données n'est pas initialisé"));
		else
			return self::$instance;
	}
	
	/**
	 * Exécute une requête SQL et retourne un PDOStatement 
	 *
	 * @param string $statement
	 * @param integer|null $opt1
	 * @param mixed|null $opt2
	 * @param array|null $opt3
	 * @return \PDOStatement
	 */
	static public function query(string $statement, ?int $opt1, $opt2, ?array $opt3) : \PDOStatement {
		if (\is_null(self::$instance))
			throw(new \Exception("La base de données n'est pas initialisé"));
		else
			return self::$instance->query($statement, $opt1, $opt2, $opt3);
	}
	
	/**
	 * Prépare une requête à l'exécution et retourne un PDOStatement
	 *
	 * @param string $statement
	 * @param array|null $options
	 * @return \PDOStatement
	 */
	static public function prepare(string $statement, ?array $options=array()) : \PDOStatement {
		if (\is_null(self::$instance))
			throw(new \Exception("La base de données n'est pas initialisé"));
		else
			return self::$instance->prepare($statement, $options);
	}

	/**
	 * Convertie une value d'une base de données pour PHP
	 *
	 * @param mixed $var
	 * @param string $type
	 * @return mixed
	 */
	static public function convertireVersPHP($var, string $type) {
		switch ($type) {
			case 'boolean':
				return $var == 1;
			
			default:
				return $var;
		}
	}

	/**
	 * Convertie une value de PHP pour une basse de données
	 *
	 * @param mixed $var
	 * @param string $type
	 * @return mixed
	 */
	static public function convertireVersDB($var, string $type) {
		switch ($type) {
			case 'boolean':
				return $var ? 1 : 0;
			
			default:
				return $var;
		}
	}
}