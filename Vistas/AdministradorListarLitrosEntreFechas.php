<body class="InitBody"> 
    <br><br>
    <center><h2>Fecha inicial: <?php echo $fecha; ?></h2></center>
    <br><br>
    <center><h2>Fecha final: <?php echo $fechados; ?></h2></center>
    <?php $i = 0; ?>
    <?php foreach ($cervezas as $cerveza) { ?>
    <br><br>
    <center><label><h2>Cerveza <?php echo $i+1; ?> - Nombre: $<?php echo $cerveza->getNombre() ?> - Litros vendidos: <?php echo $litros[$i] ?></h2></label></center>
    <?php }; ?>