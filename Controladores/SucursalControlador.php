<?php namespace Controladores;

use Config\Request;
use Modelos;
use DAOs\DAOSucursal;
use DAOs\BDSucursal;
use Vistas;

class SucursalControlador 
{

    private $datoSucursal;

    public function __construct()
    {
        //$this->datoSucursal = DAOSucursal::getInstance();
        $this->datoSucursal = BDSucursal::getInstance();
    }

    public function alta(){
        require_once 'Vistas/AltaSucursal.php';
    }

    public function darDeAlta($direccion, $numero)
    {
        $sucursal = new Modelos\Sucursal();

        $sucursal->setDireccion($direccion);
        $sucursal->setNumero($numero);
        
        $this->datoSucursal->agregar($sucursal);
        header("Location: ../sucursal/alta");
    }

     public function listar()
    {
        require_once('Vistas/ListarSucursales.php');    
    }

    public function getListaSucursales()
    {
        return $this->datoSucursal->getLista();
    }

    public function modificar($idSucursal)
    {
        $sucursal = $this->datoSucursal->buscar($idSucursal);
        $GLOBALS['sucursal'] = $sucursal;
        require_once 'Vistas/ModificarSucursales.php';  
    }

    public function guardarCambios($idSucursal, $parametros)
    {
        $request = new Request();
        $parametros = $request->getParametros();   
        $idSucursal = $parametros['id'];
        $this->datoSucursal->modificar($idSucursal, $parametros);    
        header("Location: ../sucursal/listar");
    }

    public function baja($id)
    {   
        $this->datoSucursal->eliminar($id);
        header("Location: ../../sucursal/listar");    
    }
}
?>