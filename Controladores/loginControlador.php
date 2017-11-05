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
			
			$this->setUsuarioEnSession($usuario);
			
			if (is_null($usuario)) {
				$this->setUsuarioEnSession("error");
				header("Location: ../Login/index");
				return;
			}

			if ($usuario->getContrasenia() !== $contrasenia) {
				$this->setUsuarioEnSession("error");
				header("Location: ../Login/index");
				return;
			}

			
			if ($usuario->getAdmin() == 1) {
				header("Location: /TpBeer/Vistas/Administrador.php");
				return;
			} else {
				echo "Usuario";
				return;
			}						
		}

		protected function setUsuarioEnSession($usuario) {
			$_SESSION['USUARIO-LOGUEADO'] = $usuario;
		}

		public static function getUsuarioLogueado() {
			if (isset($_SESSION['USUARIO-LOGUEADO'])) {
				return isset($_SESSION['USUARIO-LOGUEADO']);
			} else {
				return null;
			}
		}

	}



?>