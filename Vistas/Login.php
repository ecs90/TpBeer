<?php  
	use Controladores\LoginControlador;
	require_once 'header.php';
?>
<!--<div class="container login">
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
</div>-->
<body class="bg-img-log">
<div class="container col-sm-3 bg-dark" style="margin-top:40px; opacity: 0.8;"><br>
      <form action="/TpBeer/Login/procesarLogin" method="post" class="form-signin">
        <h5 class="form-signin-heading text-center">Ingreso</h5><br>
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario" class="form-control form-control-sm" required autofocus>
        <label for="contrasenia">Contraseña</label>
        <input type="password" id="contrasenia" name="contrasenia" class="form-control form-control-sm" required><br>
        <button class="btn btn-sm btn-black btn-block" type="submit">Ingresar</button>
      </form><br>
      <?php
      	if (isset($_SESSION['USUARIO-LOGUEADO']) == "error") {
      ?>
      	<a href="#" class="btn btn-danger btn-sm disabled" role="button" aria-disabled="true">Datos invalidos</a><br><br>
      <?php  	
      	  }
      ?>
</div>
<?php  
	require_once 'footer.php';
?>