<?php namespace Modelos;

	class Pedido{
		
		private $id_pedido;
		private $fecha_pedido;
		private $fecha_envio;
		private $estado;
		private $horario;
		private $tipo_entrega;
		private $sucursal;
		private $monto_final;
		private $lineas?;//las cervezas q compra

		public function setId_pedido($id_pedido){
			$this->id_pedido = $id_pedido;
		}

		public function getId_pedido(){
			return $this->id_pedido;
		}

		public function setFecha_pedido($fecha_pedido){
			$this->fecha_pedido = $fecha_pedido;
		}

		public function getFecha_pedido(){
			return $this->fecha_pedido;
		}

		public function setFecha_envio ($fecha_envio){
			$this->fecha_envio = $fecha_envio;
		}

		public function getFecha_envio(){
			return $this->fecha_envio;
		}

		public function setEstado ($estado){
			$this->estado = $estado;
		}

		public function getEstado(){
			return $this->estado;
		}

		public function setHorario ($horario){
			$this->horario = $horario;
		}
		
		public function getHorario(){
			return $this->horario;
		}

		public function setTipo_entrega ($tipo_entrega){
			$this->tipo_entrega = $tipo_entrega;
		}
		
		public function getTipo_entrega(){
			return $this->tipo_entrega;
		}

		public function setSucursal ($sucursal){
			$this->sucursal = $sucursal;
		}
		
		public function getSucursal(){
			return $this->sucursal;
		}

		public function setMonto_final ($monto_final){
			$this->monto_final = $monto_final;
		}
		
		public function getMonto_final(){
			return $this->monto_final;
		}

		//////////////////////FALTA GETTER Y SETTER DE LINEAS
	}
?>