<?php

declare(strict_types=1);

namespace SimpleFramework\Router\Interface;

use SimpleFramework\Router\Exception\RouteNotFoundException;
use SimpleFramework\Router\Exception\RouterException;

interface RouterInterface
{
    /**
     * Add the given route to the routing table
     *
     * @param RouteInterface $route
     * @param array $methods
     * @return void
     * 
     * @throws RouterException
     */
    public function add(array $methods, RouteInterface $route): void;

    /**
     * Returns a route if there is a route that matches the given uri
     * other ways it returns null
     *
     * @param string $method
     * @param string $uri
     * @return RouteInterface|null
     * 
     * @throws RouteNotFoundException
     * @throws RouterException
     */
    public function match(string $method, string $uri): RouteInterface;
}