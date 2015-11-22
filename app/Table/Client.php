<?php

namespace Table;

class Client extends Table{

	public function getAllClient(){

		return self::query("SELECT * FROM client WHERE trash=0");

	}

	public function getClientById($id){

		return self::query("SELECT * FROM client WHERE id=?", [$id], true);

	}

	// magic methode
	public function getTasks(){

		// return self::query("SELECT * FROM task WHERE client_id=? AND trash=0", [$this->id]);
		$task = new Task();
		return $task->getAllByClientId($this->id);

	}

	public function addClient(){

		return self::exec('INSERT INTO client(label) VALUES(?)', ['Nouveau client...']);

	}

	public function updateClient($id, $name, $val){

		$name = addslashes($name);
		return self::exec("UPDATE client SET $name = ? WHERE id = ?", [$val, $id]);

	}

}