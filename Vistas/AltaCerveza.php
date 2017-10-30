<!DOCTYPE html>
<html>
	<head>
		<title>Carga Cervezas</title>
	</head>
	<body>
		<center>
			<form action="/TpBeer/Cerveza/darDeAlta" method="post">
				<label for="nombre">Nombre:</label>
				<input type="text" id="nombre" name="nombre" size="30">
				<br><br>
				<label for="descripcion">Descripcion:</label>
				<input type="text" id="descripcion" name="descripcion" size="30" >
				<br><br>
				<label for="precio">Precio:</label>
				<input type="number" step="0.01" id="precio" name="precio" size="30">
				<br><br>
				<label for="stock">Stock:</label>
				<input type="number" id="stock" name="stock" size="30" >
				<br><br>
				<label for="imagen">Imagen:</label>
				<input type="file" id="imagen" name="imagen" size="30" >
				<br><br>
				<input type="submit" value="Cargar Cerveza">
				<br><br>
			</form>

			<!--<div align="center" style="margin-top: 10px">
				<a href="..\index.php">VOLVER A INICIO</a>
			</div>
		</center>-->
	</body>
</html>