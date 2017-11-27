<?php

namespace DAOs;

use Config\Singleton;

class DAOUsuario extends Singleton
{
    public function agregar($usuario){
        session_start();

        if (!isset($_SESSION['USUARIO'])) {
            $_SESSION['USUARIO'] = array();
        }
        $lista = $_SESSION['USUARIO'];

        $usuarioParametro = $lista[count($lista)];
        $parametro = $usuarioParametro->getId;
        $usuario->setId(($parametro)+1);

        array_push($lista, $usuario);

        $_SESSION['USUARIO'] = $lista;

    }

    public function getLista()
    {
        session_start();
        if (!isset($_SESSION['USUARIO'])) {
            echo 'vacio';
        }
        return $_SESSION['USUARIO'];
    }

    
    public function eliminar($id){
        session_start();

        if (isset($_SESSION['USUARIO'])) {
            $listaUsuario = $_SESSION['USUARIO'];

            foreach ($listaUsuario as $i => $usuario) {
                if ($listaUsuario[$i]->getId() == $id){
                    unset($listaUsuario[$i]);
                }
            }
            
            $_SESSION['USUARIO'] = $listaUsuario;    
        }
    }

    public function buscar($id){
        session_start();
        if (isset($_SESSION['USUARIO'])) {
            $listaUsuario = $_SESSION['USUARIO'];
            $i=0;
            for($i=0; $i<count($listaUsuario); $i++){
                if ($listaUsuario[$i]->getId() == $id){
                    return $listaUsuario[$i]; 
                }
            }
        }
        return null;
    }

    public function modificar($id, $parametros)
    {
        session_start();
        if (isset($_SESSION['USUARIO'])) {
            $listaUsuario = $_SESSION['USUARIO'];
            $i=0;
            for($i=0; $i<count($listaUsuario); $i++){
                if ($listaUsuario[$i]->getId() == $id){
                    $usuario = $listaUsuario[$i];


                    $usuario->setNombre($parametros['nombre']);
                    $usuario->setApellido($parametros['apellido']);
                    $usuario->setDomicilio($parametros['domicilio']);
                    $usuario->setTelefono($parametros['telefono']);
                    $usuario->setEmail($parametros['email']);
                    $usuario->setContrasenia($parametros['contrasenia']);
                    
                    

                    $_SESSION['USUARIO'][$i] = $usuario;
                    
                    return true;
                }
            }
        }
        return false;
    }
   
}