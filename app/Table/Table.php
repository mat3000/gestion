<?php

namespace Table;

use \App;

class Table{

	public function __get($get){

		$method = 'get' . ucfirst($get);

		$this->$get = $this->$method();

		return $this->$get;

	}

	protected static function query($statement, $attributes=false, $one=false){

		if($attributes){
		
			return App::getDb()->prepare($statement, $attributes, get_called_class(), $one);

		}else{
			
			return App::getDb()->query($statement, get_called_class(), $one);
		
		}

	}

}