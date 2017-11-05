<!--<center>
	<form action="/TpBeer/Cerveza/darDeAlta" method="post">
		<label for="nombre">Nombre:</label>
		<input type="text" readonly class="form-control-plaintext" id="nombre" name="nombre">
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
	<div align="center" style="margin-top: 10px">
	<a href="..\index.php">VOLVER A INICIO</a>
	</div>
</center>-->
<?php  
	require_once 'header.php';
?>

<div class="container col-sm-5 bg-dark text-white" style="opacity: 0.7; margin-top: 20px"><br>
	<div class="trans text-center">
		<h5 class="display-6">Cargar cerveza</h5><br>
	</div>
	<form action="/TpBeer/Cerveza/darDeAlta" method="post">
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
  		</div><br>
  		<div class="trans text-center">
  			<button type="submit" class="btn btn-secondary btn-block">Cargar</button>
  		</div>
	</form><br>
</div>
<?php  
	require_once 'footer.php';
?>
