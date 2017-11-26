<?php namespace Modelos;

class Pedido{

	const ESTADO_SOLICITADO = 0;
	const ESTADO_PROCESO = 1;
	const ESTADO_ENVIADO = 2;
	const ESTADO_FINALIZADO = 3;
	
	const HORARIO_MANIANA = 0;
	const HORARIO_TARDE = 1;

	const ENTREGA_SUCURSAL = 0;
	const ENTREGA_DOMICILIO = 1;

	private $id;
	private $usuario;
	private $fecha_entrega;
	private $estado;
	private $horario;
	private $tipo_entrega;
	private $sucursal;
	private $lineasPedido;
	private $monto_final;

	public function __construct(){
		$this->lineasPedido = array();
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getUsuario(){
		return $this->usuario;
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

	public function setLineaPedido($linea){
		array_push($this->lineasPedido, $linea);
	}

	public function setAllLineaPedido($lineas){
		$this->lineasPedido = $lineas;
	}

	public function getLineaPedido(){
		return $this->lineasPedido;
	}

}
