<?php 

namespace Controladores;

use Config\Request;
use Modelos;
use Controladores;
use DAOs\BDCerveza;
use DAOs\BDEnvase;
use DAOs\BDLineaPedido;
use DAOs\BDPedido;
use DAOs\DAOLineaPedido;
use DAOs\DAOCerveza;
use DAOs\DAOEnvase;
use Vistas;

class PedidoControlador {

    private $datoPedido;

    public function __construct()
    {
        $this->datoPedido = BDPedido::getInstance();
    }

    public function agregarLinea($cerveza, $envase, $precio, $cantidad){
        $pedido = $_SESSION['PEDIDO'];
        $linea = new Modelos\LineaPedido();
        $datosCerveza = new Controladores\CervezaControlador();
        $datosEnvase = new Controladores\EnvaseControlador();
        $linea->setCerveza($datosCerveza->buscarCerveza($cerveza));
        $linea->setEnvase($datosEnvase->buscarEnvase($envase));
        $linea->setPrecio($precio*$cantidad);
        $linea->setCantidad($cantidad);
        $pedido->setLineaPedido($linea);
        $montoParcial = 0;
        foreach ($pedido->getLineaPedido() as $lineaP) {
            $montoParcial = $montoParcial + $lineaP->getPrecio();
        }
        $pedido->setMontoFinal($montoParcial);
        header("Location: /TpBeer/cliente/listarCerveza" . $id_pedido);
    }

    public function finalizarPedido($fecha_entrega, $tipo_entrega, $id_sucursal, $horario){

        $fecha_pedido = date('Y-m-d');

        $pedido = $_SESSION['PEDIDO'];
        $pedido->setFechaEntrega($fecha_entrega);
        $pedido->setEstado(Modelos\Pedido::ESTADO_SOLICITADO);
        $pedido->setHorario($horario);
        $pedido->setTipoEntrega($tipo_entrega);
        $pedido->setSucursal($id_sucursal);

        $this->datoPedido->agregar($pedido);

        $this->vaciarCarrito();

        header("Location: /TpBeer/cliente/menu"); 
    }

    protected function vaciarCarrito(){
        $pedido = new Modelos\Pedido();
        $cliente = $_SESSION['USUARIO-LOGUEADO'];
        $pedido->setUsuario($cliente);
        $_SESSION['PEDIDO'] = $pedido;
    }

    /*
    public function ticket($id_pedido) {
        $GLOBALS['pedido'] = $this->datoPedido->buscar($id_pedido);
        $GLOBALS['lineasPedido'] = $this->datoLineaPedido->getListaPorPedido($id_pedido);
        require_once('Vistas/MostrarTicket.php');
    }

    public function darDeAlta($id_cerveza, $id_envase, $cantidad)
    {        
        $lineaPedido = new Modelos\LineaPedido();

        $cerveza = BDCerveza::getInstance()->buscar($id_cerveza);
        $envase = BDEnvase::getInstance()->buscar($id_envase);

        $lineaPedido->setCerveza($cerveza);
        $lineaPedido->setEnvase($envase);
        $lineaPedido->setCantidad($cantidad);
        $lineaPedido->calcularPrecio();

        $this->agregarAlCarrito($lineaPedido);

        header("Location: ../pedido/alta");
    }


    public function listar()
    {
        $pedidos = $this->datoPedido->getLista();
        require_once('Vistas/Cliente.php');
        require_once('Vistas/ListarPedido.php');    
    }

    public function getListaLineaPedido(){
        return $this->datoPedido->getLista();
    }

    public function getListaEnvases()
    {
        $envase = new EnvaseControlador();
        return $envase->getListaEnvases();
    }

    public function getListaCervezas()
    {
        $cerveza = new CervezaControlador();
        return $cerveza->getListaCervezas();
    }

    public function modificar($idLinea)
    {
        $lineaPedido = $this->datoPedido->buscar($idLinea);
        $GLOBALS['lineaPedido'] = $lineaPedido;
        require_once 'Vistas/ModificarLinea.php';  
    }

    public function guardarCambios($idLinea, $parametros)
    {
        $request = new Request();
        $parametros = $request->getParametros();   
        $idLinea = $parametros['id'];
        $this->datoLinea->modificar($idLinea, $parametros);    
        header("Location: ../Pedido/listar");
    }

    public function baja($id)
    {   
        $this->datoLinea->eliminar($id);
        header("Location: ../../Pedido/listar");    
    }

    protected function agregarAlCarrito($lineaPedido){
        if (!isset($_SESSION['CARRITO'])) {
            $_SESSION['CARRITO'] = array();
        }
        array_push($_SESSION['CARRITO'], $lineaPedido);
    }

    public function getCarrito(){
        if (isset($_SESSION['CARRITO'])) {
            return $_SESSION['CARRITO'];
        }
        return null;
    }

    */
}
