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

    public function darDeAlta($volumen, $factor, $descripcion)
    {
        $envase = new Modelos\Envase();
        $envase->setVolumen($volumen);
        $envase->setFactor($factor);
        $envase->setDescripcion($descripcion);
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
        $this->datoEnvase->modificar($idEnvase, $parametros);    
        header("Location: /TpBeer/administrador/listarEnvases");
    }

    public function baja($id)
    {   
        $this->datoEnvase->eliminar($id);
        header("Location: /TpBeer/administrador/listarEnvases");   
    }
}
?>