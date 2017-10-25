<?php namespace Modelos;

class Usuario{
	protected $nombre;
	protected $apellido;
	protected $domicilio;
	protected $telefono;
	protected $email;
	protected $usuario;
	protected $contrasenia;

	public function __construct($nombre, $apellido, $domicilio, $telefono, $email, $usuario, $contrasenia){
		$this->nombre= $nombre;
		$this->apellido= $apellido;
		$this->domicilio= $domicilio;
		$this->telefono= $telefono;
		$this->email= $email;
		$this->usuario= $usuario;
		$this->contrasenia= $contrasenia;
	}

	public function setNombre($nombre){
		$this->nombre= $nombre;
	}

	public function setApellido($apellido){
		$this->apellido= $apellido;
	}

	public function setDomicilio($domicilio){
		$this->domicilio= $domicilio;
	}

	public function setTelefono($telefono){
		$this->telefono= $telefono;
	}

	public function setEmail($email){
		$this->email= $email;
	}

	public function setUsuario($usuario){
		$this->usuario= $usuario;
	}

	public function setContrasenia($contrasenia){
		$this->contrasenia= $contrasenia;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function getApellido(){
		return $this->apellido;
	}

	public function getDomicilio(){
		return $this->domicilio;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function getContrasenia(){
		return $this->contrasenia;
	}

	public function getTelefono(){
		return $this->telefono;
	}

}
?>