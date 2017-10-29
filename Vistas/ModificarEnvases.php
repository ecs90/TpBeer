<!DOCTYPE html>
<html>
<head>
    <title>Modificar Envases</title>
</head>
<body>
    <?php $envase = $GLOBALS['envase']; ?>
    <center>
    <form action="../../envase/guardarCambios" method="post">
        <label for="volumen">Volumen:</label>
        <input type="number" id="volumen" name="volumen" value="<?php echo $envase->getVolumen(); ?>">
        <br><br>
        <input type="hidden" name="id" value="<?php echo $envase->getId(); ?>" >

        <label for="factor">Factor:</label>
        <input type="number" id="factor" name="factor" value="<?php echo $envase->getFactor(); ?>">
        <br><br>

        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" value="<?php echo $envase->getDescripcion(); ?>" >
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