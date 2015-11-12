<?php

class Task{

	public function get_task($id){

		$datas = App::getDb()->prepare('SELECT * FROM task WHERE id=?', [$id], false, true);
		// $datas = App::getDb()->query('SELECT * FROM task WHERE id=1', false, true);
		
		return $datas;

	}


}