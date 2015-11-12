<?php

class Clients{

	public function get_all_client(){

		$datas = App::getDb()->query('SELECT * FROM client', '\Table\Task');
		
		return $datas;

	}

	public function get_client($id){

		$datas = App::getDb()->prepare('SELECT * FROM client WHERE id=?', [$id], false, true);
		
		return $datas;

	}


}