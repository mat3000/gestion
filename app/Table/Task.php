<?php

namespace Table;

class Task extends Table{

	public function getAllByClientId($id){

		return self::query(
		   "SELECT task.*, client.* 
			FROM task 
			LEFT JOIN client ON client.id=task.client_id 
			WHERE client.id=?"
		, [$id], false);

	}

	public function getTaskById($id){

		return self::query("SELECT * FROM task WHERE id=?", [$id], true);

	}

}