<?php  
    require_once 'header.php';
?>
<div class="container col-sm-5 bg-dark text-white" style="margin-top: 20px; opacity: 0.9; color: black"><br>
    <div class="trans text-center">
        <h5 class="display-6">Modificar sucursal</h5><br>
    </div>
    <form action="/TpBeer/Sucursal/guardarCambios" method="post">
        <input type="hidden" name="id" value="<?php echo $sucursal->getId(); ?>" >
        <div class="form-group row">
            <label for="direccion" class="col-sm-4 col-form-label">Dirección</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" id="direccion" name="direccion" value="<?php echo $sucursal->getDireccion(); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="numero" class="col-sm-4 col-form-label">Numero</label>
            <div class="col-sm-8">
                <input class="form-control form-control-sm" type="number"  value="<?php echo $sucursal->getNumero(); ?>" id="numero" name="numero"></input>
            </div>
        </div><br>
        <div class="trans text-center">
            <button type="submit" class="btn btn-light btn-block">Modificar</button>
        </div>
    </form><br>
</div>
<?php  
    require_once 'footer.php';
?>