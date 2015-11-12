<?php

class Clients{

	public function get_all_client(){

		$datas = App::getDb()->query('SELECT * FROM client', '\Table\Task');
		
		return $datas;

	}


}