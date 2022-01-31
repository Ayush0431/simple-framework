<?php

declare(strict_types=1);

namespace SimpleFramework\Router;

use SimpleFramework\Router\Exception\RouteNotFoundException;
use SimpleFramework\Router\Exception\RouterException;
use SimpleFramework\Router\Interface\RouteInterface;
use SimpleFramework\Router\Interface\RouterInterface;

class Router implements RouterInterface
{
    /**
     * Collection of routes
     *
     * @var array<string,array<RouteInterface>>
     */
    protected array $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'PATCH' => [],
        'DELETE' => [],
    ];

    /**
     * @inheritDoc
     */
    public function add(array $methods, RouteInterface $route): void
    {
        foreach ($methods as $method) {
            $this->verifyMethod($method);
            array_push($this->routes[$method], $route);
        }
    }

    /**
     * @inheritDoc
     */
    public function match(string $method, string $uri): RouteInterface
    {
        $this->verifyMethod($method);

        foreach ($this->routes[$method] as $route) {
            if (preg_match('#^' . $route->getPath() . '$#', $uri, $matches)) {
                $route->setParameters($matches);

                return $route;
            }
        }

        throw new RouteNotFoundException("No route found for {$method} '{$uri}'");
    }

    /**
     * Verify if the router supports the given method
     *
     * @param string $method
     * @return void
     * 
     * @throws RouterException
     */
    protected function verifyMethod(string $method): void
    {
        if (!isset($this->routes[$method])) {
            throw new RouterException("Unsupported method '{$method}'");
        }
    }
}