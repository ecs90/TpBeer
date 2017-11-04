<!DOCTYPE html>
<html>
    <title>Linea de Pedido</title>
    <body> 
       <center>
        <ul>
        <?php foreach ($this->getListaLineaPedido() as $lineaPedido) : ?>

             <li>   
                <b>Cerveza: </b> <?php echo /*Falta imagen*/"Nombre: ".$lineaPedido->getCerveza()->getNombre().", Descripcion: ".$lineaPedido->getCerveza()->getDescripcion().", Precio: ".$lineaPedido->getCerveza()->getPrecio(); ?>
                
            <br> 
                <b>Envase: </b> <?php echo /*Falta imagen*/"Volumen: ".$lineaPedido->getEnvase()->getVolumen().", Descripcion: ".$lineaPedido->getEnvase()->getDescripcion().", Factor de modificacion del precio: ".$lineaPedido->getEnvase()->getFactor(); ?> 
            <br>
                <b>Precio: </b> <?php echo $lineaPedido->getPrecio(); ?>
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