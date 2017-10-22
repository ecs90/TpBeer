
<html>

    <body>
        <ul>
    <?php foreach ($this->getListaCervezas() as $cerveza) : ?>
        <li>
            <b>Nombre: <b>: <?php echo $cerveza->getNombre(); ?>
        </li> 
        <li>
            <b>Descripcion: <b>: <?php echo $cerveza->getDescripcion(); ?>
        </li> 
        <li>
            <b>Precio: <b>: <?php echo $cerveza->getPrecio(); ?>
        </li> 
        <li>
            <b>id: <b>: <?php echo $cerveza->getId(); ?>
        </li> 
        <?php echo '--------------------------------------'; ?>
        
        
    <?php endforeach; ?>
        </ul>
    </body>
</html>