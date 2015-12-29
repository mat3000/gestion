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

	protected static function exec($statement, $attributes){

		return App::getDb()->exec($statement, $attributes);

	}

// magic methode
	/*public function generateTask($id){

		return '<li class="client" id="client-X" data-client-id="X">
				    <span class="label" data-client-id="X">Nouveau client...</span>
				    <ul class="taches">
				        <li class="new-task" data-client-id="X">+ Ajouter un tâche...</li>
				    </ul>
				</li>';
	}*/

}