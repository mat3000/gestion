<?php

namespace Table;

class Task extends Table{

	public function getAllByClientId($id){

		return self::query("SELECT * FROM task WHERE client_id=? AND trash=0", array($id));

	}

	public function getTaskById($id){

		return self::query("SELECT * FROM task WHERE id=?", array($id), true);

	}

	public function addTask($id){

		return self::exec('INSERT INTO task(client_id, description) VALUES(?,?)', array($id,'Nouvelle tâche...'));

	}

	public function updateTask($id, $name, $val){

		$name = addslashes($name);
		return self::exec("UPDATE task SET $name = ? WHERE id = ?", array($val, $id));

	}

// magic methode
	/*public function getUserByTaskId($id){

		return self::query("SELECT * FROM task WHERE id=?", [$id], true);

	} */

}