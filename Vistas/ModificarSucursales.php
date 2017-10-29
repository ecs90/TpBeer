<!DOCTYPE html>
<html>
<head>
    <title>Modificar Sucursal</title>
</head>
<body>
    <?php $sucursal = $GLOBALS['sucursal']; ?>
    <center>
    <form action="../../sucursal/guardarCambios" method="post">
        <label for="direccion">Direccion:</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $sucursal->getDireccion(); ?>">
        <br><br>

        <label for="numero">Numero:</label>
        <input type="number" id="numero" name="numero" value="<?php echo $sucursal->getNumero(); ?>">
        <br><br>

        <input type="hidden" name="id" value="<?php echo $sucursal->getId(); ?>" >
        
        <input type="submit" value="Guardar Cambios">
        <br><br>
    </form>
</center>
</body>
</html>