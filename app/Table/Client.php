<?php

namespace Table;

class Client extends Table{

	public function getAllClient(){

		return self::query("SELECT * FROM client");

	}

	public function getClientById($id){

		return self::query("SELECT * FROM client WHERE id=?", [$id], true);

	}

	// magic methode
	public function getTasks(){

		return self::query("SELECT * FROM task WHERE client_id=?", [$this->id]);

	}

}