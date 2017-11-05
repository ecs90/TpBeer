<?php
	abstract class SingletonAbstractoDAO{
		
		protected static $instance;
		
		public static function getInstance(){
			
			if(!isset(self::$instance)){
				$miclase=__CLASS__;
				self::$instance = new $miclase();
			}
			return self::$instance;
		}
	}

	////////////////////////////////


	class SingletonAbstractoDAO{
		
		static $instance = array();
		
		public static function getInstance(){
			
			$returnvalue = null;
			
			$class = get_called_class();
			
			if(!isset(self::$instance[$class])){
				self::$instance[$class] = new $class;
			}

			$returnvalue = self::$instance[$class];
			return $returnvalue;
			}
		}
	

?>