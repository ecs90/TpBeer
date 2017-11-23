<center>
<div class="conteiner bg-dark col-md-8 text-white" style="opacity: 0.9; margin-top: 40px; color: black">
	<h3 class="form-signin-heading text-center">Registro</h3><br>
	<form action="/TpBeer/Usuario/darDeAlta" method="post">
		<div class="form-row">
			<div class="form-group col-md-6">
		        <label for="nombre">Nombre</label>
		        <input type="text" id="nombre" name="nombre" class="form-control form-control-sm">
			</div>
			<div class="form-group col-md-6">
		        <label for="apellido">Apellido</label>
		        <input type="text" id="apellido" name="apellido" class="form-control form-control-sm">
			</div>
			<div class="form-group col-md-6">
			    <label for="domicilio">Domicilio</label>
			    <input type="text" id="domicilio" name="domicilio" class="form-control form-control-sm">
			</div>
		    <div class="form-group col-md-6">
		        <label for="telefono">Telefono</label>
		        <input type="number" id="telefono" name="telefono" class="form-control form-control-sm">
			</div>
			<div class="form-group col-md-6">
		        <label for="email">Email</label>
		        <input type="email" id="email" name="email" class="form-control form-control-sm">
			</div>
			<div class="form-group col-md-6">
		        <label for="usuario">Usuario</label>
		        <input type="text" id="usuario" name="usuario" class="form-control form-control-sm">
			</div>
			<div class="form-group col-md-6">
		        <label for="contrasenia">Contraseña</label>
		        <input type="password" id="contrasenia" name="contrasenia" class="form-control form-control-sm" required>
			</div>
			<div class="form-group col-md-6">
		        <label for="Ccontrasenia">Confirmar contraseña</label>
		        <input type="password" id="Ccontrasenia" name="Ccontrasenia" class="form-control form-control-sm" required><br>
			</div>
		        <button class="btn btn-sm btn-black btn-block" type="submit">Registrar</button>
		</div><br>
	</form>
</div>
</center>