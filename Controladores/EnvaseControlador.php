<?php namespace Controladores;

use Config\Request;
use Modelos;
use DAOs\DAOEnvase;
use Vistas;

class EnvaseControlador {

    private $datoEnvase;

    public function __construct()
    {
        $this->datoEnvase = DAOEnvase::getInstance();
        //aca en lugar del dao tengo q poner lo de la base de datos
        //y es lo que tengo que comentar
    }

    public function alta(){
        require_once 'Vistas/AltaEnvase.php';
    }

    public function darDeAlta($volumen, $factor, $descripcion)
    {
        $envase = new Modelos\Envase();
        $envase->setVolumen($volumen);
        $envase->setFactor($factor);
        $envase->setDescripcion($descripcion);
    
        $this->datoEnvase->agregar($envase);
        header("Location: ../envase/alta");
    }



    //este es el que tenia hecho eze
    /*public function altaEnvase(){
        $request = new Request();
        $parametros = $request->getParametros();


        $volumen = $parametros['volumen'];
        $precio = $parametros['precio'];
        $stock = $parametros['stockLitros'];
        $descripcion = $parametros['descripcion'];
        $imagen = $parametros['imagen'];


        $envase = new Modelos\Envase($volumen, $precio, $imagen, $descripcion, $stock);

        echo 'Volumen = '.$envase->getVolumen().', Precio = '.$envase->getPrecio().', Stock = '.$envase->getStock().', Descripcion = '.$envase->getDescripcion().', Imagen = '.$envase->getImagen();
    }*/

    public function listar()
    {
        require_once('Vistas/ListarEnvases.php');    
    }

    public function getListaEnvases()
    {
        return $this->datoEnvase->getLista();
    }

    public function modificar($idEnvase)
    {
        $envase = $this->datoEnvase->buscar($idEnvase);
        $GLOBALS['envase'] = $envase;
        require_once 'Vistas/ModificarEnvases.php';  
    }

    public function guardarCambios($idEnvase, $parametros)
    {
        $request = new Request();
        $parametros = $request->getParametros();   
        $idEnvase = $parametros['id'];
        $this->datoEnvase->modificar($idEnvase, $parametros);    
        header("Location: ../envase/listar");
    }

    public function baja($id)
    {   
        $this->datoEnvase->eliminar($id);
        header("Location: ../../envase/listar");    
    }
}
?>