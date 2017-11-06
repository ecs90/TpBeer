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

    public function alta(){
        require_once 'Vistas/AltaUsuario.php';
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
        
        header("Location: ../usuario/alta");
    }


    public function listar()
    {
        require_once('Vistas/ListarUsuarios.php');    
    }

    public function getListaUsuarios()
    {
        return $this->datoUsuario->getLista();
    }

    public function modificar($idUsuario)
    {
        $usuario = $this->datoUsuario->buscar($idUsuario);
        $GLOBALS['usuario'] = $usuario;
        require_once 'Vistas/ModificarUsuarios.php';  
    }

    public function guardarCambios($idUsuario, $parametros)
    {
        $request = new Request();
        $parametros = $request->getParametros();   
        $idUsuario = $parametros['id'];
        $this->datoUsuario->modificar($idUsuario, $parametros);    
        header("Location: ../usuario/listar");
    }

    public function baja($id)
    {   
        $this->datoUsuario->eliminar($id);
        header("Location: ../../usuario/listar");    
    }

    public function menuadmin(){
        require_once 'Vistas/Administrador.php';
    }

    public function menuclient(){
        require_once 'Vistas/Cliente.php';
    }

    public function logOut(){
        unset($_SESSION['USUARIO-LOGUEADO']);
        header("Location: ../Login/index");
    }
}
?>