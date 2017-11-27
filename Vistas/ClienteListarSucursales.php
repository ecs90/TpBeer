<body class="InitBody"> 
    <br><br>
    <div class="container">
    <table class="table table-sm">
        <thead>
        <tbody class="bg-dark" style="color: white">
            <tr>
                <th scope="col">Dirección</th>
                <th scope="col">Numero</th>
            </tr>
        </tbody>
        </thead>
        <thead>
        <tbody style="color: black;">
            <?php foreach ($datos->getListaSucursales() as $sucursal) : ?>
                <tr class="table-active">
                    <th>   
                        <?php echo $sucursal->getDireccion(); ?>
                    </th> 
                    <th>
                        <?php echo $sucursal->getNumero(); ?>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </thead>
    </table>
    </div>