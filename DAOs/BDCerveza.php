<?php

namespace DAOs;

use Config\Singleton;
use Config\Connection;
use Controladores;
use Modelos;

class BDCerveza extends Singleton implements IDAO 
{
    public function agregar($cerveza)
    {
        $query = "
            INSERT INTO cervezas(nombre, descripcion, precio)
            VALUES (:nombre, :descripcion, :precio);
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

        $this->agregarEnvases($pdo->lastInsertId(), $cerveza->getEnvases());
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
            $cerveza->setEnvases($this->listarEnvases($cerveza->getId()));

            array_push($lista, $cerveza);
        }
        return $lista;
    }

    public function eliminar($id){

        $this->eliminarEnvases($id);

        $query = "DELETE FROM cervezas WHERE id = :id;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $command->bindParam(':id', $id);
        $command->execute();

        $this->eliminarEnvases($id);
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
        $cerveza->setEnvases($this->listarEnvases($cerveza->getId()));

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

        $envases = $parametros['envases'];
        $envasesC = array();

        foreach ($envases as $envase) {
            $datos = new Controladores\EnvaseControlador();
            $dato = $datos->buscarEnvase($envase);
            array_push($envasesC, $dato);
        }

        $this->eliminarEnvases($id);
        $this->agregarEnvases($id, $envasesC);

    }

    //////////ENVASESXCERVEZAS///////////////

    public function agregarEnvases($id_cerveza, $envases){
        
        foreach ($envases as $envase) {
            $query = "INSERT INTO envasesxcervezas(id_cerveza, id_envase)
            VALUES (:id_cerveza, :id_envase);";

            $connection = new Connection();
            $pdo = $connection->connect();
            $command = $pdo->prepare($query);

            $idCerveza = $id_cerveza;
            $idEnvase = $envase->getId();

            $command->bindParam(':id_cerveza', $idCerveza);
            $command->bindParam(':id_envase', $idEnvase);
            
            $command->execute();
        }

    }

    public function listarEnvases($id_cerveza){
        
        $envaseControl = new Controladores\EnvaseControlador();
        $envase = new Modelos\Envase();
        
        $query = "SELECT id_envase FROM envasesxcervezas WHERE id_cerveza = :id;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $command->bindParam(':id', $id_cerveza);
        $command->execute();

        $lista = array();
        while ($row = $command->fetch()) {
            
            $idEnvase = $row['id_envase'];

            $envase = $envaseControl->buscarEnvase($idEnvase);
            
            array_push($lista, $envase);
        }
        
        return $lista;

    }

    public function eliminarEnvases($id_cerveza){

        $query = "DELETE FROM envasesxcervezas WHERE id_cerveza = :id;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $command->bindParam(':id', $id_cerveza);
        $command->execute();
    }

}