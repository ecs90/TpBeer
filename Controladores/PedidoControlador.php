<?php namespace Controladores;

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
    private $datoLineaPedido;

    public function __construct()
    {
        $this->datoPedido = BDPedido::getInstance();
        $this->datoLineaPedido = BDLineaPedido::getInstance();
    }

    public function alta(){
        require_once('Vistas/Administrador.php');
        require_once 'Vistas/AltaLineaPedido.php';
        //require_once 'Vistas/ListarLineaPedido.php';
    }

    public function finalizar($monto_final, $fecha_entrega, $tipo_entrega, $horario){

        $fecha_pedido = date('Y-m-d');

        $pedido = new Modelos\Pedido();
        
        $pedido->setFechaPedido($fecha_pedido);
        $pedido->setFechaEntrega($fecha_entrega);
        $pedido->setEstado(Modelos\Pedido::ESTADO_PENDIENTE);
        $pedido->setHorario($horario);
        $pedido->setTipoEntrega($tipo_entrega);
        $pedido->setSucursal(null);
        $pedido->setMontoFinal($monto_final);

        $id_pedido = BDPedido::getInstance()->agregar($pedido);

        foreach($this->getCarrito() as $lineaPedido) {
            $lineaPedido->setIdPedido($id_pedido);
            BDLineaPedido::getInstance()->agregar($lineaPedido);
        }

        $this->vaciarCarrito();

        header("Location: ../pedido/ticket/" . $id_pedido); 
    }

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
        require_once('Vistas/Administrador.php');
        require_once('Vistas/ListarLineaPedido.php');    
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

    protected function vaciarCarrito(){
        $_SESSION['CARRITO'] = array();
    }
}
