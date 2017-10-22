<?php

namespace Controladores;

use Config\Request;
use Modelos;
use DAOs\DAOCerveza;
use Vistas;

class CervezaControlador
{
	public function alta()
	{
		require_once 'Vistas/AltaCerveza.php';	
	}

    // Aca entra cuando le hacen el submit
    // al formulario de alta.
    public function darDeAlta()
    {
        // Obtengo los valores 
        $request = new Request();
        $parametros = $request->getParametros();

        // Aca creo el modelo y le seteo los params
        $cerveza = new Modelos\Cerveza();

        // Seteo el nombre
        $nombre = $parametros['nombre'];
        $cerveza->setNombre($nombre);

        $descripcion = $parametros['descripcion'];
        $cerveza->setDescripcion($descripcion);

        $imagen = $parametros['imagen'];
        //$imagen->setImagen($imagen);

        $precio = $parametros['precio'];
        //$precio->setPrecio($precio);

        //$stock = $parametros['stock'];
        //$stock->setStock($stock);

        //$cerveza
        DAOCerveza::getInstance()->agregar($cerveza);

        //header al formulario de agregar
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

    public function baja(){
        require_once 'Vistas/EliminarCerveza.php';  
    }

	public function darDeBaja($id){
        $request = new Request();
        $parametros = $request->getParametros();

        $idBuscado = $parametros['id'];


        DAOCerveza::getInstance()->eliminar($idBuscado);

        //header al formulario de agregar
        header("Location: ../cerveza/baja");

	}

    public function consulta(){
        require_once 'Vistas/ConsultarCerveza.php';  
    }


    public function hacerConsulta($id){
        $request = new Request();
        $parametros = $request->getParametros();

        $idBuscado = $parametros['id'];

        DAOCerveza::getInstance()->buscar($idBuscado);
        
        header("Location: ../cerveza/consulta");

    }

    public function listar()
    {
        require_once('Vistas/ListarCervezas.php');    
    }

    public function getListaCervezas()
    {
        return DAOCerveza::getInstance()->getLista();
    }

    public function bla()
    {
        return 'blaaaa';
    }


	

}