<?php namespace Modelos;

class Pedido{

	const ESTADO_PENDIENTE = 0;
	const ESTADO_ENTREGADO = 1;
	
	const HORARIO_MANIANA = 0;
	const HORARIO_TARDE = 1;

	const ENTREGA_SUCURSAL = 0;
	const ENTREGA_DOMICILIO = 1;

	private $id;
	private $fecha_pedido;
	private $fecha_entrega;
	private $estado;
	private $horario;
	private $tipo_entrega;
	private $sucursal;
	private $monto_final;

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setFechaPedido($fecha_pedido){
		$this->fecha_pedido = $fecha_pedido;
	}

	public function getFechaPedido(){
		return $this->fecha_pedido;
	}

	public function setFechaEntrega($fecha_entrega){
		$this->fecha_entrega = $fecha_entrega;
	}

	public function getFechaEntrega(){
		return $this->fecha_entrega;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setHorario($horario){
		$this->horario = $horario;
	}
	
	public function getHorario(){
		return $this->horario;
	}

	public function setTipoEntrega($tipo_entrega){
		$this->tipo_entrega = $tipo_entrega;
	}
	
	public function getTipoEntrega(){
		return $this->tipo_entrega;
	}

	public function setSucursal($sucursal){
		$this->sucursal = $sucursal;
	}
	
	public function getSucursal(){
		return $this->sucursal;
	}

	public function setMontoFinal($monto_final){
		$this->monto_final = $monto_final;
	}
	
	public function getMontoFinal(){
		return $this->monto_final;
	}
}
