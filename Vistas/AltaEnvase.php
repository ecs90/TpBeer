<!DOCTYPE html>
<html>
<head>
    <title>Carga Envases</title>
</head>
<body>
    <form action="altaEnvase" method="post">
        <label for="volumen">Volumen:</label>
        <input type="number" id="volumen" name="volumen" required="required">
        <br><br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required="required">
        <br><br>
        <label for="stockLitros">Stock:</label>
        <input type="number" id="stockLitros" name="stockLitros" required="required">
        <br><br>
        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" required="required">
        <br><br>
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" required="required">
        <br><br>
        <input type="submit" value="Cargar Cerveza">
        <br><br>
    </form>
</body>
</html>