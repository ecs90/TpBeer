<?php  
    require_once 'header.php';
?>
<div class="container col-sm-5 bg-dark text-white" style="margin-top: 20px; opacity: 0.9; color: black"><br>
    <div class="trans text-center">
        <h5 class="display-6">Cargar envase</h5><br>
    </div>
    <form action="/TpBeer/Envase/darDeAlta" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="volumen" class="col-sm-4 col-form-label">Volumen</label>
            <div class="col-sm-8">
                <input class="form-control form-control-sm" type="number" step="0.01" value="0" id="volumen" name="volumen"></input>
            </div>
        </div>
        <div class="form-group row">
            <label for="factor" class="col-sm-4 col-form-label">Factor</label>
            <div class="col-sm-8">
                <input class="form-control form-control-sm" type="number" step="0.01" value="0" id="factor" name="factor"></input>
            </div>
        </div>
        <div class="form-group row">
            <label for="descripcion" class="col-sm-4 col-form-label">Descripcion</label>
            <div class="col-sm-8">
                <textarea class="form-control form-control-sm" id="descripcion" name="descripcion" rows="5"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="imagen" class="col-sm-4 col-form-label">Imagen</label>
            <div class="col-sm-8">
                <input class="form-control form-control-sm" type="file" id="imagen" name="imagen" accept=".jpg, .jpeg, .png"></input>
            </div>
        </div><br>
        <div class="trans text-center">
            <button type="submit" class="btn btn-light btn-block">Cargar</button>
        </div>
    </form><br>
</div>
<?php  
    require_once 'footer.php';
?>
