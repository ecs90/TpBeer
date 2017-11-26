<?php namespace Controladores;

use Config\Request;
use Modelos;
use DAOs\DAOUsuario;
use DAOs\BDUsuario;
use Vistas;
use Controladores\LoginControlador;

class UsuarioControlador {

    private $datoUsuario;

    public function __construct()
    {
        //$this->datoUsuario = DAOUsuario::getInstance();
        $this->datoUsuario = BDUsuario::getInstance();
    }

    public function darDeAlta($nombre, $apellido, $domicilio, $telefono, $email, $username, $contrasenia)
    {
        $usuario = new Modelos\Usuario();

        $usuario->setNombre($nombre);
        $usuario->setApellido($apellido);
        $usuario->setDomicilio($domicilio);
        $usuario->setTelefono($telefono);
        $usuario->setEmail($email);
        $usuario->setUsername($username);
        $usuario->setContrasenia($contrasenia);

        
        $this->datoUsuario->agregar($usuario);

        $dato = new LoginControlador();
        $usuario = $dato->getUsuarioLogueado();

        if ($usuario != null && $usuario->getAdmin() == 1) {
                header("Location: /TpBeer/administrador/altaUsuario");
            } else {
                header("Location: /TpBeer/login/index");
            }
    }

    public function getListaUsuarios()
    {
        return $this->datoUsuario->getLista();
    }

    public function buscarUsuario($idUsuario)
    {
        return $this->datoUsuario->buscar($idUsuario);;
    }

    public function guardarCambios($idUsuario, $parametros)
    {
        $request = new Request();
        $parametros = $request->getParametros();   
        $idUsuario = $parametros['id'];
        $this->datoUsuario->modificar($idUsuario, $parametros);    
        header("Location: /TpBeer/administrador/listarUsuarios");
    }

    public function baja($id)
    {   
        $this->datoUsuario->eliminar($id);
        header("Location: /TpBeer/administrador/listarUsuarios");    
    }

    public function logOut(){
        unset($_SESSION['USUARIO-LOGUEADO']);
        unset($_SESSION['PEDIDO']);
        header("Location: ../Login/index");
    }
}
?>