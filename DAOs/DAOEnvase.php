<?php

namespace DAOs;

use Config\Singleton;

class DAOEnvase extends Singleton
{
    public function agregar($envase){
        session_start();

        if (!isset($_SESSION['ENVASE'])) {
            $_SESSION['ENVASE'] = array();
        }
        $lista = $_SESSION['ENVASE'];

        $envParametro = $lista[count($lista)];
        $parametro = $envParametro->getId;
        $envase->setId(($parametro)+1);

        array_push($lista, $envase);

        $_SESSION['ENVASE'] = $lista;

    }

    public function getLista()
    {
        session_start();
        if (!isset($_SESSION['ENVASE'])) {
            echo 'vacio';
        }
        return $_SESSION['ENVASE'];
    }

    
    public function eliminar($id){
        session_start();

        if (isset($_SESSION['ENVASE'])) {
            $listaEnvase = $_SESSION['ENVASE'];

            foreach ($listaEnvase as $i => $envase) {
                if ($listaEnvase[$i]->getId() == $id){
                    unset($listaEnvase[$i]);
                }
            }
            
            $_SESSION['ENVASE'] = $listaEnvase;    
        }
    }


    public function buscar($id){
        session_start();
        if (isset($_SESSION['ENVASE'])) {
            $listaEnvase = $_SESSION['ENVASE'];
            $i=0;
            for($i=0; $i<count($listaEnvase); $i++){
                if ($listaEnvase[$i]->getId() == $id){
                    return $listaEnvase[$i]; 
                }
            }
        }
        return null;
    }

    public function modificar($id, $parametros)
    {
        session_start();
        if (isset($_SESSION['ENVASE'])) {
            $listaEnvase = $_SESSION['ENVASE'];
            $i=0;
            for($i=0; $i<count($listaEnvase); $i++){
                if ($listaEnvase[$i]->getId() == $id){
                    $envase = $listaEnvase[$i];

                    $envase->setVolumen($parametros['volumen']);
                    $envase->setFactor($parametros['factor']);
                    $envase->setDescripcion($parametros['descripcion']);
                    
                    
                    $_SESSION['ENVASE'][$i] = $envase;
                    
                    return true;
                }
            }
        }
        return false;
    }
    
}