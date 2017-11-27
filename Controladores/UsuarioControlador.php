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

    public function darDeAlta($nombre, $apellido, $domicilio, $telefono, $email, $username, $contrasenia1, $contrasenia2)
    {
        $dato = new LoginControlador();
        $usuarioLogueado = $dato->getUsuarioLogueado();

        try {

            if ($this->datoUsuario->getUsuarioPorUsername($username) !== null) {
                throw new \Exception('El usuario '.$username.' ya existe');
            }
            if ($contrasenia1 !== $contrasenia2) {
                throw new \Exception('Las contrasenas no son iguales');            
            }    

            $usuario = new Modelos\Usuario();

            $usuario->setNombre($nombre);
            $usuario->setApellido($apellido);
            $usuario->setDomicilio($domicilio);
            $usuario->setTelefono($telefono);
            $usuario->setEmail($email);
            $usuario->setUsername($username);
            $usuario->setContrasenia($contrasenia1);

            $this->datoUsuario->agregar($usuario);

            if ($usuario != null && $usuario->getAdmin() == 1) {
                header("Location: ../administrador/altaUsuario");
            } else {
                header("Location: ../login/index");
            }

        } catch (\Exception $exception) {
            echo '<script> alert("'.$exception->getMessage().'"); </script>';
            if ($usuarioLogueado != null && $usuarioLogueado->getAdmin() == 1) {
                require_once 'Vistas/Administrador.php';
                require_once 'Vistas/AdministradorAltaUsuario.php';
            } else {
                require_once "Vistas/Login.php";
            }
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