<?php namespace Modelo;

class Sucursal{
    private $direccion;
    private $numero;

    public function __construct($direcion, $numero){
        $this->direccion= $direccion;
        $this->numero= $numero;
    }

    public function setDirecion($direccion){
        $this->direccion= $direccion;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setNumero($numero){
        $this->numero= $numero;
    }

    public function getNumero(){
        return $this->numero;
    }
}
?>