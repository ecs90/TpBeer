<?php namespace Modelos;

	class Cerveza{
		
		private $nombre;
		private $descripcion;
		private $imagen;
		private $precio;
		private $stock;
		private $id;

		public function __construct($nombre="", $descripcion="", $precio="", $stock="", $imagen=""){
			$this->nombre = $nombre;
			$this->descripcion = $descripcion;
			$this->precio = $precio;
			$this->stock = $stock;
			$this->imagen = $imagen;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}

		public function getDescripcion(){
			return $this->descripcion;
		}

		public function setImagen ($imagen){
			$this->imagen = $imagen;
		}

		public function getImagen(){
			return $this->imagen;
		}

		public function setPrecio ($precio){
			$this->precio = $precio;
		}

		public function getPrecio(){
			return $this->precio;
		}

		public function setStock ($stock){
			$this->stock = $stock;
		}
		
		public function getStock(){
			return $this->stock;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getId(){
			return $this->id;
		}
	}
?>