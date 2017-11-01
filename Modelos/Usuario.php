<?php namespace Modelos;

class Usuario{
	private $nombre;
	private $apellido;
	private $domicilio;
	private $telefono;
	private $email;
	private $username;
	private $contrasenia;
	private $id;
	private $admin;


	/*public function __construct($nombre, $apellido, $domicilio, $telefono, $email, $username, $contrasenia){
		$this->nombre= $nombre;
		$this->apellido= $apellido;
		$this->domicilio= $domicilio;
		$this->telefono= $telefono;
		$this->email= $email;
		$this->username= $username;
		$this->contrasenia= $contrasenia;
	}*/

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

	public function setUsername($username){
		$this->username= $username;
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

	public function getUsername(){
		return $this->username;
	}

	public function getContrasenia(){
		return $this->contrasenia;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setAdmin($admin){
        $this->admin = $admin;
    }

    public function getAdmin(){
        return $this->admin;
    }
}
?>