<?php

namespace Config;

use Controladores;

/**
 *
 */
class Router
{
	public function direccionar(Request $request)
	{
		// Identificamos el controlador.
		$claseControlador = 'Controladores\\'.$request->getControlador().'Controlador';
		$controlador = new $claseControlador();
		
		$metodo = $request->getMetodo();

		$parametros = $request->getParametros();

		if (!empty($parametros)) {
			call_user_func_array(array($controlador, $metodo), $parametros);
		} else {
			call_user_func(array($controlador, $metodo));
		}
	}
}