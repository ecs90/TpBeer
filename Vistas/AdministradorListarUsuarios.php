<html>
    <body> 
       <center>
        <ul>
        <?php foreach ($this->getListaUsuarios() as $usuario) : ?>

            <li>   
                <b>Nombre: <b> <?php echo $usuario->getNombre(); ?>
            </li> 
            <li>
                <b>Apellido: <b> <?php echo $usuario->getApellido(); ?>
            </li> 
            <li>
                <b>Domicilio: <b> <?php echo $usuario->getDomicilio(); ?>
            </li>
            <li>
                <b>Telefono: <b> <?php echo $usuario->getTelefono(); ?>
            </li> 
            <li>
                <b>Email: <b> <?php echo $usuario->getEmail(); ?>
            </li>
            <li>
                <b>Nombre de Usuario: <b> <?php echo $usuario->getUsername(); ?>
            </li> 
            <li>
                <b>id: <b> <?php echo $usuario->getId(); ?>
            </li> 
            <a href="modificar/<?php echo $usuario->getId(); ?>">Modificar</a>
            <a href="baja/<?php echo $usuario->getId(); ?>">Eliminar</a>
            <br>

            --------------------------------------
                
            <br><br>
        <?php endforeach; ?>
        </ul>
    </center>
    </body>
</html>