<html>
    <body> 
       <center>
        <ul>
        <?php foreach ($this->getListaCervezas() as $cerveza) : ?>

             <li>   
                <b>Nombre: <b> <?php echo $cerveza->getNombre(); ?>
                
            </li> 
            <li>
                <b>Descripcion: <b> <?php echo $cerveza->getDescripcion(); ?>
            </li> 
            <li>
                <b>Precio: <b> <?php echo $cerveza->getPrecio(); ?>
            </li> 
            <li>
                <b>id: <b> <?php echo $cerveza->getId(); ?>
            </li> 
            <a href="modificar/<?php echo $cerveza->getId(); ?>">Modificar</a>
            <a href="baja/<?php echo $cerveza->getId(); ?>">Eliminar</a>
            <br>

            --------------------------------------
                
            <br><br>
        <?php endforeach; ?>
        </ul>
    </center>
    </body>
</html>