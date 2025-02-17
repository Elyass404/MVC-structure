<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Config\Connection;
use App\Core\Router;

// Load the routes
$router = require __DIR__ . '/../app/config/routes.php';

// Get the requested URL
$requestUri = $_SERVER['REQUEST_URI'];

// Dispatch the request
$router->dispatch($requestUri);


