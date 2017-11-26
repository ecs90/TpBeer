<?php

namespace DAOs;

use Config\Singleton;
use Config\Connection;

use Modelos;

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

        $id_usuario = ($pedido->getUsuario())->getId();
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

    public function getLista()
    {
        $query = "SELECT * FROM pedidos;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);
        $command->execute();

        $lista = array();
        while ($row = $command->fetch()) {
            $pedido = new Modelos\Pedido();

            $pedido->setId($row['id']);
            $pedido->setFechaPedido($row['fecha_pedido']);
            $pedido->setFechaEntrega($row['fecha_entrega']);
            $pedido->setEstado($row['estado']);
            $pedido->setHorario($row['horario']);
            $pedido->setTipoEntrega($row['tipo_entrega']);
            $pedido->setSucursal($row['id_sucursal']);
            $pedido->setMontoFinal($row['monto_final']);


            array_push($lista, $pedido);
        }

        return $lista;
    }

    public function eliminar($id){

        $query = "DELETE FROM pedidos WHERE id = :id;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $command->bindParam(':id', $id);
        $command->execute();
    }

    public function buscar($id){

        $query = "SELECT * FROM pedidos WHERE id = :id;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $command->bindParam(':id', $id);
        $command->execute();

        $row = $command->fetch();

        $pedido = new Modelos\Pedido();

            $pedido->setId($row['id']);
            $pedido->setFechaPedido($row['fecha_pedido']);
            $pedido->setFechaEntrega($row['fecha_entrega']);
            $pedido->setEstado($row['estado']);
            $pedido->setHorario($row['horario']);
            $pedido->setTipoEntrega($row['tipo_entrega']);
            $pedido->setSucursal($row['id_sucursal']);
            $pedido->setMontoFinal($row['monto_final']);

        return $pedido;
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
}