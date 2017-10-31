<?php

require('Config/Autoload.php');
require('Config/Config.php');

use Config\Autoload;
use Config\Request;
use Config\Router;

Autoload::start();

$request = new Request();
$router = new Router();

require_once 'Vistas/header.php';

$router->direccionar($request);

require_once 'Vistas/footer.php';

?>

