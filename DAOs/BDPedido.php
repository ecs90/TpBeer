<?php

namespace DAOs;

use Config\Singleton;
use Config\Connection;

use Modelos;

class BDPedido extends Singleton implements IDAO 
{
    public function agregar($pedido)
    {
        $query = "
            INSERT INTO pedidos(
                fecha_pedido,
                fecha_entrega,
                estado,
                horario,
                tipo_entrega,
                id_sucursal,
                monto_final
            )
            VALUES (
                :fecha_pedido,
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

        $fecha_pedido = $pedido->getFechaPedido();
        $fecha_entrega = $pedido->getFechaEntrega();
        $estado = $pedido->getEstado();
        $horario = $pedido->getHorario();
        $tipo_entrega = $pedido->getTipoEntrega();
        $id_sucursal = $pedido->getSucursal();
        $monto_final = $pedido->getMontoFinal();


        $command->bindParam(':fecha_pedido', $fecha_pedido);
        $command->bindParam(':fecha_entrega', $fecha_entrega);
        $command->bindParam(':estado', $estado);
        $command->bindParam(':horario', $horario);
        $command->bindParam(':tipo_entrega', $tipo_entrega);
        $command->bindParam(':id_sucursal', $id_sucursal);
        $command->bindParam(':monto_final', $monto_final);
        
        $command->execute();

        $id = $pdo->lastInsertId();
        $pedido->setId($id);

        return $id;
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

    public function modificar($id, $parametros){
        $query = "
            UPDATE pedidos
            SET fecha_pedido = :fecha_pedido, 
                fecha_entrega = :fecha_entrega,
                estado = :estado,
                horario = :horario,
                tipo_entrega = :tipo_entrega,
                id_sucursal = :id_sucursal,
                monto_final = :monto_final
            WHERE id = :id;";


        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $fecha_pedido = $parametros['fecha_pedido'];
        $fecha_entrega = $parametros['fecha_entrega'];
        $estado = $parametros['estado'];
        $horario = $parametros['horario'];
        $tipo_entrega = $parametros['tipo_entrega'];
        $id_sucursal = $parametros['id_sucursal'];
        $monto_final = $parametros['monto_final'];

        $command->bindParam(':fecha_pedido', $fecha_pedido);
        $command->bindParam(':fecha_entrega', $fecha_entrega);
        $command->bindParam(':estado', $estado);
        $command->bindParam(':horario', $horario);
        $command->bindParam(':tipo_entrega', $tipo_entrega);
        $command->bindParam(':id_sucursal', $id_sucursal);
        $command->bindParam(':monto_final', $monto_final);
        
        $command->execute();
    }
}