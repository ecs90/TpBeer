<?php
require_once 'header.php'; ?>

<center>
<?php foreach ($pedidos as $pedido) : ?>

    <label><b>Fecha Pedido:</b> </label>
    <?php echo $pedido->getFechaPedido(); ?>
    
    <br>
    
    <label><b>Fecha Entrega:</b> </label>
    <?php echo $pedido->getFechaEntrega(); ?>
    
    <br>
    
    <label><b>Estado:</b> </label>
    <?php if ($pedido->getEstado() == Modelos\Pedido::ESTADO_PENDIENTE) : ?>
        Pendiente
    <?php else : ?>
        Entregado
    <?php endif; ?>

    <br>

    <label><b>Tipo Entrega:</b> </label>
    <?php if ($pedido->getTipoEntrega() == Modelos\Pedido::ENTREGA_SUCURSAL) : ?>
        Retira de sucursal
    <?php else : ?>
        Envio a domicilio
    <?php endif; ?>

    <br>

    <label><b>Horario:</b> </label>
    <?php if ($pedido->getHorario() == Modelos\Pedido::HORARIO_MANIANA) : ?>
        De maniana
    <?php else : ?>
        De tarde
    <?php endif; ?>

    <br>

    <table border="1">
        <thead>
            <tr>
                <th>Cerveza</th>
                <th>Envase</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            $lineasPedido = $this->datoLineaPedido->getListaPorPedido($pedido->getId());
            foreach ($lineasPedido as $lineaPedido) :
                $total = $total + $lineaPedido->calcularSubtotal();
            ?>
            <tr>
                <td><?php echo $lineaPedido->getCerveza()->getNombre(); ?></td>
                <td><?php echo $lineaPedido->getEnvase()->getDescripcion(); ?></td>
                <td>x <?php echo $lineaPedido->getCantidad(); ?></td>
                <td>$<?php echo $lineaPedido->getPrecio(); ?> c/u </td>
                <td>$<?php echo $lineaPedido->calcularSubtotal(); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br>

    <label><b>Monto Final:</b> </label>
    $<?php echo $pedido->getMontoFinal(); ?>

<?php endforeach; ?>

</center>
<?php require_once 'footer.php'; ?>