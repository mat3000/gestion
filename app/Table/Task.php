<?php

namespace Table;

class Task extends Table{

	public function getAllByClientId($id){

		return self::query("SELECT * FROM task WHERE client_id=? AND trash=0", [$id]);

	}

	public function getTaskById($id){

		return self::query("SELECT * FROM task WHERE id=?", [$id], true);

	}

	public function addTask($id){

		return self::exec('INSERT INTO task(client_id, description) VALUES(?,?)', [$id,'Nouvelle tâche...']);

	}

	public function updateTask($id, $name, $val){

		$name = addslashes($name);
		return self::exec("UPDATE task SET $name = ? WHERE id = ?", [$val, $id]);

	}

// magic methode
	/*public function getUserByTaskId($id){

		return self::query("SELECT * FROM task WHERE id=?", [$id], true);

	} */

}