<?php

namespace App\Core;

class Router {
    private $routes = [];

    // Function to add a new route
    public function add($path, $controller, $method) {
        $this->routes[$path] = ['controller' => $controller, 'method' => $method];
    }

    

    // Function to handle the request
    public function dispatch($requestUri) {
        $requestUri = trim(parse_url($requestUri, PHP_URL_PATH), '/');
        echo $requestUri;

        if (array_key_exists($requestUri, $this->routes)) {
            $controllerName = "App\\Controllers\\back\\" . $this->routes[$requestUri]['controller'];
            $method = $this->routes[$requestUri]['method'];
            var_dump("hello");
            

            if (class_exists($controllerName)) {
                $controller = new $controllerName();
                if (method_exists($controller, $method)) {
                    return $controller->$method();
                }
            }
        }

        // If no route is found, show 404
        // http_response_code(404);
        echo "404 - Page Not Found";

    }
}
