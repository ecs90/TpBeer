<?php

namespace DAOs;

use Config\Singleton;

class DAOSucursal extends Singleton implements IDAO 
{
    public function agregar($sucursal){
        session_start();

        if (!isset($_SESSION['SUCURSAL'])) {
            $_SESSION['SUCURSAL'] = array();
        }
        $lista = $_SESSION['SUCURSAL'];

        $sucursal->setId(count($lista)+1);

        array_push($lista, $sucursal);

        $_SESSION['SUCURSAL'] = $lista;

    }

    public function getLista()
    {
        session_start();
        if (!isset($_SESSION['SUCURSAL'])) {
            echo 'vacio';
        }
        return $_SESSION['SUCURSAL'];
    }

    public function modificar($id, $parametros)
    {
        session_start();
        if (isset($_SESSION['SUCURSAL'])) {
            $listaSucursal = $_SESSION['SUCURSAL'];
            $i=0;
            for($i=0; $i<count($listaSucursal); $i++){
                if ($listaSucursal[$i]->getId() == $id){
                    $sucursal = $listaSucursal[$i];

                    $sucursal->setDireccion($parametros['direccion']);
                    $sucursal->setNumero($parametros['numero']);
                    
                    $_SESSION['SUCURSAL'][$i] = $sucursal;
                    
                    return true;
                }
            }
        }
        return false;
    }

    
     public function buscar($id){
        session_start();
        if (isset($_SESSION['SUCURSAL'])) {
            $listaSucursal = $_SESSION['SUCURSAL'];
            $i=0;
            for($i=0; $i<count($listaSucursal); $i++){
                if ($listaSucursal[$i]->getId() == $id){
                    return $listaSucursal[$i]; 
                }
            }
        }
        return null;
    }

    public function eliminar($id){
        session_start();

        if (isset($_SESSION['SUCURSAL'])) {
            $listaSucursal = $_SESSION['SUCURSAL'];

            foreach ($listaSucursal as $i => $sucursal) {
                if ($listaSucursal[$i]->getId() == $id){
                    unset($listaSucursal[$i]);
                }
            }
            
            $_SESSION['SUCURSAL'] = $listaSucursal;    
        }
     }

    
    
}