<?php

require __DIR__ . '/../vendor/autoload.php';

use Framework\Kernel;
use Framework\Request;

$kernel = new Kernel();
$router = $kernel->getRouter();

$router->addRoute("GET", "/about", "About page");

$requestMethod = $_SERVER['REQUEST_METHOD'];
$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($urlPath == null) {
    $urlPath = '/';
}

$request = new Request($requestMethod, $urlPath, $_GET, $_POST);

$response = $kernel->handle($request);
$response->echo();
