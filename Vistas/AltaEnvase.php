<!DOCTYPE html>
<html>
<head>
    <title>Carga Envases</title>
</head>
<body>
    <form action="darDeAlta" method="post">
        <label for="volumen">Volumen:</label>
        <input type="number" id="volumen" name="volumen" required="required">
        <br><br>
        <label for="factor">Precio:</label>
        <input type="number" id="factor" name="factor" required="required">
        <br><br>
        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" required="required">
        <br><br>
        <!--<label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen">-->
        <br><br>
        <input type="submit" value="Cargar Envase">
        <br><br>
    </form>
</body>
</html>