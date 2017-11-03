<?php namespace Controladores;

use Config\Request;
use Modelos;
use Controladores;
use DAOs\DAOLineaPedido;
use DAOs\DAOCerveza;
use DAOs\BDCerveza;
use DAOs\DAOEnvase;
use DAOs\BDEnvase;
use Vistas;

class PedidoControlador {

    private $datoPedido;

    public function __construct()
    {
        $this->datoPedido = DAOLineaPedido::getInstance();
        //$this->datoPedido = BDLineaPedido::getInstance();
    }

    public function alta(){
        require_once('Vistas/Administrador.php');
        require_once 'Vistas/AltaLineaPedido.php';
        //require_once 'Vistas/ListarLineaPedido.php';
    }

    public function darDeAlta($idcerveza, $idenvase, $cantidad)
    {
        $cervezas= $this->getListaCervezas();
        $cerveza= $cervezas[$idcerveza];

        $envases= $this->getListaEnvases();
        $envase= $envases[$idenvase];
        $lineaPedido = new Modelos\LineaPedido($cerveza, $envase, $cantidad);
        //var_dump($lineaPedido);
        //$lineaPedido->setPrecio($lineaPedido->getCerveza(), $lineaPedido->getEnvase());
        
        $this->datoPedido->agregar($lineaPedido);
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
}
?>