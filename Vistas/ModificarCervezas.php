<!DOCTYPE html>
<html>
<head>
    <title>Modificar Cervezas</title>
</head>
<body>
    <center>
    <form action="/TpBeer/cerveza/guardarCambios" method="post">
        <label for="nombre">Nombre:</label>
        <input type="hidden" name="id" value="<?php echo $cerveza->getId(); ?>" >
        <input type="text" id="nombre" name="nombre" value="<?php echo $cerveza->getNombre(); ?>" placeholder="Ingrese el nombre de la cerveza..." >
        <br><br>
        <label for="tipo">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" value="<?php echo $cerveza->getDescripcion(); ?>" >
        <br><br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" value="<?php echo $cerveza->getPrecio(); ?>">
        <br><br>
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" >
        <br><br>
        <input type="submit" value="Guardar Cambios">
        <br><br>
    </form>
</center>
</body>
</html>