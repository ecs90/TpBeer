<body class="InitBody"> 
    <br><br>
    <div class="container">
    <table class="table table-sm">
        <thead>
        <tbody class="bg-dark" style="color: white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Dirección</th>
                <th scope="col">Numero</th>
                <th scope="col">
                    <div class="trans text-center">
                        Modificar
                    </div>
                </th>
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
            <?php foreach ($datos->getListaSucursales() as $sucursal) : ?>
                <tr class="table-active">
                    <th>   
                        <?php echo $sucursal->getID(); ?>
                    </th> 
                    <th>   
                        <?php echo $sucursal->getDireccion(); ?>
                    </th> 
                    <th>
                        <?php echo $sucursal->getNumero(); ?>
                    </th>
                    <th>
                        <div class="trans text-center">
                            <a class="btn btn-warning btn-sm" href="modificarSucursal/<?php echo $sucursal->getId(); ?>">Modificar</a>
                        </div>
                    </th>
                    <th>
                        <div class="trans text-center">
                            <a class="btn btn-danger btn-sm" href="/TpBeer/Sucursal/baja/<?php echo $sucursal->getId(); ?>">Eliminar</a>
                        </div>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </thead>
    </table>
    </div>