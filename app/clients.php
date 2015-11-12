<?php

class clients{

	public function get_all_client_tache(){

		$datas = App::getDb()->query('SELECT * FROM client', '\Table\Taches');
		
		return $datas;

	}


}