<?php

namespace DAOs;

use Config\Singleton;
use Config\Connection;

use Modelos;

class BDEnvase extends Singleton implements IDAO 
{
    public function agregar($envase)
    {
        $query = "
            INSERT INTO envases(volumen, factor, descripcion)
            VALUES (:volumen, :factor, :descripcion)
        ";

        $connection = new Connection();
        $pdo = $connection->connect();
        
        $command = $pdo->prepare($query);

        $volumen = $envase->getVolumen();
        $factor = $envase->getFactor();
        $descripcion = $envase->getDescripcion();
        

        $command->bindParam(':volumen', $volumen);
        $command->bindParam(':factor', $factor);
        $command->bindParam(':descripcion', $descripcion);
        
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

        return $envase;
    }

    public function modificar($id, $parametros){
        $query = "
            UPDATE envases
            SET volumen = :volumen, factor = :factor, descripcion = :descripcion
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
        
        
        $command->execute();
    }
}