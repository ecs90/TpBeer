<!DOCTYPE html>
<html>
<head>
	<title>Modificar linea de pedido</title>
</head>
<body>
    <?php $lineaPedido = $GLOBALS['lineaPedido']; ?>
    <center>
        <form action="../../Pedido/guardarCambios" method="post">
        <input type="hidden" name="id" value="<?php echo $lineaPedido->getId(); ?>" >
        <label>Lista Cervezas</label>
	   <?php $i=1;
       foreach ($this->getListaCervezas() as $cerveza) : ?>
            <br>
             <li>   
             	<input type="radio" name="cerveza" value="<?php print($i); ?>">
                    <b>Nombre: </b><?php echo $cerveza->getNombre(); ?>
             		<b>Descripcion: </b> <?php echo $cerveza->getDescripcion(); ?>
             		<b>Precio: </b> <?php echo $cerveza->getPrecio(); ?>   
            </li>
            -------------------------------------- 
        <?php $i++;
        endforeach; ?>

         <label>Lista Envases</label>
       <?php $j=1;
       foreach ($this->getListaEnvases() as $envase) : ?>
            <br>
             <li>   
                <input type="radio" name="envase" value="<?php print($j); ?>">
                    <b>Volumen: <b> <?php echo $envase->getVolumen(); ?>
                    <b>Factor: <b> <?php echo $envase->getFactor(); ?>
                    <b>Descripcion: <b> <?php echo $envase->getDescripcion(); ?>   
            </li>
            -------------------------------------- 
        <?php $j++;
        endforeach; ?>

        <label>Cantidad:</label>
        <input type="number" name="cantidad" value="<?php echo $lineaPedido->getCantidad(); ?>">

        <br>

        <input type="submit" value="Guardar cambios">
        </form>
    </center>
</body>
</html>