<?php

class clients{

	public function methode(){

		$datas = App::getDb()->query('SELECT * FROM client');

		// return $datas;

	}


}