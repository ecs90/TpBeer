<?php

namespace DAOs;

use Config\Singleton;
use Config\Connection;

use Modelos;
use Controladores;

class BDPedido extends Singleton 
{
    public function agregar($pedido)
    {
        $query = "
            INSERT INTO pedidos(
                id_usuario,
                fecha_entrega,
                estado,
                horario,
                tipo_entrega,
                id_sucursal,
                monto_final
            )
            VALUES (
                :id_usuario,
                :fecha_entrega,
                :estado,
                :horario,
                :tipo_entrega,
                :id_sucursal,
                :monto_final
            )
        ";


        $connection = new Connection();
        $pdo = $connection->connect();
        
        $command = $pdo->prepare($query);

        $id_usuario = $pedido->getUsuario()->getId();
        $fecha_entrega = $pedido->getFechaEntrega();
        $estado = $pedido->getEstado();
        $horario = $pedido->getHorario();
        $tipo_entrega = $pedido->getTipoEntrega();
        $id_sucursal = $pedido->getSucursal();
        $monto_final = $pedido->getMontoFinal();


        $command->bindParam(':id_usuario', $id_usuario);
        $command->bindParam(':fecha_entrega', $fecha_entrega);
        $command->bindParam(':estado', $estado);
        $command->bindParam(':horario', $horario);
        $command->bindParam(':tipo_entrega', $tipo_entrega);
        $command->bindParam(':id_sucursal', $id_sucursal);
        $command->bindParam(':monto_final', $monto_final);
        
        $command->execute();

        $id_pedido = $pdo->lastInsertId();

        foreach($pedido->getLineaPedido() as $linea) {
            $linea->setIdPedido($id_pedido);
            $this->agregarLinea($linea);
        }
    }

    public function listarPedidos($usuario){

        $datosSucursales = new Controladores\SucursalControlador();

        $query = "SELECT * FROM pedidos WHERE id_usuario = :id_usuario ORDER BY fecha_entrega ASC;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $id_usuario = $usuario->getId();

        $command->bindParam(':id_usuario', $id_usuario);
        $command->execute();

        $lista = array();
        while ($row = $command->fetch()) {
            $pedido = new Modelos\Pedido();

            $pedido->setId($row['id']);
            $pedido->setUsuario($usuario);
            $pedido->setFechaEntrega($row['fecha_entrega']);
            $pedido->setEstado($row['estado']);
            $pedido->setHorario($row['horario']);
            $pedido->setTipoEntrega($row['tipo_entrega']);
            $pedido->setSucursal($datosSucursales->buscarSucursal($row['id_sucursal']));
            $pedido->setMontoFinal($row['monto_final']);
            $pedido->setAllLineaPedido($this->listarLineas($pedido->getId()));

            array_push($lista, $pedido);
        }

        return $lista;
    }

    public function listarPedidoSucursal($id_sucursal){

        $datosSucursales = new Controladores\SucursalControlador();
        $datosUsuarios = new Controladores\UsuarioControlador();

        $query = "SELECT * FROM pedidos WHERE id_sucursal = :id_sucursal ORDER BY fecha_entrega ASC;;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $command->bindParam(':id_sucursal', $id_sucursal);
        $command->execute();

        $lista = array();
        while ($row = $command->fetch()) {
            $pedido = new Modelos\Pedido();

            $pedido->setId($row['id']);
            $pedido->setUsuario($datosUsuarios->buscarUsuario($row['id_usuario']));
            $pedido->setFechaEntrega($row['fecha_entrega']);
            $pedido->setEstado($row['estado']);
            $pedido->setHorario($row['horario']);
            $pedido->setTipoEntrega($row['tipo_entrega']);
            $pedido->setSucursal($datosSucursales->buscarSucursal($row['id_sucursal']));
            $pedido->setMontoFinal($row['monto_final']);
            $pedido->setAllLineaPedido($this->listarLineas($pedido->getId()));

            array_push($lista, $pedido);
        }

        return $lista;
    }

