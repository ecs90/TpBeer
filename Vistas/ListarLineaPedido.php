<!DOCTYPE html>
<html>
    <title>Linea de Pedido</title>
    <body> 
       <center>
        <ul>
        <?php foreach ($this->getListaLineaPedido() as $lineaPedido) : ?>
                
             <li>   
                <b>Cerveza: <b> <?php echo $lineaPedido->getCerveza()->getNombre(); ?>

                
            <br> 
                <b>Envase: <b> <?php echo $lineaPedido->getEnvase(); ?> 
            <br>
                <b>Precio: <b> <?php echo $lineaPedido->getPrecio(); ?>
            </li> 
             
            <a href="modificar/<?php echo $lineaPedido->getId(); ?>">Modificar</a>
            <a href="baja/<?php echo $lineaPedido->getId(); ?>">Eliminar</a>
            <br>

            --------------------------------------
                
            <br><br>
        <?php endforeach; ?>
        </ul>
    </center>
    </body>
</html>