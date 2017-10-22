<?php namespace Controladoras;

use Config\Request;
use Modelos;

class ControlRegistro{
    public function altaVista(){
        require_once 'Vistas/Registro.php';
    }

    public function altaRegistro(){
        $request = new Request();
        $parametros = $request->getParametros();


        $nombre = $parametros['txtNombre'];
        $apellido = $parametros['txtApellido'];
        $domicilio = $parametros['txtDomicilio'];
        $telefono = $parametros['txtTelefono'];
        $email = $parametros['txtEmail'];
        $user= $parametros['txtUsuario'];
        $contra = $parametros['txtPassword'];
        $contrados= $parametros['txtPasswordConfirm'];

        if($contra == $contrados){
            $usuario = new Modelos\Cliente();
            $usuario->setNombre($nombre);
            $usuario->setApellido($apellido);
            $usuario->setDomicilio($domicilio);
            $usuario->setTelefono($telefono);
            $usuario->setEmail($email);
            $usuario->setUsuario($user);
            $usuario->setContrasenia($contra);

            echo 'Nombre = '.$usuario->getNombre().', Apellido = '.$usuario->getApellido().', Domicilio = '.$usuario->getDomicilio().', Telefono = '.$usuario->getTelefono().', Email = '.$usuario->getEmail().', Usuario = '.$usuario->getUsuario().', Contasenia = '.$usuario->getContrasenia();
        }else{
            echo 'la contrasenia creada no fue correctamente creada por duplicado';
            $this->altaVista();
        }

        
    }
}

?>