<?php

namespace Controladores;

use Config\Request;
use Modelos;
use Controladores;
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

    public function Alta($nombre, $descripcion, $precio, $envases, $imagen)
    {
        $this->datoCerveza = BDCerveza::getInstance();
        
        $cerve = $this->datoCerveza->buscarXnombre($nombre);
         
        try{
                if ($cerve->getNombre() == $nombre) {
                    throw new \Exception('Esa cerveza ya existe');
                }else {
                    $cerveza = new Modelos\Cerveza();

                    $cerveza->setNombre($nombre);
                    $cerveza->setDescripcion($descripcion);
                    $cerveza->setPrecio($precio);
                    $cerveza->setImagen($imagen);
                    $envasesC = array();
                    foreach ($envases as $envase) {
                        $datos = new Controladores\EnvaseControlador();
                        $dato = $datos->buscarEnvase($envase);
                        array_push($envasesC, $dato);
                    }
                    $cerveza->setEnvases($envasesC);
                    $this->datoCerveza->agregar($cerveza);
                    header("Location: /TpBeer/administrador/altaCerveza");
                }
            } catch (\Exception $exception) {
                echo '<script> alert("'.$exception->getMessage().'"); </script>';
                require_once "Vistas/Administrador.php";
            }
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
