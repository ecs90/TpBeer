<div class="container col-sm-5 bg-dark text-white" style="margin-top: 20px; opacity: 0.9; color: black"><br>
	<div class="trans text-center">
		<h5 class="display-6">Buscar Pedido Sucursal</h5><br>
	</div>
	<form action="/TpBeer/pedido/listarPedidosSucursales" method="post">
  		<div class="form-group row">
  			<label for="precio" class="col-sm-4 col-form-label">Sucursales:</label>
  			<div class="col-sm-8">
		        <?php foreach ($sucursales as $sucursal) { ?>
                        
                    <input type="radio" name="id_sucursal" id="id_sucursal" value="<?php echo $sucursal->getId()?>" checked="checked">
                    <label for="sucursal"><?php echo $sucursal->getDireccionCompleta(); ?></label><br>
                <?php  } ?>
        	</div>
  		</div>
  		<div class="trans text-center">
  			<button type="submit" class="btn btn-light btn-block">Buscar</button>
  		</div>
	</form><br>
</div>
<div class="container col-sm-5 bg-dark text-white" style="margin-top: 20px; opacity: 0.9; color: black"><br>
	<div class="trans text-center">
		<h5 class="display-6">Buscar Pedido Usuario</h5><br>
	</div>
	<form action="/TpBeer/pedido/listarPedidosUsuario" method="post">
  		<div class="form-group row">
			<label for="cliente" class="col-sm-4 col-form-label">Nombre Usuario:</label>
			<div class="col-sm-8">
      			<input type="text" class="form-control form-control-sm" id="cliente" name="cliente">
    		</div>
		</div>
		<div class="trans text-center">
  			<button type="submit" class="btn btn-light btn-block">Buscar</button>
  		</div>
	</form><br>
</div>
<div class="container col-sm-5 bg-dark text-white" style="margin-top: 20px; opacity: 0.9; color: black"><br>
	<div class="trans text-center">
		<h5 class="display-6">Buscar Pedido Fecha</h5><br>
	</div>
	<form action="/TpBeer/pedido/listarPedidosFechas" method="post">
  		<label for="fecha_entrega"><strong><h5>Fecha de entrega: </h5></strong></label>
        <input type="text" id="datepicker" name="fecha_entrega" /> 
		<div class="trans text-center">
  			<button type="submit" class="btn btn-light btn-block">Buscar</button>
  		</div>
	</form><br>
</div><br>
<script type="text/javascript">
        $(document).ready(function () {
            var date = new Date();
            var currentMonth = date.getMonth();
            var currentDate = date.getDate();
            var currentYear = date.getFullYear();

            $('#datepicker').datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>