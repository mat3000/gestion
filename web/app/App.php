<?php

class App{

	// const DB_HOST = 'localhost';
	// const DB_NAME = 'gestion';
	// const DB_USER = 'root';
	// const DB_PASS = 'root';

	const DB_HOST = 'matdevpro.mysql.db';
	const DB_NAME = 'matdevpro';
	const DB_USER = 'matdevpro';
	const DB_PASS = 'nDjx0sfK';

	private static $database;


	public static function getDb(){

		if(self::$database===null){

			self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);

		}

		return self::$database;

	}

}