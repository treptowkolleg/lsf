<?php

use LSR\Router;

require_once 'vendor/autoload.php';
const project_root = __DIR__ . DIRECTORY_SEPARATOR;

$router = new Router();
$router->matchRoute();


