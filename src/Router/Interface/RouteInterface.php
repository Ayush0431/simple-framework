<?php

declare(strict_types=1);

namespace SimpleFramework\Router\Interface;

use Closure;

interface RouteInterface
{
    /**
     * Get the value of the route name
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Set the value of the route name
     *
     * @param string $name
     *
     * @return static
     */
    public function setName(string $name): static;

    /**
     * Get the value of the route path
     *
     * @return string
     */
    public function getPath(): string;

    /**
     * Set the value of the route path
     *
     * @param string $path
     *
     * @return static
     */
    public function setPath(string $path): static;

    /**
     * Get the value of the route callable
     *
     * @return Closure|array
     */
    public function getCallable(): Closure|array;

    /**
     * Set the value of the route callable
     *
     * @param Closure|array $callable
     *
     * @return static
     */
    public function setCallable(Closure|array $callable): static;

    /**
     * Get the value of the route parameters
     *
     * @return array
     */
    public function getParameters(): array;

    /**
     * Set the value of the route parameters
     *
     * @param array $parameters
     *
     * @return static
     */
    public function setParameters(array $parameters): static;
}