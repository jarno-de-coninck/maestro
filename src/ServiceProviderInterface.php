<?php

namespace Framework;

interface ServiceProviderInterface
{
    /**
     * @param ServiceContainer $container
     * @return void
     */
    public function register(ServiceContainer $container): void;
}
