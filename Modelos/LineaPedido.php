<?php namespace Modelos;

use Modelos\Cerveza;
use Modelos\Envase;


class LineaPedido{

	private $id;
	private $cerveza;
	private $envase;
	private $cantidad;
	private $precio;
	private $id_pedido;
	
	public function setId($id){
		$this->id= $id;
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

	public function setPrecio($precio){
		$this->precio = $precio;
	}

	public function setIdPedido($id_pedido){
		$this->id_pedido = $id_pedido;
	}

	public function calcularPrecio(){
		$this->precio = (
			$this->getCerveza()->getPrecio() * $this->getEnvase()->getFactor()
		);
	}

	public function calcularSubtotal()
	{
		return $this->getPrecio() * $this->getCantidad();
	}

	public function getId(){
		return $this->id;
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

	public function getPrecio(){
		return $this->precio;
	}

	public function getIdPedido(){
		return $this->id_pedido;
	}	
}
