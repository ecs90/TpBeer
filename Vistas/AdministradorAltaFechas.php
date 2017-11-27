<div class="container col-sm-5 bg-dark text-white" style="margin-top: 20px; opacity: 0.9; color: black"><br>
	<div class="trans text-center">
		<h5 class="display-6">Buscar litros entre Fechas</h5><br>
	</div>
	<form action="/TpBeer/administrador/cervezasXlitro" method="post">
  		<label for="fecha_entrega"><strong><h5>Fecha inicio: </h5></strong></label>
        <input type="text" id="datepicker" name="fecha" />
        <br><br>
        <label for="fecha_entrega"><strong><h5>Fecha fin: </h5></strong></label>
        <input type="text" id="datepickertwo" name="fechados" /> 
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
            $('#datepickertwo').datepicker({
                dateFormat: 'yy-mm-dd'
            })
        });
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>