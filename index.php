<?php

require('Config/Autoload.php');
require('Config/Config.php');

use Config\Autoload;
use Config\Request;
use Config\Router;

Autoload::start();

$request = new Request();
$router = new Router();

session_start();

$router->direccionar($request);
