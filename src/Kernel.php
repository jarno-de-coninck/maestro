<?php

namespace Framework;

class Kernel
{
    private Router $router;
    private ServiceContainer $serviceContainer;

    public function __construct()
    {
        $this->serviceContainer = new ServiceContainer();

        $responseFactory = new ResponseFactory();
        $this->serviceContainer->set(ResponseFactory::class, $responseFactory);

        $this->router = new Router($responseFactory);
    }

    public function handle(Request $request): Response
    {
        return $this->router->dispatch($request);
    }

//    public function getRouter(): Router
//    {
//        return $this->router;
//    }

    public function registerRoutes(RouteProviderInterface $routeProvider): void
    {
        $routeProvider->register($this->router, $this->serviceContainer);
    }

    public function registerServices(ServiceProviderInterface $serviceProvider): void
    {
        $serviceProvider->register($this->serviceContainer);
    }
}
