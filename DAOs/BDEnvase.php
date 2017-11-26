<?php

namespace DAOs;

use Config\Singleton;
use Config\Connection;

use Modelos;

class BDEnvase extends Singleton
{
    public function agregar($envase)
    {
        $query = "
            INSERT INTO envases(volumen, factor, descripcion, imagen)
            VALUES (:volumen, :factor, :descripcion, :imagen)
        ";

        $connection = new Connection();
        $pdo = $connection->connect();
        
        $command = $pdo->prepare($query);

        $volumen = $envase->getVolumen();
        $factor = $envase->getFactor();
        $descripcion = $envase->getDescripcion();
        $imagen = $cerveza->getImagen();

        $command->bindParam(':volumen', $volumen);
        $command->bindParam(':factor', $factor);
        $command->bindParam(':descripcion', $descripcion);
        $command->bindParam(':imagen', $imagen);
        
        $command->execute();
    }

    public function getLista()
    {
        $query = " SELECT * FROM envases;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);
        $command->execute();

        $lista = array();
        while ($row = $command->fetch()) {
            $envase = new Modelos\Envase();

            $envase->setId($row['id']);
            $envase->setVolumen($row['volumen']);
            $envase->setFactor($row['factor']);
            $envase->setDescripcion($row['descripcion']);
            $cerveza->setImagen($row['imagen']);

            array_push($lista, $envase);
        }

        return $lista;
    }

    public function eliminar($id){

        $query = "DELETE FROM envases WHERE id = :id;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $command->bindParam(':id', $id);
        $command->execute();
    }

    public function buscar($id){

        $query = "SELECT * FROM envases WHERE id = :id;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $command->bindParam(':id', $id);
        $command->execute();

        $row = $command->fetch();

        $envase = new Modelos\Envase();
        $envase->setId($row['id']);
        $envase->setVolumen($row['volumen']);
        $envase->setFactor($row['factor']);
        $envase->setDescripcion($row['descripcion']);
        $cerveza->setImagen($row['imagen']);

        return $envase;
    }

    public function modificar($id, $parametros, $foto){
        $query = "
            UPDATE envases
            SET volumen = :volumen, factor = :factor, descripcion = :descripcion, imagen = :imagen
            WHERE id = :id;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $volumen = $parametros['volumen'];
        $factor = $parametros['factor'];
        $descripcion = $parametros['descripcion'];
        

        $command->bindParam(':id', $id);
        $command->bindParam(':volumen', $volumen);
        $command->bindParam(':factor', $factor);
        $command->bindParam(':descripcion', $descripcion);
        $command->bindParam(':imagen', $foto);
        
        $command->execute();
    }
}