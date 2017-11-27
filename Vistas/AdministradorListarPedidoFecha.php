<body class="InitBody"> 
    <br><br>
    <center><h2>Fecha: <?php echo $fecha; ?></h2></center>
    <?php $i = 1; ?>
    <?php foreach ($listaPedidos as $pedido) { ?>
    <br><br>
    <center><label><h2>Pedido <?php echo $i; ?> - Monto: $<?php echo $pedido->getMontoFinal() ?> - Cliente: <?php echo $pedido->getUsuario()->getUsername() ?></h2></label></center>
    <div class="trans text-center">
        <a class="btn btn-danger btn-sm align-center" href="/TpBeer/pedido/eliminarPedido/<?php echo $pedido->getId(); ?>">Eliminar</a>
    </div><br>
    <div class="container">
    <table class="table table-sm"><tr><th>
    <center>

        <label><b>Fecha Entrega:</b> </label>
        <?php echo $pedido->getFechaEntrega(); ?>
        
        <br>
        
        <label><b>Estado:</b> </label>
        <?php if ($pedido->getEstado() == 0) { ?>
            Solicitado
        <?php }; ?>
        <?php if ($pedido->getEstado() == 1) { ?>
            Precesado
        <?php }; ?>
        <?php if ($pedido->getEstado() == 2) { ?>
            Enviado
        <?php }; ?>
        <?php if ($pedido->getEstado() == 3) { ?>
            Finalizado
        <?php }; ?>

        <br>

        <form action="/TpBeer/pedido/modificarEstadoFecha" method="post">

                    <input type="hidden" name="id" value="<?php echo $pedido->getId(); ?>" >
                    <input type="hidden" name="fecha" value="<?php echo $pedido->getFechaEntrega(); ?>" >

                    <label for="estado"><strong><h5>Cambiar estado: </h5></strong></label>
                
                    <input type="radio" name="estado" id="solicitado" value="0" checked="checked">
                    <label for="solicitado">Solicitado</label>

                    <input type="radio" name="estado" id="procesado" value="1">
                    <label for="procesado">Procesado</label>

                    <input type="radio" name="estado" id="enviado" value="2">
                    <label for="enviado">Enviado</label>

                    <input type="radio" name="estado" id="finalizado" value="3">
                    <label for="finalizado">Finalizado</label>

                    <input type="submit" value="Cambiar" >
        </form>

        <label><b>Tipo Entrega:</b> </label>
        <?php if ($pedido->getTipoEntrega() == 0) : ?>
            Retira de sucursal
        <?php else : ?>
            Envio a domicilio
        <?php endif; ?>

        <br>

        <label><b>Sucursal:</b> </label>
        <?php echo $pedido->getSucursal()->getDireccionCompleta(); ?>

        <br>

    </center>
    </th></tr></table>
    <div class="container">
    <table class="table table-sm">
        <thead>
        <tbody class="bg-dark" style="color: white">
            <tr>
                <th scope="col">Cerveza</th>
                <th scope="col">Envase</th>
                <th scope="col">Cantidad</th>
                <th scope="col">MontoParcial</th>
            </tr>
        </tbody>
        </thead>
        <thead>
        <tbody style="color: black;">
            <?php foreach ($pedido->getLineaPedido() as $linea) { ?>
                <tr class="table-active">
                    <th>   
                        <?php echo $linea->getCerveza()->getNombre(); ?>
                    </th> 
                    <th>   
                        <?php echo $linea->getEnvase()->getDescripcion(); ?>
                    </th> 
                    <th>
                        <?php echo $linea->getCantidad(); ?>
                    </th> 
                    <th>
                        <?php echo $linea->getPrecio(); ?>
                    </th>
                </tr>
            <?php }; ?>
        </tbody>
        </thead>
    </table>
    </div>
<?php $i = $i + 1; }; ?>