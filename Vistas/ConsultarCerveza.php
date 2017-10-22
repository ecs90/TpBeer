
<!DOCTYPE html>
<html>
    <head>       
        <meta charset="utf-8"> 
        <title>Consulta Cerveza</title>
    </head>
<body>
<div align="center" style="padding-top: 20px">
	<label style="border: 2px; border-radius: 3px; background-color: green; color: white; font-size: 22px; padding: 2px; font-style: verdana">Consulta</label>
</div>
<table border="2" align="center" cellspacing="5px" style="margin-top: 2%; min-width: 400px"><tr align="center"><td>
		<form action="hacerConsulta" method="post">
			<p>
			<label for="nombre">Introduzca el ID de la cerveza a consultar: </label>
			<input type="text" name="id" id="id" required="required">
			<br/> <br/>
			
			<input type="submit" value="Validar y Cargar Detalles" style="width: 200px"><br><br>
			<input type="reset" value="Limpiar Campos">
		</p>
		</form>
	</td></tr>
</table>
</div>
</body>
</html>
