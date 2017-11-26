<?php
  use Modelos\Usuario;
  use Controladores\LoginControlador;
  $usuario = LoginControlador::getUsuarioLogueado(); 
  require_once 'header.php';
?>
<body class="InitBody bg-img-adm">
<div class="container-fluid admin-header">
  <h1 class="display-4">Cliente</h1><br>
</div>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<a class="navbar-brand" href="#"><?php echo $usuario->getUsername();  ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/TpBeer/cliente/listarCerveza">Cervezas</a>
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item  float-left">
        <a class="nav-link active" href="/TpBeer/cliente/mostrarCarrito">Carrito<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item  float-left">
        <a class="nav-link active" href="../Usuario/LogOut">LogOut<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
<?php  
	require_once 'footer.php';
?>