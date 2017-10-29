<!DOCTYPE html>
<html>
	<head>
		<title>Carga Cervezas</title>
	</head>
	<body>
		<center>
			<form action="darDeAlta" method="post">
				<label for="nombre">Nombre:</label>
				<input type="text" id="nombre" name="nombre" >
				<br><br>
				<label for="descripcion">Descripcion:</label>
				<input type="text" id="descripcion" name="descripcion" >
				<br><br>
				<label for="precio">Precio:</label>
				<input type="number" step="0.01" id="precio" name="precio" >
				<br><br>
				<label for="stock">Stock:</label>
				<input type="number" id="stock" name="stock" >
				<br><br>
				<label for="imagen">Imagen:</label>
				<input type="file" id="imagen" name="imagen" >
				<br><br>
				<input type="submit" value="Cargar Cerveza">
				<br><br>
			</form>
		</center>
	</body>
</html>