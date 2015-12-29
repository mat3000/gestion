<?php

namespace Table;

class User extends Table{

	private $status;

	public function getUsersByTaskId($taskId){

		return self::query("SELECT users.* FROM users INNER JOIN task ON task.assign_to = users.id WHERE task.id=?", [$taskId]);

	}

	public function getAllUsers(){

		return self::query("SELECT * FROM users");

	}

	public function addAllUsers($id){

		return self::exec('INSERT INTO task(client_id, description) VALUES(?,?)', [$id, 'Nouvelle tâche...']);

	}

	/*public function updateTask($id, $name, $val){

		$name = addslashes($name);
		return self::exec("UPDATE task SET $name=? WHERE id=?", [$val, $id]);

	}*/


}