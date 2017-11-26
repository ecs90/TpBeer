<?php

namespace DAOs;

use Config\Singleton;
use Config\Connection;

use Modelos;

class BDLineaPedido extends Singleton implements IDAO 
{
    public function agregar($lineaPedido)
    {
        $query = "
            INSERT INTO linea_pedidos(
                id_cerveza,
                id_envase,
                cantidad,
                precio,
                id_pedido)
            VALUES (:id_cerveza, :id_envase, :cantidad,
                :precio, :id_pedido)
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

    public function getListaPorPedido($id_pedido)
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
}