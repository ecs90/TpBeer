<!DOCTYPE html>
<html>
<head>
	<title>Armar pedido</title>
</head>
<body>
    <center>
    <form action="../pedido/darDeAlta" method="post">
        <label><b>Cervezas:</b> </label>
        <select name="id_cerveza">
            <?php foreach ($this->getListaCervezas() as $cerveza) : ?>
            <option value="<?php echo $cerveza->getId(); ?>">
                <?php echo $cerveza->getNombre(); ?> ($<?php echo $cerveza->getPrecio(); ?>)   
            </option>
            <?php endforeach; ?>
        </select>
        <br>
	   
        <label><b>Envases:</b> </label>
        <select name="id_envase">
        <?php foreach ($this->getListaEnvases() as $envase) : ?>
            <option value="<?php echo $envase->getId(); ?>">
                <?php echo $envase->getDescripcion(); ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br><br>

        <label><b>Cantidad:</b> </label>
        <select name="cantidad">
            <?php for ($i=1; $i <= 20; $i++): ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php endfor; ?>
        </select>
        <br><br>

        <input type="submit" value="Agregar al pedido">
        </form>

        <?php
            $carrito = $this->getCarrito();
            if (!empty($carrito)) : ?>
            <br>
            <label><b>Carrito</b> </label>
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
                    foreach ($carrito as $lineaPedido) :
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
            <label><strong>TOTAL: <?php echo $total; ?></strong></label>
            <br><br><br>

            <form action="../pedido/finalizar" method="post">
                
                <input type="hidden" name="monto_final" value="<?php echo $total; ?>" >

                <label for="fecha_entrega"><strong>Fecha de entrega: </strong></label>
                <input type="date" id="fecha_entrega" name="fecha_entrega" required="required" /> 
                <br>

                <label for="tipo_entrega"><strong>Tipo de entrega: </strong></label>
                
                <input type="radio" name="tipo_entrega" id="sucursal" value="0" >
                <label for="tipo_entrega">Retiro de sucursal</label>

                <input type="radio" name="tipo_entrega" id="domicilio" value="1" checked="checked">
                <label for="domicilio">Envio a Domicilio</label>
                
                <br>

                <label for="horario"><strong>Seleccione horario de entrega: </strong></label>
            
                <input type="radio" name="horario" id="maniana" value="0" checked="checked">
                <label for="maniana">Maniana(9 a.m. a 12 a.m.)</label>

                <input type="radio" name="horario" id="tarde" value="1">
                <label for="tarde">Tarde(15 p.m. a 18 p.m.)</label>

                <br><br>

                <input type="submit" value="FINALIZAR COMPRA" >
                <br><br>
            </form>
        <?php endif; ?>
    </center>
</body>
</html>