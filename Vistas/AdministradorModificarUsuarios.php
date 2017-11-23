<center>
<div class="conteiner bg-dark col-md-8 text-white" style="opacity: 0.9; margin-top: 40px; color: black">
	<h3 class="form-signin-heading text-center">Registro</h3><br>
	<form action="/TpBeer/Usuario/guardarCambios" method="post">
		<input type="hidden" name="id" value="<?php echo $usuarioM->getId(); ?>" >
		<div class="form-row">
			<div class="form-group col-md-6">
		        <label for="nombre">Nombre</label>
		        <input type="text" id="nombre" name="nombre" class="form-control form-control-sm" value="<?php echo $usuarioM->getNombre(); ?>">
			</div>
			<div class="form-group col-md-6">
		        <label for="apellido">Apellido</label>
		        <input type="text" id="apellido" name="apellido" class="form-control form-control-sm" value="<?php echo $usuarioM->getApellido(); ?>">
			</div>
			<div class="form-group col-md-6">
			    <label for="domicilio">Domicilio</label>
			    <input type="text" id="domicilio" name="domicilio" class="form-control form-control-sm" value="<?php echo $usuarioM->getDomicilio(); ?>">
			</div>
		    <div class="form-group col-md-6">
		        <label for="telefono">Telefono</label>
		        <input type="number" id="telefono" name="telefono" class="form-control form-control-sm" value="<?php echo $usuarioM->getTelefono(); ?>">
			</div>
			<div class="form-group col-md-6">
		        <label for="email">Email</label>
		        <input type="email" id="email" name="email" class="form-control form-control-sm" value="<?php echo $usuarioM->getEmail(); ?>">
			</div>
			<div class="form-group col-md-6">
		        <label for="usuario">Usuario</label>
		        <input type="text" id="username" name="username" class="form-control form-control-sm" value="<?php echo $usuarioM->getUsername(); ?>">
			</div>
		</div><br>
		<button class="btn btn-sm btn-black btn-block" type="submit">Modificar</button><br>
	</form>
</div>
</center>