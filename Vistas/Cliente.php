<?php namespace Vistas; 
  require_once 'header.php';
?>
<body class="InitBody bg-img-adm">
<div class="container-fluid admin-header">
  <h1 class="display-4">Usuario</h1><br>
</div>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<a class="navbar-brand" href="#">User</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
	    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Carrito</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="/TpBeer/Pedido/listar">Mostrar</a>
          <a class="dropdown-item" href="/TpBeer/Pedido/alta">Pedir</a>
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