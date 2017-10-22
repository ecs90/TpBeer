<?php

abstract class MultiSingleton
{
	private static $instancias = array();

	/****/
	private function __construct()
	{
	}

	public static function getInstancia()
	{
		$class = get_called_class();

		if (!isset(self::$instancias[$class])) {
			self::$instancias[$class] = new $class();
		}
		
		return self::$instancias[$class];
	}		
}

abstract class Singleton
{
	private static $instancia = null;

	/****/
	private function __construct()
	{
	}

	public static function getInstancia()
	{
		$class = get_called_class();

		if (self::$instancia == null) {
			self::$instancia = new $class();
		}
		return self::$instancia;
	}
}

class Ejemplo extends MultiSingleton
{
	protected $nombre;

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
} 

class OtroEjemplo extends MultiSingleton
{
	protected $apellido;

	public function getApellido(){
		return $this->apellido;
	}

	public function setApellido($apellido){
		$this->apellido = $apellido;
	}	
}



$singleton1 = Ejemplo::getInstancia();
$singleton2 = OtroEjemplo::getInstancia();


$singleton3 = Ejemplo::getInstancia();

$singleton1->setNombre('Gatin durmiendo');
$singleton2->setApellido('algun apellido'); // Gatin durmiendo
$singleton3->setNombre('Mimicha durmiendo');

echo $singleton1->getNombre();
echo ' - ' ;
echo $singleton2->getApellido(); // Gatin durmiendo