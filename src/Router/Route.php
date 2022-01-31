<?php

declare(strict_types=1);

namespace SimpleFramework\Router;

use Closure;
use SimpleFramework\Router\Interface\RouteInterface;

class Route implements RouteInterface
{
    public function __construct(
        protected string $path,
        protected Closure|array $callable,
        protected array $parameters = [],
        protected string $name = '',
    ) {}

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @inheritDoc
     */
    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCallable(): Closure|array
    {
        return $this->callable;
    }

    /**
     * @inheritDoc
     */
    public function setCallable(Closure|array $callable): static
    {
        $this->callable = $callable;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @inheritDoc
     */
    public function setParameters(array $parameters): static
    {
        $this->parameters = $parameters;

        return $this;
    }
}