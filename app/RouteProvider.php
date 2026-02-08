<?php

namespace App;

use App\Controllers\HomeController;
use App\Controllers\TaskController;
use Framework\RouteProviderInterface;
use Framework\Router;
use Framework\ServiceContainer;

class RouteProvider implements RouteProviderInterface
{
    public function register(Router $router, ServiceContainer $serviceContainer): void
    {
        /** @var HomeController $homeController */
        $homeController = $serviceContainer->get(HomeController::class);

        /** @var TaskController $taskController */
        $taskController = $serviceContainer->get(TaskController::class);

        $router->addRoute('GET', '/', [$homeController, 'index']);
        $router->addRoute('GET', '/about', [$homeController, 'about']);

        $router->addRoute('GET', '/tasks', [$taskController, 'index']);
        $router->addRoute('GET', '/tasks/create', [$taskController, 'create']);
    }
}
