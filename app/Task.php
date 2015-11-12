<?php

class Task{

	public function get_all_task($id){

		// $datas = App::getDb()->prepare('SELECT * FROM task WHERE id=?', [$id], false, true);
		
		// return $datas;

	}

	public function get_task($id){

		$datas = App::getDb()->prepare('SELECT * FROM task WHERE id=?', [$id], false, true);
		
		return $datas;

	}


}