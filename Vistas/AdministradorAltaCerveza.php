<?php  
	require_once 'header.php';
?>
<div class="container col-sm-5 bg-dark text-white" style="margin-top: 20px; opacity: 0.9; color: black"><br>
	<div class="trans text-center">
		<h5 class="display-6">Cargar cerveza</h5><br>
	</div>
	<form action="/TpBeer/Cerveza/alta" method="post">
		<div class="form-group row">
			<label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
			<div class="col-sm-8">
      			<input type="text" class="form-control form-control-sm" id="nombre" name="nombre">
    		</div>
		</div>
		<div class="form-group row">
		    <label for="descripcion" class="col-sm-4 col-form-label">Descripcion</label>
		    <div class="col-sm-8">
      			<textarea class="form-control form-control-sm" id="descripcion" name="descripcion" rows="5"></textarea>
    		</div>
  		</div>
  		<div class="form-group row">
		    <label for="precio" class="col-sm-4 col-form-label">Precio</label>
		    <div class="col-sm-8">
      			<input class="form-control form-control-sm" type="number"  value="0" id="precio" name="precio"></input>
    		</div>
  		</div>
  		<div class="form-group row">
		    <label for="imagen" class="col-sm-4 col-form-label">Imagen</label>
		    <div class="col-sm-8">
      			<input class="form-control form-control-sm" type="file" id="imagen" name="imagen"></input>
    		</div>
  		</div><br>
  		<div class="trans text-center">
  			<button type="submit" class="btn btn-light btn-block">Cargar</button>
  		</div>
	</form><br>
</div>
<?php  
	require_once 'footer.php';
?>