<html>
    <body> 
       <center>
            <ul>
            <?php foreach ($this->getListaSucursales() as $sucursal) : ?>

                <li>   
                    <b>Direccion: <b> <?php echo $sucursal->getDireccion(); ?>
                </li> 
                <li>
                    <b>Numero: <b> <?php echo $sucursal->getNumero(); ?>
                </li> 
                <li>
                    <b>Id: <b> <?php echo $sucursal->getId(); ?>
                </li> 
                <a href="modificar/<?php echo $sucursal->getId(); ?>">Modificar</a>
                <a href="baja/<?php echo $sucursal->getId(); ?>">Eliminar</a>
                <br>

                --------------------------------------
                
            <?php endforeach; ?>
            </ul>
        </center>
    </body>
</html>