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

    public function Alta($nombre, $descripcion, $precio,$imagen)
    {
        $cerveza = new Modelos\Cerveza();
        $cerveza->setNombre($nombre);
        $cerveza->setDescripcion($descripcion);
        $cerveza->setPrecio($precio);
        $cerveza->setImagen($imagen);
        $this->datoCerveza->agregar($cerveza);
        header("Location: ../administrador/altaCerveza");
    }

    public function baja($id)
    {   
        $this->datoCerveza->eliminar($id);
        header("Location: /TpBeer/administrador/listarCerveza");
    }

    public function getListaCervezas()
    {
        return $this->datoCerveza->getLista();
    }

    public function buscarCerveza($idCerveza)
    {
        return $this->datoCerveza->buscar($idCerveza);
    }

    public function guardarCambios($idCerveza, $parametros)
    {
        $request = new Request();
        $parametros = $request->getParametros();   
        $idCerveza = $parametros['id'];
        $this->datoCerveza->modificar($idCerveza, $parametros);    
        header("Location: /TpBeer/administrador/listarCerveza");
    }
}
