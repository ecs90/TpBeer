<?php  
	require_once 'header.php';
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<div class="collapse navbar-collapse" id="navbarsExampleDefault">
	    <ul class="navbar-nav mr-auto">
	        <li class="nav-item active">
	            <a class="navbar-brand" href="#">Admin</a>
	        </li>
	      	<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cervezas</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="/TpBeer/Cerveza/listar">Listar</a>
              <a class="dropdown-item" href="/TpBeer/Cerveza/alta">Agregar</a>
            </div>
          	</li>
          	<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sucursales</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="/TpBeer/Sucursal/listar">Listar</a>
              <a class="dropdown-item" href="/TpBeer/Sucursal/alta">Agregar</a>
            </div>
          	</li>
          	<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Envases</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="/TpBeer/Envase/listar">Listar</a>
              <a class="dropdown-item" href="/TpBeer/Envase/alta">Agregar</a>
            </div>
          	</li>
	    </ul>
    </div>

</nav>

<?php  
	require_once 'footer.php';
?>