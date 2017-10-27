<?php namespace Config;

class Connection{
	public function Connect(){
		return new DAOs\PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASS);
	}
}
?>