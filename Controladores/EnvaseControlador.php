<?php namespace Controladores;

use Config\Request;
use Modelos;
use DAOs\DAOEnvase;
use DAOs\BDEnvase;
use Vistas;

class EnvaseControlador {

    private $datoEnvase;

    public function __construct()
    {
        //$this->datoEnvase = DAOEnvase::getInstance();
        $this->datoEnvase = BDEnvase::getInstance();
    }

    public function MoverImagen(){
        $imageDirectory = 'images/';

        if(!file_exists($imageDirectory)){

            mkdir($imageDirectory);
        }
        

        if($_FILES){
            
            if((isset($_FILES['imagen'])) && ($_FILES['imagen']['name'] != '')){
                
                $file = $imageDirectory . basename($_FILES['imagen']['name']);
                
                if(!file_exists($file)){
                    
                    move_uploaded_file($_FILES["imagen"]["tmp_name"], $file);
                }

                return $file;
            }
        }
    }

    public function darDeAlta($volumen, $factor, $descripcion)
    {
        $envase = new Modelos\Envase();
        $envase->setVolumen($volumen);
        $envase->setFactor($factor);
        $envase->setDescripcion($descripcion);
        $envase->setImagen($this->MoverImagen());
        $this->datoEnvase->agregar($envase);
        header("Location: /TpBeer/administrador/altaEnvase");
    }

    public function getListaEnvases()
    {
        return $this->datoEnvase->getLista();
    }

    public function buscarEnvase($idEnvase)
    {
        return $this->datoEnvase->buscar($idEnvase);
    }

    public function guardarCambios($idEnvase, $parametros)
    {
        $request = new Request();
        $parametros = $request->getParametros();   
        $idEnvase = $parametros['id'];
        $archi = $this->MoverImagen();
        $this->datoEnvase->modificar($idEnvase, $parametros, $archi);    
        header("Location: /TpBeer/administrador/listarEnvases");
    }

    public function baja($id)
    {   
        $this->datoEnvase->eliminar($id);
        header("Location: /TpBeer/administrador/listarEnvases");   
    }
}
?>