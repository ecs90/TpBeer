<?php
	namespace Config;
	class Autoload{
		public static function start(){
			spl_autoload_register(function($classpath){
				$classfile = ROOT.str_replace('\\', '/', $classpath). '.php';
				require_once($classfile);
			});
		}
	}

?>