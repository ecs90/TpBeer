<?php

namespace DAOs;

use Config\Singleton;
use Config\Connection;

use Modelos;

class BDCerveza extends Singleton implements IDAO 
{
    public function agregar($cerveza)
    {
        $query = "
            INSERT INTO cervezas(nombre, descripcion, precio)
            VALUES (:nombre, :descripcion, :precio)
        ";

        $connection = new Connection();
        $pdo = $connection->connect();
        
        $command = $pdo->prepare($query);

        $nombre = $cerveza->getNombre();
        $descripcion = $cerveza->getDescripcion();
        $precio = $cerveza->getPrecio();

        $command->bindParam(':nombre', $nombre);
        $command->bindParam(':descripcion', $descripcion);
        $command->bindParam(':precio', $precio);
        
        $command->execute();
    }

    public function getLista()
    {
        $query = "SELECT * FROM cervezas;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);
        $command->execute();

        $lista = array();
        while ($row = $command->fetch()) {
            $cerveza = new Modelos\Cerveza();

            $cerveza->setId($row['id']);
            $cerveza->setNombre($row['nombre']);
            $cerveza->setDescripcion($row['descripcion']);
            $cerveza->setPrecio($row['precio']);

            array_push($lista, $cerveza);
        }

        return $lista;
    }

    public function eliminar($id){

        $query = "DELETE FROM cervezas WHERE id = :id;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $command->bindParam(':id', $id);
        $command->execute();
    }

    public function buscar($id){

        $query = "SELECT * FROM cervezas WHERE id = :id;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $command->bindParam(':id', $id);
        $command->execute();

        $row = $command->fetch();

        $cerveza = new Modelos\Cerveza();
        $cerveza->setId($row['id']);
        $cerveza->setNombre($row['nombre']);
        $cerveza->setDescripcion($row['descripcion']);
        $cerveza->setPrecio($row['precio']);

        return $cerveza;
    }

    public function modificar($id, $parametros){
        $query = "
            UPDATE cervezas
            SET nombre = :nombre, descripcion = :descripcion, precio = :precio
            WHERE id = :id;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $nombre = $parametros['nombre'];
        $descripcion = $parametros['descripcion'];
        $precio = $parametros['precio'];

        $command->bindParam(':id', $id);
        $command->bindParam(':nombre', $nombre);
        $command->bindParam(':descripcion', $descripcion);
        $command->bindParam(':precio', $precio);
        
        $command->execute();
    }
}