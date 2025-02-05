<?php

namespace App\core;

use App\core\Controller;

class Router extends Controller{
    protected $routes = [];


    private function addRoute($route, $controller, $action, $method)
    {
        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];  
    }

    public function get($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "GET");
    }

    public function post($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "POST");
    }

    public function dispatch()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        var_dump($uri); // /article
        $method =  $_SERVER['REQUEST_METHOD']; // GET
        // print_r($this->routes);
        // /article, get
        if (array_key_exists($uri, $this->routes[$method])) {
            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];
            // var_dump($controller);
            // var_dump($action);

            $controller = new $controller(); // $articles = new articleController;
            // var_dump($controller);
            $controller->$action(); // $articles->home();
            // var_dump($action);
        } else {
            $this->render('404');
            
        }
    }
}