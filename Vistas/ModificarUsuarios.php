<!DOCTYPE html>
<html>
<head>
    <title>Modificar Usuarios</title>
</head>
<body>
    <?php $usuario = $GLOBALS['usuario']; ?>
    <center>
    <form action="../../usuario/guardarCambios" method="post">
        <label for="usuario">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $usuario->getNombre(); ?>">
        <br><br>

        <input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>" >

        <label for="tipo">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo $usuario->getApellido(); ?>" >
        <br><br>

        <label for="Domicilio">Domicilio:</label>
        <input type="text" id="domicilio" name="domicilio" value="<?php echo $usuario->getDomicilio(); ?>">
        <br><br>

        <label for="telefono">Telefono:</label>
        <input type="number" id="telefono" name="telefono" value="<?php echo $usuario->getTelefono(); ?>">
        <br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $usuario->getEmail(); ?>">
        <br><br>

        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" value="<?php echo $usuario->getUsername(); ?>">
        <br><br>

        <input type="submit" value="Guardar Cambios">
        <br><br>
    </form>
</center>
</body>
</html>