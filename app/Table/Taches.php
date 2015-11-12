<?php

namespace Table;

// use \app\App;

class Taches{

	public function __get($get){

		$method = 'get' . ucfirst($get);

		$this->$get = $this->$method();

		return $this->$get;

	}

	public function getAllTaches(){

		return \App::getDb()->query("SELECT * FROM tache WHERE client_id={$this->id}");

	}

}


