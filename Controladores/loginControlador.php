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

			if (is_null($usuario)) {
				// no existe la usuario
			}

			if ($usuario->getContrasenia() !== $contrasenia) {
				// error de contraseña
			}

			$this->setUsuarioEnSession($usuario);

			if ($usuario->getAdmin() == 1) {
				// cosas de adlin
			} else {
				// cosas de usuario normal
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