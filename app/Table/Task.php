<?php

namespace Table;

// use \app\App;

class Task{

	public function __get($get){

		$method = 'get' . ucfirst($get);

		$this->$get = $this->$method();

		return $this->$get;

	}

	public function getAllTask(){

		return \App::getDb()->query("SELECT * FROM task WHERE client_id={$this->id}");

	}

}


