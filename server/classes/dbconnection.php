<?php

class DbConnection{
	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $dbName = "funconnect";
	public $connection;
	
	public function __construct(){
	
		try {
			$dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
			$pdo = new PDO($dsn, $this->username, $this->password);
			return  $this->connection = $pdo;
		} catch (PDOException $ex) {
			echo 'Error!, Connection to database failed: '.$ex->getMessage();
		}
		
	}
}

?>