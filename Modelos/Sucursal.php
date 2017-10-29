<?php namespace Modelos;

class Sucursal{
    private $direccion;
    private $numero;
    private $id;


    //NO SE SI VOY A DEJAR EL CONSTRUCTOR
    /*public function __construct($direccion, $numero){
        $this->direccion= $direccion;
        $this->numero= $numero;
    }*/

    public function setDireccion($direccion){
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

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
}
?>