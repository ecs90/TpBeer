<?php namespace Controladores;

use Config\Request;
use Modelos;

class RegistroControlador{
    public function altaVista(){
        require_once 'Vistas/Registro.php';
    }

    public function altaRegistro($nombre, $apellido, $domicilio, $telefono, $email, $user, $contra, $contrados){

        if($contra == $contrados){
            $usuario = new Modelos\Usuario($nombre, $apellido, $domicilio, $telefono, $email, $user, $contra);

            echo 'Nombre = '.$usuario->getNombre().', Apellido = '.$usuario->getApellido().', Domicilio = '.$usuario->getDomicilio().', Telefono = '.$usuario->getTelefono().', Email = '.$usuario->getEmail().', Usuario = '.$usuario->getUsuario().', Contasenia = '.$usuario->getContrasenia();
        }else{
            echo 'Contrasenia erronea, asegurese de escribir dos veces la misma para verificar';
            $this->altaVista();
        }

        
    }
}

?>