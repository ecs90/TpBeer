<body class="InitBody"> 
        <br><br>
        <div class="container">
        <table class="table table-sm">
            <thead>
            <tbody class="bg-dark" style="color: white">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Domicilio</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">User</th>
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
                <?php foreach ($datos->getListaUsuarios() as $usuario) : ?>
                    <tr class="table-active">
                        <th>   
                            <?php echo $usuario->getNombre(); ?>
                        </th> 
                        <th>   
                            <?php echo $usuario->getApellido(); ?>
                        </th> 
                        <th>
                            <?php echo $usuario->getDomicilio(); ?>
                        </th> 
                        <th>
                            <?php echo $usuario->getTelefono(); ?>
                        </th> 
                        <th>
                            <?php echo $usuario->getEmail(); ?>
                        </th> 
                        <th>
                            <?php echo $usuario->getUsername(); ?>
                        </th> 
                        <th>
                            <div class="trans text-center">
                                <a class="btn btn-warning btn-sm" href="modificarUsuario/<?php echo $usuario->getId(); ?>">Modificar</a>
                            </div>
                        </th>
                        <th>
                            <div class="trans text-center">
                                <a class="btn btn-danger btn-sm" href="/TpBeer/Usuario/baja/<?php echo $usuario->getId(); ?>">Eliminar</a>
                            </div>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </thead>
        </table>
        </div>