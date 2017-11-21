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

    public function darDeAlta($direccion, $numero)
    {
        $sucursal = new Modelos\Sucursal();

        $sucursal->setDireccion($direccion);
        $sucursal->setNumero($numero);
        
        $this->datoSucursal->agregar($sucursal);
        header("Location: /TpBeer/administrador/altaSucursal");
    }

    public function getListaSucursales()
    {
        return $this->datoSucursal->getLista();
    }

    public function buscarSucursal($idSucursal)
    {
        return $this->datoSucursal->buscar($idSucursal);
    }

    public function guardarCambios($idSucursal, $parametros)
    {
        $request = new Request();
        $parametros = $request->getParametros();   
        $idSucursal = $parametros['id'];
        $this->datoSucursal->modificar($idSucursal, $parametros);    
        header("Location: /TpBeer/administrador/listarSucursales");
    }

    public function baja($id)
    {   
        $this->datoSucursal->eliminar($id);
        header("Location: /TpBeer/administrador/listarSucursales");   
    }
}
?>