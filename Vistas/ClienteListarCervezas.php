<body class="InitBody"> 
        <br><br>
        <div class="container">
        <table class="table table-sm">
            <thead>
            <tbody class="bg-dark" style="color: white">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Envase</th>
                    <th scope="col">
                        <div class="trans text-center">
                            Cantidad
                        </div>
                    </th>
                    <th scope="col">
                        <div class="trans text-center">
                            Encargar
                        </div>
                    </th>
                </tr>
            </tbody>
            </thead>
            <thead>
            <tbody style="color: black;">
                <?php foreach ($datos->getListaCervezas() as $cerveza){
                    foreach ($cerveza->getEnvases() as $envase){?>
                    <form action="/TpBeer/pedido/agregarLinea" method="post">
                    <input type="hidden" name="cerveza" value="<?php echo $cerveza->getId(); ?>" >
                    <input type="hidden" name="envase" value="<?php echo $envase->getId(); ?>" >
                    <input type="hidden" name="precio" value="<?php echo ($cerveza->getPrecio()*$envase->getFactor()); ?>" >
                    <tr class="table-active">
                        <th>   
                            <div class="trans text-center">
                                <?php echo $cerveza->getNombre(); ?><br>
                                <img src="../<?php echo $cerveza->getImagen(); ?>" style="height:100px; width: 100px; ">
                            </div>
                        </th> 
                        <th>
                            <?php echo $cerveza->getDescripcion(); ?>
                        </th> 
                        <th>
                            <?php echo ($cerveza->getPrecio()*$envase->getFactor()); ?>
                        </th> 
                        <th>
                            <div class="trans text-center">
                                <?php echo $envase->getDescripcion(); ?><br>
                                <img src="../<?php echo $envase->getImagen(); ?>" style="height:100px; width: 100px; ">
                            </div>
                        </th>
                        <th>
                            <div class="trans text-center">
                            <input type="number" name="cantidad" min="1" max="20" required>
                            </div>
                        </th>
                        <th>
                            <div class="trans text-center">
                                <button type="submit" class="btn btn-success" style="color:black;">Encargar</button>
                            </div>
                        </th>
                    </tr>
                    </form>
                <?php }}; ?>
            </tbody>
            </thead>
        </table>
        </div>