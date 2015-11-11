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
			$pdo = new PDO('mysql:dbname=bolerplate-poo;host=localhost', 'root', 'root');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;
		}

		return $pdo;

	}

	public function query($statement){

		$req = $this->getPDO()->query($statement);

		// $req->setFetchMode(PDO::FETCH_CLASS, '\Table\Article');
		$req->setFetchMode(PDO::FETCH_OBJ);
		// $req->setFetchMode(PDO::FETCH_ASSOC);
		
		$datas = $req->fetchAll();
		// $datas = $res->fetch();

		return $datas;

	}

	public function prepare($statement, $attr){

		$req = $this->getPDO()->prepare($statement);
		$req->execute($attr);

		// $req->setFetchMode(PDO::FETCH_CLASS, '\Table\Article');
		$req->setFetchMode(PDO::FETCH_OBJ);
		// $req->setFetchMode(PDO::FETCH_ASSOC);
		$datas = $req->fetch();
		// $datas = $req->fetchAll();
		return $datas;

	}

}