    public function listarPedidoFecha($fecha_entrega){

        $datosSucursales = new Controladores\SucursalControlador();
        $datosUsuarios = new Controladores\UsuarioControlador();

        $query = "SELECT * FROM pedidos WHERE fecha_entrega = :fecha_entrega;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $command->bindParam(':fecha_entrega', $fecha_entrega);
        $command->execute();

        $lista = array();
        while ($row = $command->fetch()) {
            $pedido = new Modelos\Pedido();

            $pedido->setId($row['id']);
            $pedido->setUsuario($datosUsuarios->buscarUsuario($row['id_usuario']));
            $pedido->setFechaEntrega($row['fecha_entrega']);
            $pedido->setEstado($row['estado']);
            $pedido->setHorario($row['horario']);
            $pedido->setTipoEntrega($row['tipo_entrega']);
            $pedido->setSucursal($datosSucursales->buscarSucursal($row['id_sucursal']));
            $pedido->setMontoFinal($row['monto_final']);
            $pedido->setAllLineaPedido($this->listarLineas($pedido->getId()));

            array_push($lista, $pedido);
        }

        return $lista;
    }

    public function modificarEstado($estado, $id){
        $query = "
            UPDATE pedidos
            SET estado = :estado
            WHERE id = :id;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $command->bindParam(':estado', $estado);
        $command->bindParam(':id', $id);
        $command->execute();
    }
    
    public function eliminar($id){

        $this->eliminarLineas($id);

        $query = "DELETE FROM pedidos WHERE id = :id;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $command->bindParam(':id', $id);
        $command->execute();
    }

    //////////////////LINEASPEDIDO////////////////////////

    public function agregarLinea($lineaPedido)
    {
        $query = "
            INSERT INTO linea_pedidos(
                id_cerveza,
                id_envase,
                cantidad,
                precio,
                id_pedido)
            VALUES (
                :id_cerveza, 
                :id_envase, 
                :cantidad,
                :precio, 
                :id_pedido)
        ";

        $connection = new Connection();
        $pdo = $connection->connect();
        
        $command = $pdo->prepare($query);

        $id_cerveza = $lineaPedido->getCerveza()->getId();
        $id_envase = $lineaPedido->getEnvase()->getId();
        $cantidad = $lineaPedido->getCantidad();
        $precio = $lineaPedido->getPrecio();
        $id_pedido = $lineaPedido->getIdPedido();
        
        $command->bindParam(':id_cerveza', $id_cerveza);
        $command->bindParam(':id_envase', $id_envase);
        $command->bindParam(':cantidad', $cantidad);
        $command->bindParam(':precio', $precio);
        $command->bindParam(':id_pedido', $id_pedido);
        $command->execute();
    }

    public function listarLineas($id_pedido)
    {
        $query = "SELECT * FROM linea_pedidos WHERE id_pedido = :id_pedido;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);
        $command->bindParam(':id_pedido', $id_pedido);
        $command->execute();

        $lista = array();

        while ($row = $command->fetch()) {
            
            $linea_pedido = new Modelos\LineaPedido();

            $linea_pedido->setId($row['id']);
            $linea_pedido->setIdPedido($row['id_pedido']);
            $linea_pedido->setCantidad($row['cantidad']);
            $linea_pedido->setPrecio($row['precio']);

            $cerveza = BDCerveza::getInstance()->buscar($row['id_cerveza']);
            $linea_pedido->setCerveza($cerveza);

            $envase = BDEnvase::getInstance()->buscar($row['id_envase']);
            $linea_pedido->setEnvase($envase);

            array_push($lista, $linea_pedido);
        }

        return $lista;
    }

    public function eliminarLineas($id_pedido){

        $query = "DELETE FROM linea_pedidos WHERE id_pedido = :id_pedido;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $command->bindParam(':id_pedido', $id_pedido);
        $command->execute();
    }
}