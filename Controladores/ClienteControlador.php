<?php

namespace Controladores;
use Modelos;
use Controladores;

class ClienteControlador
{
    public function menu(){
        $pedido = new Modelos\Pedido();
        $cliente = $_SESSION['USUARIO-LOGUEADO'];
        $pedido->setUsuario($cliente);
        $_SESSION['PEDIDO'] = $pedido;
        require_once 'Vistas/Cliente.php';
    }

    public function listarCerveza(){
        $datos = new Controladores\CervezaControlador();
        require_once('Vistas/Cliente.php');
        require_once('Vistas/ClienteListarCervezas.php');    
    }

    public function mostrarCarrito(){
    	$pedido = $_SESSION['PEDIDO'];
    	$lineas = $pedido->getLineaPedido();
        $cliente = $_SESSION['USUARIO-LOGUEADO'];
        $datosSucursal = new Controladores\SucursalControlador();
        $sucursales = $datosSucursal->getListaSucursales();
    	require_once('Vistas/Cliente.php');
        require_once('Vistas/ClienteCarrito.php'); 
    }

    public function listarPedidos(){
        $datosSucursal = new Controladores\SucursalControlador();
        $datosPedido = new Controladores\PedidoControlador();
        $listaPedidos = $datosPedido->listarPedidos(); 
        require_once('Vistas/Cliente.php');
        require_once('Vistas/ClienteListarPedidos.php');     
    }
}

?>