<?php

namespace Config;

/**
 *
 */
class Request
{
	private $controlador;
	private $metodo;
	private $parametros;

	public function __construct()
	{
		// En el archivo htaccess se define una regla de reescritura
        // para poder tomar la url para todo metodo de petición.
		$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);		

		// Convierto la url en un array tomando como separador la "/".
		$partes = explode("/", $url);

		// Filtro el arreglo para eliminar datos vacios en caso de haberlos.
		$partes = array_filter($partes);

		// Defino un controlador por defecto en el caso
		// de que el arreglo llegue vacío
        // Si el arreglo tiene datos, tomo como controlador el primer elemento.
		if (empty($partes)) {
            $this->controlador = 'login';
        } else {
            $this->controlador = ucwords(array_shift($partes));
        }

        // Defino un método por defecto en el caso de que el arreglo llegue vacío
        // Si el arreglo tiene datos, tomo como método el primero elemento.
        if (empty($partes)) {
            $this->metodo = 'index';
        } else {
            $this->metodo = strtolower(array_shift($partes));
        }

        //ESTO LO TENGO QUE CAMBIAR!!!!!!!!!!!!!!!!!!!!!!!
        // Capturo el metodo de petición y lo guardo en una variable
		if ($this->getMetodoRequest() == 'GET') {   
			if (!empty($partes)) {
				$this->parametros = $partes;
			}
		} else {
			$this->parametros = $_POST;
		}
	}

	// D evuelve el método HTTP con el que se hizo el Request
	protected function getMetodoRequest()
	{
		return $_SERVER['REQUEST_METHOD'];
	}

	public function getControlador()
	{
		return $this->controlador;
	}

	public function getMetodo()
	{
		return $this->metodo;
	}

	public function getParametros()
	{
		return $this->parametros;
	}
}