<?php

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('Config/Autoload.php');
require('Config/Config.php');
	use Config\Autoload;
	Autoload::start();

	use Modelos\TipoCerveza;
		



	if (!empty($_POST)){
					

				echo $cerveza->getNombre();
		}else{
			echo "<script> if(confirm('Verifique que todos los datos sean Correctos !'));";  
			echo "window.location = '../index.php'; </script>";

			
	}*/

?>
<!DOCTYPE html>
<html>
    <head>       
        <meta charset="utf-8"> 
        <title>Eliminar Cerveza</title>
    </head>
<body>
<div align="center" style="padding-top: 20px">
	<label style="border: 2px; border-radius: 3px; background-color: green; color: white; font-size: 22px; padding: 2px; font-style: verdana">Eliminar Cerveza</label>
</div>
<table border="2" align="center" cellspacing="5px" style="margin-top: 2%; min-width: 400px"><tr align="center"><td>
		<form action="darDeBaja" method="post">
			<p>
			<label for="nombre">Introduzca el id de la cerveza a eliminar: </label>
			<input type="text" name="id" id="id" required="required">
			<br/> <br/>
			
			<input type="submit" value="Eliminar" style="width: 200px"><br><br>
			<input type="reset" value="Limpiar Campos">
		</p>
		</form>
	</td></tr>
</table>
</div>
</body>
</html>
