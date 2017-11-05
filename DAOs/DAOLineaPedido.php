<?php namespace DAOs;

use Config\Singleton;

class DAOLineaPedido extends Singleton implements IDAO {

	public function agregar($lineaPedido){
		//session_start();

		if (!isset($_SESSION['LINEAPEDIDO'])) {
            $_SESSION['LINEAPEDIDO'] = array();
        }
        $lista = $_SESSION['LINEAPEDIDO'];


        //FIJATE EZE SI CAMBIAMOS ACA, ESTO ES LO QUE HICE YO
        //PARA QUE NO SE REPITAN LOS IDS
        //ANDA PERO NO LO REVISE PARA OPTIMIZARLO
        //PUEDE ESTAR BASTANTE CHANCHO

        //$linParametro = $lista[count($lista)];
        //$parametro = $linParametro->getId;
        //$lineaPedido->setId(($parametro)+1);

        //SERIA SACAR ESA LINEA DE ABAJO Y HABILITAR ESTO

        $lineaPedido->setId(count($lista)+1);

        array_push($lista, $lineaPedido);

        $_SESSION['LINEAPEDIDO'] = $lista;
	}

	public function getLista()
    {
       // session_start();
        if (!isset($_SESSION['LINEAPEDIDO'])) {
            echo 'vacio';
        }
        return $_SESSION['LINEAPEDIDO'];
    }

    public function eliminar($id){
      //  session_start();

        if (isset($_SESSION['LINEAPEDIDO'])) {
            $listaLinea = $_SESSION['LINEAPEDIDO'];

            foreach ($listaLinea as $i => $lineaPedido) {
                if ($listaLinea[$i]->getId() == $id){
                    unset($listaLinea[$i]);
                }
            }
            
            $_SESSION['LINEAPEDIDO'] = $listaLinea;    
        }
    }

    public function buscar($id){
      //  session_start();
        if (isset($_SESSION['LINEAPEDIDO'])) {
            $listaLinea = $_SESSION['LINEAPEDIDO'];
            $i=0;
            for($i=0; $i<count($listaLinea); $i++){
                if ($listaLinea[$i]->getId() == $id){
                    return $listaLinea[$i]; 
                }
            }
        }
        return null;
    }

    public function modificar($id, $parametros)
    {
        //session_start();
        if (isset($_SESSION['LINEAPEDIDO'])) {
            $listaLinea = $_SESSION['LINEAPEDIDO'];
            $i=0;
            for($i=0; $i<count($listaLinea); $i++){
                if ($listaLinea[$i]->getId() == $id){
                    $lineaPedido = $listaLinea[$i];

                    $lineaPedido->setCerveza($parametros['cerveza']);
                    $lineaPedido->setEnvase($parametros['envase']);
                    $lineaPedido->setCantidad($parametros['cantidad']);
                    $lineaPedido->setPrecio($parametros['precio']);
                    
                    

                    $_SESSION['LINEAPEDIDO'][$i] = $lineaPedido;
                    
                    return true;
                }
            }
        }
        return false;
    }
}
?>