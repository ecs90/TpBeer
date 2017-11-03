<?php namespace Modelos;

use Modelos\Cerveza;
use Modelos\Envase;

Class LineaPedido{
	private $cerveza;
	private $envase;
	private $cantidad;
	private $precio;
	private $id;

	public function __construct($cerveza, $envase, $cantidad){
			$this->cerveza = $cerveza;
			$this->envase = $envase;
			$this->precio= ($this->cerveza->getPrecio())*($this->envase->getFactor());
			$this->cantidad = $cantidad;
	}

	public function setCerveza($cerveza){
		$this->cerveza = $cerveza;
	}

	public function setEnvase($envase){
		$this->envase = $envase;
	}

	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
	}

	public function setPrecio($cerveza, $envase){
		$this->precio= ($cerveza->getPrecio())*($envase->getFactor());
	}

	public function setId($id){
		$this->id= $id;
	}

	public function getCerveza(){
		return $this->cerveza;
	}

	public function getEnvase(){
		return $this->envase;
	}

	public function getCantidad(){
		return $this->cantidad;
	}

	public function getId(){
		return $this->id;
	}
}
?>