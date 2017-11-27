<body class="InitBody"> 
    <br><br>
    <center><h2>Fecha inicial: <?php echo $fecha; ?> <br>--------------------<br> Fecha final: <?php echo $fechados; ?></h2></center><br>
    <div class="container">
    <table class="table table-sm">
        <thead>
        <tbody class="bg-dark" style="color: white">
            <tr>
                <th scope="col">Cerveza</th>
                <th scope="col">Litros</th>
            </tr>
        </tbody>
        </thead>
        <thead>
        <tbody style="color: black;">
		    <?php for ($i=0; $i<count($cervezas); $i++) { ?>
		        <tr class="table-active">
		            <th>   
		                <?php echo $cervezas[$i]->getNombre(); ?>
		            </th> 
		            <th>   
		                <?php echo $litros[$i]; ?>
		            </th>
		        </tr>
		    <?php }; ?>
        </tbody>
        </thead>
    </table>
    </div>