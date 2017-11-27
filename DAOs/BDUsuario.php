<?php

namespace DAOs;

use Config\Singleton;
use Config\Connection;

use Modelos;

class BDUsuario extends Singleton
{
    public function agregar($usuario)
    {
        $query = "
            INSERT INTO usuarios (nombre, apellido, domicilio, telefono, email, username, contrasenia) 
            VALUES (:nombre, :apellido, :domicilio, :telefono, :email, :username, :contrasenia)
        ";


        $connection = new Connection();
        $pdo = $connection->connect();
        
        $command = $pdo->prepare($query);

        $nombre = $usuario->getNombre();
        $apellido = $usuario->getApellido();
        $domicilio = $usuario->getDomicilio();
        $telefono = $usuario->getTelefono();
        $email = $usuario->getEmail();
        $username = $usuario->getUsername();
        $password = $usuario->getContrasenia();

        $command->bindParam(':nombre', $nombre);
        $command->bindParam(':apellido', $apellido);
        $command->bindParam(':domicilio', $domicilio);
        $command->bindParam(':telefono', $telefono);
        $command->bindParam(':email', $email);
        $command->bindParam(':username', $username);
        $command->bindParam(':contrasenia', $password);

        var_dump($query);
        echo "<br><br>";
        var_dump($command);
        $command->execute();
    }

    public function getLista()
    {
        $query = "SELECT * FROM usuarios WHERE admin = 0 AND activo = 1;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);
        $command->execute();

        $lista = array();
        while ($row = $command->fetch()) {
            $usuario = new Modelos\Usuario();

            $usuario->setId($row['id']);
            $usuario->setNombre($row['nombre']);
            $usuario->setApellido($row['apellido']);
            $usuario->setDomicilio($row['domicilio']);
            $usuario->setTelefono($row['telefono']);
            $usuario->setEmail($row['email']);
            $usuario->setUsername($row['username']);
            $usuario->setContrasenia($row['contrasenia']);
            

            array_push($lista, $usuario);
        }

        return $lista;
    }

    public function eliminar($id){

        $query = " UPDATE usuarios SET activo = 0
            WHERE id = :id;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $command->bindParam(':id', $id);
        $command->execute();
    }

    public function buscar($id){
        $query = "SELECT * FROM usuarios WHERE id = :id;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $command->bindParam(':id', $id);
        $command->execute();
        $row = $command->fetch();

        $usuario = new Modelos\Usuario();

        $usuario->setId($row['id']);
        $usuario->setNombre($row['nombre']);
        $usuario->setApellido($row['apellido']);
        $usuario->setDomicilio($row['domicilio']);
        $usuario->setTelefono($row['telefono']);
        $usuario->setEmail($row['email']);
        $usuario->setUsername($row['username']);
        $usuario->setContrasenia($row['contrasenia']);

        return $usuario;
    }

    public function modificar($id, $parametros){
        $query = "

            UPDATE usuarios
            SET nombre = :nombre,
                apellido = :apellido,
                domicilio = :domicilio,
                telefono = :telefono,
                email = :email,
                username = :username
            WHERE id = :id;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);

        $nombre = $parametros['nombre'];
        $apellido = $parametros['apellido'];
        $domicilio = $parametros['domicilio'];
        $telefono = $parametros['telefono'];
        $email = $parametros['email'];
        $username = $parametros['username'];

        $command->bindParam(':id', $id);
        $command->bindParam(':nombre', $nombre);
        $command->bindParam(':apellido', $apellido);
        $command->bindParam(':domicilio', $domicilio);
        $command->bindParam(':telefono', $telefono);
        $command->bindParam(':email', $email);
        $command->bindParam(':username', $username);
        
        $command->execute();
    }

    public function getUsuarioPorUsername($username)
    {
        $query = "SELECT * FROM usuarios WHERE username=:username AND activo = 1;";

        $connection = new Connection();
        $pdo = $connection->connect();
        $command = $pdo->prepare($query);
        $command->bindParam(':username', $username);
        $command->execute();

        $row = $command->fetch();

        if (!$row) {
            return null;
        }

        $usuario = new Modelos\Usuario();

        $usuario->setId($row['id']);
        $usuario->setNombre($row['nombre']);
        $usuario->setApellido($row['apellido']);
        $usuario->setDomicilio($row['domicilio']);
        $usuario->setTelefono($row['telefono']);
        $usuario->setEmail($row['email']);
        $usuario->setUsername($row['username']);
        $usuario->setContrasenia($row['contrasenia']);
        $usuario->setAdmin($row['admin']);
        
        return $usuario;
    }
}