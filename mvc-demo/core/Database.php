<?php
namespace app\core;

use PDOException;

class Database {

	public $pdo;
	public $dsn = 'mysql:host=localhost;dbname=mvc';
	public $user = 'root';
	public $password = '';

	public function __construct() {

		$this->connection();
	}

	private function connection() {

		try {
			$this->pdo = new \PDO($this->dsn, $this->user, $this->password);
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);	
		
		} catch(PDOException $e) {
			echo "Connection failed: ". $e->getMessage();
		}
	}

	public function prepare($query) {

		return $this->pdo->prepare($query);
	}
}
?>