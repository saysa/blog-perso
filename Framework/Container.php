<?php

namespace Framework;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class Container implements ContainerInterface
{
    /**
     * @var array $registry
     */
    private $registry = [];

    /**
     * @param $id
     * @param callable $callable
     *
     * @return $this
     */
    public function set($id, Callable $callable):Container
    {
        $this->registry[$id] = $callable;

        return $this;
    }

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return mixed No entry was found for **this** identifier.
     * @throws \Exception
     */
    public function get($id)
    {
        if (! $this->has($id)) {
            throw new \Exception('No entry for ' . $id);
        } elseif (! is_callable($this->registry[$id])) {
            throw new \Exception('Error while retrieving the entry');
        } else {
            return $this->registry[$id]();
        }
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * `has($id)` returning true does not mean that `get($id)` will not throw an exception.
     * It does however mean that `get($id)` will not throw a `NotFoundExceptionInterface`.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return bool
     */
    public function has($id)
    {
        return isset($this->registry[$id]);
    }
}