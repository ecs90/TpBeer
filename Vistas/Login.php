<?php  
	require_once 'header.php';
?>
<div class="container login">
	<h1 align="center">Login</h1>
	<form action="/TpBeer/login/procesarLogin" method="post">
	  	<div class="form-group">
	    	<label for="Usuario">Usuario</label>
	    	<input type="text" class="form-control" id="usuario" name="usuario">
	 	</div>
		<div class="form-group">
			<label for="Contraseña">Contraseña</label>
		    <input type="password" class="form-control" id="contrasenia" name="contrasenia">
		</div><br>
		<button type="submit" class="btn btn-dark">Submit</button>
		<br><br>
	</form>
</div>
<?php  
	require_once 'footer.php';
?>