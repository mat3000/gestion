<?php

class Database{

	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	private $pdo;

	public function __construct($db_name, $db_user, $db_pass, $db_host){

		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_pass = $db_pass;
		$this->db_host = $db_host;

	}

	private function getPDO(){

		if($this->pdo === null){
			$pdo = new PDO('mysql:dbname='.$this->db_name.';host='.$this->db_host, $this->db_user, $this->db_pass, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
			$this->pdo = $pdo;
		}

		return $this->pdo;

	}

	public function query($statement, $class=false, $one=false){

		$req = $this->getPDO()->query($statement);

		if($class){
			$req->setFetchMode(PDO::FETCH_CLASS, $class);
		}else{
			$req->setFetchMode(PDO::FETCH_OBJ);
			// $req->setFetchMode(PDO::FETCH_ASSOC);
		}
		
		if($one) $datas = $req->fetch();
		else $datas = $req->fetchAll();

		return $datas;

	}

	public function prepare($statement, $attr, $class=false, $one=false){

		$req = $this->getPDO()->prepare($statement);
		$req->execute($attr);

		if($class){
			$req->setFetchMode(PDO::FETCH_CLASS, $class);
		}else{
			$req->setFetchMode(PDO::FETCH_OBJ);
			// $req->setFetchMode(PDO::FETCH_ASSOC);
		}
		
		if($one) $datas = $req->fetch();
		else $datas = $req->fetchAll();

		return $datas;

	}

	public function exec($statement, $attr){

		$req = $this->getPDO()->prepare($statement);
		$req->execute($attr);

		return $this->getPDO()->lastInsertId();

	}

}