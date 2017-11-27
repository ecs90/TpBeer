<?php 
	namespace Controladores; 

	use DAOs\BDUsuario;

	class LoginControlador{

		public function index(){
			require_once "Vistas/Login.php";
		}

		public function procesarLogin($usuario, $contrasenia){
			$modelo = BDUsuario::getInstance();
			$usuario = $modelo->getUsuarioPorUsername($usuario);
			
			try{
				if (is_null($usuario)) {
					throw new \Exception('El usuario no existe');
				}else {
					$this->setUsuarioEnSession($usuario);
				}
			} catch (\Exception $exception) {
            	echo '<script> alert("'.$exception->getMessage().'"); </script>';
            	require_once "Vistas/Login.php";
        	}

        	try{
				if ($usuario->getContrasenia() !== $contrasenia) {
					throw new \Exception('Contrasenia incorrecta');
				}else {
					if ($usuario->getAdmin() == 1) {
						header("Location: ../administrador/menu");
						return;
					} else {
						header("Location: ../cliente/menu");
						return;
					}
				}
			} catch (\Exception $exception) {
            	echo '<script> alert("'.$exception->getMessage().'"); </script>';
            	require_once "Vistas/Login.php";
        	}


			////ESTO YA SE PUEDE BORRAR!!!!!!!!!!!!!

			/*if ($usuario->getContrasenia() !== $contrasenia) {
				$this->setUsuarioEnSession("error");
				header("Location: ../Login/index");
				return;
			}

			
			if ($usuario->getAdmin() == 1) {
				header("Location: ../administrador/menu");
				return;
			} else {
				header("Location: ../cliente/menu");
				return;
			}	*/					
		}

		protected function setUsuarioEnSession($usuario) {
			$_SESSION['USUARIO-LOGUEADO'] = $usuario;
		}

		public static function getUsuarioLogueado() {
			if (isset($_SESSION['USUARIO-LOGUEADO'])) {
				$usuario = $_SESSION['USUARIO-LOGUEADO'];
				return $usuario;
			} else {
				return null;
			}
		}

	}



?>