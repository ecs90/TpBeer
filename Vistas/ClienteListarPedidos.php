<body class="InitBody"> 
    <?php $i = 1; ?>
    <?php foreach ($listaPedidos as $pedido) { ?>
    <br><br>
    <center><label><h2>Pedido <?php echo $i; ?> - Monto: $<?php echo $pedido->getMontoFinal() ?></h2></label></center>
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
            Precosado
        <?php }; ?>
        <?php if ($pedido->getEstado() == 2) { ?>
            Enviado
        <?php }; ?>
        <?php if ($pedido->getEstado() == 3) { ?>
            Finalizado
        <?php }; ?>

        <br>

        <label><b>Tipo Entrega:</b> </label>
        <?php if ($pedido->getTipoEntrega() == 0) : ?>
            Retira de sucursal
        <?php else : ?>
            Envio a domicilio
        <?php endif; ?>

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