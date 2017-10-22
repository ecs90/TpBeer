<?php namespace Controladoras;

use Config\Request;
use Modelos;

class ControlEnvase{
    public function altaVista(){
        require_once 'Vistas/cargaEnvase.php';
    }

    public function altaEnvase(){
        $request = new Request();
        $parametros = $request->getParametros();


        $volumen = $parametros['volumen'];
        $precio = $parametros['precio'];
        $stock = $parametros['stockLitros'];
        $descripcion = $parametros['descripcion'];
        $imagen = $parametros['imagen'];


        $envase = new Modelos\Envase($volumen, $precio, $imagen, $descripcion, $stock);

        echo 'Volumen = '.$envase->getVolumen().', Precio = '.$envase->getPrecio().', Stock = '.$envase->getStock().', Descripcion = '.$envase->getDescripcion().', Imagen = '.$envase->getImagen();
    }
}
?>