<?php 

namespace Modelos;

class Sucursal{
    private $direccion;
    private $numero;
    private $id;

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

    public function getDireccionCompleta(){
        $direccionCompleta = $this->direccion . " " . $this->numero;
        return $direccionCompleta;
    }
    
}
?>