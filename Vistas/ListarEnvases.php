<body class="InitBody"> 
        <br><br>
        <div class="container">
        <table class="table table-sm">
            <thead>
            <tbody class="bg-dark" style="color: white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Volumen</th>
                    <th scope="col">Factor</th>
                    <th scope="col">Descripcion</th>
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
                <?php foreach ($this->getListaEnvases() as $envase) : ?>
                    <tr class="table-active">
                        <th>
                            <?php echo $envase->getId(); ?>
                        </th> 
                        <th>   
                            <?php echo $envase->getVolumen(); ?>
                        </th> 
                        <th>   
                            <?php echo $envase->getFactor(); ?>
                        </th> 
                        <th>
                            <?php echo $envase->getDescripcion(); ?>
                        </th> 
                        <th>
                            <div class="trans text-center">
                                <a class="btn btn-warning btn-sm" href="modificar/<?php echo $envase->getId(); ?>">Modificar</a>
                            </div>
                        </th>
                        <th>
                            <div class="trans text-center">
                                <a class="btn btn-danger btn-sm" href="baja/<?php echo $envase->getId(); ?>">Eliminar</a>
                            </div>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </thead>
        </table>
        </div>