<?php

use App\Core\Router;

// Create a router instance
$router = new Router();

// Define routes
$router->add('users', 'UserController', 'index'); // /users → UserController@index
$router->add('users/hello', 'UserController', 'say_hello');



return $router;
