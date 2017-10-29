<?php namespace Config;

class Connection{
	
    public function connect(){
        $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
        return new \PDO($dsn, DB_USER, DB_PASS);
	}
}
