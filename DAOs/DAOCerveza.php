<?php

namespace DAOs;

use Config\Singleton;

class DAOCerveza extends Singleton implements IDAO 
{
    public function agregar($cerveza){
        session_start();

        if (!isset($_SESSION['CERVEZA'])) {
            $_SESSION['CERVEZA'] = array();
        }
        $lista = $_SESSION['CERVEZA'];

        $cerveza->setId(count($lista)+1);

        array_push($lista, $cerveza);

        $_SESSION['CERVEZA'] = $lista;

        //$_SESSION['CERVEZA'][] = $cerveza;

    }

    public function getLista()
    {
        session_start();
        if (!isset($_SESSION['CERVEZA'])) {
            echo 'vacio';
        }
        return $_SESSION['CERVEZA'];
    }

    
    public function eliminar($id){
        session_start();

        if (isset($_SESSION['CERVEZA'])) {
            $listaCerveza = $_SESSION['CERVEZA'];

            foreach ($listaCerveza as $i => $cerveza) {
                if ($listaCerveza[$i]->getId() == $id){
                    unset($listaCerveza[$i]);
                }
            }
            
            $_SESSION['CERVEZA'] = $listaCerveza;    
        }
    }

    public function buscar($id){
        session_start();
        if (isset($_SESSION['CERVEZA'])) {
            $listaCerveza = $_SESSION['CERVEZA'];
            $i=0;
            for($i=0; $i<count($listaCerveza); $i++){
                if ($listaCerveza[$i]->getId() == $id){
                    return $listaCerveza[$i]; 
                }
            }
        }
        return null;
    }

    public function modificar($id, $parametros)
    {
        session_start();
        if (isset($_SESSION['CERVEZA'])) {
            $listaCerveza = $_SESSION['CERVEZA'];
            $i=0;
            for($i=0; $i<count($listaCerveza); $i++){
                if ($listaCerveza[$i]->getId() == $id){
                    $cerveza = $listaCerveza[$i];

                    $cerveza->setNombre($parametros['nombre']);
                    $cerveza->setDescripcion($parametros['descripcion']);
                    $cerveza->setPrecio($parametros['precio']);
                    $cerveza->setStock($parametros['stockLitros']);
                    
                    

                    $_SESSION['CERVEZA'][$i] = $cerveza;
                    
                    return true;
                }
            }
        }
        return false;
    }
   
}