<body class="InitBody"> 
    <br><br>
    <div class="container">
    <table class="table table-sm">
        <thead>
        <tbody class="bg-dark" style="color: white">
            <tr>
                <th scope="col">Cerveza</th>
                <th scope="col">Envase</th>
                <th scope="col">Cantidad</th>
                <th scope="col">MontoParcial</th>
                <th scope="col">
                    <div class="trans text-center">
                        Eliminar
                    </div>
                </th>
            </tr>
        </tbody>
        </thead>
        <thead>
        <tbody style="color: black;">
            <?php for ($i=0; $i<count($lineas); $i++) { ?>
                <tr class="table-active">
                    <th>   
                        <?php echo $lineas[$i]->getCerveza()->getNombre(); ?>
                    </th> 
                    <th>   
                        <?php echo $lineas[$i]->getEnvase()->getDescripcion(); ?>
                    </th> 
                    <th>
                        <?php echo $lineas[$i]->getCantidad(); ?>
                    </th> 
                    <th>
                        <?php echo $lineas[$i]->getPrecio(); ?>
                    </th>
                    <th>
                        <div class="trans text-center">
                            <a class="btn btn-danger btn-sm" href="/TpBeer/Pedido/eliminarLinea/<?php echo $i; ?>">Eliminar</a>
                        </div>
                    </th>
                </tr>
            <?php }; ?>
        </tbody>
        </thead>
    </table>
    </div>
    
    <center><h3>Monto total: <?php echo $pedido->getMontoFinal(); ?></h3></center><br>

    <div class="container">
        <table class="table table-sm"><tr><th>
        <center><br>
        <h2>Completar datos de entrega</h2><br>
        <form action="/TpBeer/pedido/finalizarPedido" method="post">

                    <label for="fecha_entrega"><strong><h5>Fecha de entrega: </h5></strong></label>
                    <input type="text" id="datepicker" name="fecha_entrega" />                

                    <br><br>
                    
                    <label for="tipo_entrega"><strong><h5>Tipo de entrega: </h5></strong></label>
                    
                    <input type="radio" name="tipo_entrega" id="sucursal" value="0" >
                    <label for="tipo_entrega">Retiro de sucursal</label>

                    <input type="radio" name="tipo_entrega" id="domicilio" value="1" checked="checked">
                    <label for="domicilio">Envio a Domicilio</label>
                    
                    <br><br>

                    <label for="id_sucursal"><strong><h5>Sucursal: </h5></strong></label>
                    
                    <?php foreach ($sucursales as $sucursal) { ?>
                        
                    <input type="radio" name="id_sucursal" id="id_sucursal" value="<?php echo $sucursal->getId()?>" >
                    <label for="sucursal"><?php echo $sucursal->getDireccion(). $sucursal->getNumero(); ?></label>
                    <?php  } ?>
                    
                    <br>

                    <h5 style="color:red;">Nota: No es necesario elegir sucursal si el envio es a domicilio</h5>

                    <br>

                    <label for="horario"><strong><h5>Seleccione horario de entrega: </h5></strong></label>
                
                    <input type="radio" name="horario" id="maniana" value="0" checked="checked">
                    <label for="maniana">Maniana(9 a.m. a 12 a.m.)</label>

                    <input type="radio" name="horario" id="tarde" value="1">
                    <label for="tarde">Tarde(15 p.m. a 18 p.m.)</label>

                    <br><br>

                    <input type="submit" value="FINALIZAR COMPRA" >
                    <br><br>
                </form>
        </center>
        </th></tr></table>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            var date = new Date();
            var currentMonth = date.getMonth();
            var currentDate = date.getDate();
            var currentYear = date.getFullYear();

            $('#datepicker').datepicker({
                minDate: new Date(currentYear, currentMonth, currentDate),
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php require_once 'footer.php'; ?>