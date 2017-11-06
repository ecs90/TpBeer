<?php namespace Vistas; 
  require_once 'header.php';
  use Modelos\Usuario;
  use Controladores\LoginControlador;
  $usuario = LoginControlador::getUsuarioLogueado();
?>
<body class="InitBody bg-img-adm">
<div class="container-fluid admin-header">
  <h1 class="display-4">Administración</h1><br>
</div>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<a class="navbar-brand" href="#"><?php echo $usuario->getUsername();  ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
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
    <ul class="navbar-nav">
      <li class="nav-item  float-right">
        <a class="nav-link active" href="../Usuario/LogOut">LogOut<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<?php  
	require_once 'footer.php';
?>