<html>
    <body> 
       <center>
        <ul>
        <?php foreach ($this->getListaEnvases() as $envase) : ?>

             <li>   
                <b>Volumen: <b> <?php echo $envase->getVolumen(); ?>
                
            </li> 
            <li>
                <b>Factor: <b> <?php echo $envase->getFactor(); ?>
            </li> 
            <li>
                <b>Descripcion: <b> <?php echo $envase->getDescripcion(); ?>
            </li> 
            <li>
                <b>id: <b> <?php echo $envase->getId(); ?>
            </li> 
            <a href="modificar/<?php echo $envase->getId(); ?>">Modificar</a>
            <a href="baja/<?php echo $envase->getId(); ?>">Eliminar</a>
            <br>

            --------------------------------------
                
            <br><br>
        <?php endforeach; ?>
        </ul>
    </center>
    </body>
</html>