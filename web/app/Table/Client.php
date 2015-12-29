<?php

namespace Table;

class Client extends Table{

	private $task;

	public function getAllClient(){

		return self::query("SELECT * FROM client WHERE trash=0");

	}

	public function getClientById($id){

		return self::query("SELECT * FROM client WHERE id=?", [$id], true);

	}

	public function addClient(){

		return self::exec('INSERT INTO client(label) VALUES(?)', ['Nouveau client...']);

	}

	public function updateClient($id, $name, $val){

		$name = addslashes($name);
		return self::exec("UPDATE client SET $name = ? WHERE id = ?", [$val, $id]);

	}

	/**
	 * magic method
	 */
	public function getTasks(){

		if($this->task===null) 
			$this->task = new Task();

		return $this->task->generateHTMLTaskList($this->id);

	}
	public function getUrls(){
		
		return json_decode($this->url);

	}

}