<?php

class clients{

	public function methode($param){

		$datas = App::getDb()->query('SELECT * FROM client');

		// return $datas;

	}


}