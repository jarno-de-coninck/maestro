<?php

namespace Framework;

class ServiceContainer
{
    /** @var object[] */
    private array $instances;

    /**
     * @param string $id
     * @param object $object
     * @return void
     */
    public function set(string $id, object $object): void
    {
        $this->instances[$id] = $object;
    }

    /**
     * @param string $id
     * @return object
     */
    public function get(string $id): object
    {
        return $this->instances[$id];
    }
}