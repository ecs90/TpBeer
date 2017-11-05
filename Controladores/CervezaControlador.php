<?php

namespace Controladores;

use Config\Request;
use Modelos;
use DAOs\DAOCerveza;
use DAOs\BDCerveza;
use Vistas;

class CervezaControlador
{
    private $datoCerveza;

    public function __construct()
    {
        //$this->datoCerveza = DAOCerveza::getInstance();

        //aca en lugar del dao tengo q poner lo de la base de datos
        //y es lo que tengo que comentar
        $this->datoCerveza = BDCerveza::getInstance();

    }

	public function alta()
	{
        require_once('Vistas/Administrador.php');
		require_once 'Vistas/AltaCerveza.php';	
	}

    public function darDeAlta($nombre, $descripcion, $precio,$imagen)
    {
        $cerveza = new Modelos\Cerveza();
        $cerveza->setNombre($nombre);
        $cerveza->setDescripcion($descripcion);
        $cerveza->setPrecio($precio);
        //$cerveza->setStock($stock);
        $cerveza->setImagen($imagen);
        $this->datoCerveza->agregar($cerveza);
        header("Location: ../cerveza/alta");
    }

    ///////////////////VERSION 2

    /*public function altaCerveza(){
        $request = new Request();
        $parametros = $request->getParametros();


        $nombre = $parametros['nombre'];
        $tipo = $parametros['tipo'];
        $precio = $parametros['precio'];
        $stock = $parametros['stockLitros'];
        $descripcion = $parametros['descripcion'];
        $imagen = $parametros['imagen'];


        $cerveza = new Modelos\Cerveza($nombre, $tipo, $precio, $stock, $descripcion, $imagen);

        print_r($cerveza);
    }*/

    public function baja($id)
    {   
        $this->datoCerveza->eliminar($id);
        header("Location: /TpBeer/cerveza/listar");
    }

    public function listar()
    {
        require_once('Vistas/Administrador.php');
        require_once('Vistas/ListarCervezas.php');    
    }

    public function getListaCervezas()
    {
        return $this->datoCerveza->getLista();
    }

    public function modificar($idCerveza)
    {
        $cerveza = $this->datoCerveza->buscar($idCerveza);
        $GLOBALS['cerveza'] = $cerveza;
        require_once('Vistas/Administrador.php');
        require_once 'Vistas/ModificarCervezas.php';  
    }

    public function guardarCambios($idCerveza, $parametros)
    {
        $request = new Request();
        $parametros = $request->getParametros();   
        $idCerveza = $parametros['id'];
        $this->datoCerveza->modificar($idCerveza, $parametros);    
        header("Location: ../cerveza/listar");
    }
}
