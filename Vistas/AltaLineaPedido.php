<!DOCTYPE html>
<html>
<head>
	<title>Armar pedido</title>
</head>
<body>
    <center>
        <form action="/TpBeer/Pedido/darDeAlta" method="post">
        <label><b>Lista Cervezas</b></label>
	   <?php $i=0;
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
        endforeach; ?> <br><br>

         <label><b>Lista Envases</b></label>
       <?php $j=0;
       foreach ($this->getListaEnvases() as $envase) : ?>
            <br>
             <li>   
                <input type="radio" name="envase" value="<?php print($j); ?>">
                    <b>Volumen: </b> <?php echo $envase->getVolumen(); ?>
                    <b>Factor: </b> <?php echo $envase->getFactor(); ?>
                    <b>Descripcion: </b> <?php echo $envase->getDescripcion(); ?>   
            </li>
            -------------------------------------- 
        <?php $j++;
        endforeach; ?> <br><br>

        <label><b>Cantidad:</b></label>
        <input type="number" name="cantidad">

        <br><br>

        <input type="submit" name="Agregar al pedido">
        </form>
    </center>
</body>
</html>