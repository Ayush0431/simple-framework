<?php

declare(strict_types=1);

use SimpleFramework\Router\Route;
use SimpleFramework\Router\Router;

require_once '../vendor/autoload.php';

$router = new Router();
$router->add(['GET',], new Route('/', []));
$route = $router->match('GET', '/');
var_dump($route);