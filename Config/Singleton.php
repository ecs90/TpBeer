<?php

namespace Config;

class Singleton
{
    protected static $instance = array();

    protected function __construct() {}

    public static function getInstance(){

        $returnvalue = null;

        $class = get_called_class();

        if (!isset(self::$instance[$class])){
            self::$instance[$class] = new $class;
        }

        $returnvalue = self::$instance[$class];
        return $returnvalue;
    }
}