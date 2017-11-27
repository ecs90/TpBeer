<?php

namespace Controladores;

use Controladores;

class AdministradorControlador
{
    
    public function menu(){
        require_once 'Vistas/Administrador.php';
    }


    ///////////CERVEZAS////////////////

    public function listarCerveza()
    {
        $datos = new Controladores\CervezaControlador();
        require_once('Vistas/Administrador.php');
        require_once('Vistas/AdministradorListarCervezas.php');    
    }

    public function altaCerveza()
    {
        $datos = new Controladores\EnvaseControlador();
        $envases = $datos->getListaEnvases();
        require_once 'Vistas/Administrador.php';
        require_once 'Vistas/AdministradorAltaCerveza.php';  
    }

    public function modificarCerveza($idCerveza)
    {
        $datos = new Controladores\CervezaControlador();
        $cerveza = $datos->buscarCerveza($idCerveza);
        $datosEnvases = new Controladores\EnvaseControlador();
        $envases = $datosEnvases->getListaEnvases();
        require_once('Vistas/Administrador.php');
        require_once 'Vistas/AdministradorModificarCervezas.php';  
    }

    public function botonLitrosFechas(){
        require_once 'Vistas/Administrador.php';
        require_once 'Vistas/AdministradorAltaFechas.php';
    }

    public function cervezasXlitro($fecha, $fechados){
        $datos = new Controladores\CervezaControlador();
        $arreglo = $datos->litros($fecha, $fechados);
        $cervezas = array();
        $cervezas = $arreglo[0];
        $litros = array();
        $litros = $arreglo[1];
        require_once 'Vistas/Administrador.php';
        require_once 'Vistas/AdministradorListarLitrosEntreFechas.php';

    }

    ///////////ENVASES////////////////

    public function listarEnvases()
    {
        $datos = new Controladores\EnvaseControlador();
        require_once('Vistas/Administrador.php');
        require_once('Vistas/AdministradorListarEnvases.php');    
    }

    public function altaEnvase()
    {
        require_once 'Vistas/Administrador.php';
        require_once 'Vistas/AdministradorAltaEnvase.php';  
    }

    public function modificarEnvase($idEnvase)
    {
        $datos = new Controladores\EnvaseControlador();
        $envase = $datos->buscarEnvase($idEnvase);
        require_once('Vistas/Administrador.php');
        require_once 'Vistas/AdministradorModificarEnvases.php';  
    }

    ///////////SUCURSALES////////////////

    public function listarSucursales()
    {
        $datos = new Controladores\SucursalControlador();
        require_once('Vistas/Administrador.php');
        require_once('Vistas/AdministradorListarSucursales.php');    
    }

    public function altaSucursal()
    {
        require_once 'Vistas/Administrador.php';
        require_once 'Vistas/AdministradorAltaSucursal.php';  
    }

    public function modificarSucursal($idSucursal)
    {
        $datos = new Controladores\SucursalControlador();
        $sucursal = $datos->buscarSucursal($idSucursal);
        require_once('Vistas/Administrador.php');
        require_once 'Vistas/AdministradorModificarSucursales.php';  
    }

    ///////////USUARIOS////////////////

    public function listarUsuarios()
    {
        $datos = new Controladores\UsuarioControlador();
        require_once('Vistas/Administrador.php');
        require_once('Vistas/AdministradorListarUsuarios.php');    
    }

    public function altaUsuario()
    {
        require_once 'Vistas/Administrador.php';
        require_once 'Vistas/AdministradorAltaUsuario.php';  
    }

    public function modificarUsuario($idUsuario)
    {
        $datos = new Controladores\UsuarioControlador();
        $usuarioM = $datos->buscarUsuario($idUsuario);
        require_once('Vistas/Administrador.php');
        require_once 'Vistas/AdministradorModificarUsuarios.php';  
    }

    ///////////USUARIOS////////////////

    public function listarPedidos()
    {
        $datosSucursal = new Controladores\SucursalControlador();
        $sucursales = $datosSucursal->getListaSucursales();
        require_once('Vistas/Administrador.php');
        require_once 'Vistas/AdministradorPedido.php';
    }
}

?>