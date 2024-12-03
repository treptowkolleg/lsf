<?php

namespace LSR;

use LSR\Controller\AppController;

class Router
{

    public function getRoutes(): array
    {
        return [
            ['GET', '/', AppController::class, 'index'],
            ['GET', '/presentation', AppController::class, 'presentation'],
        ];
    }

    public function matchRoute(): void
    {
        $requestMethod = strtoupper($_SERVER['REQUEST_METHOD']);
        $url = parse_url($_SERVER['REQUEST_URI']);
        $request = explode('/', rtrim($url['path'],'/'));
        $foundRoute = $this->getRoutes()[0];
        foreach ($this->getRoutes() as $route) {
            $matchingRoute = explode('/', $route[1]);
            if($route[0] === $requestMethod and $matchingRoute === $request) {
                $foundRoute = $route;
                break;
            }
        }

        $className = $foundRoute[2];
        $controller = new $className();
        if(method_exists($controller, $method = $foundRoute[3])){
            echo $controller->$method();
        } else {
            echo "Route not found";
        }
    }

}