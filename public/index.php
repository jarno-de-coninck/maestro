<?php

require __DIR__ . '/../vendor/autoload.php';

use Framework\Kernel;
use Framework\Request;

$requestMethod = $_SERVER['REQUEST_METHOD'];
$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($urlPath == null) {
    $urlPath = '/';
}
$request = new Request($requestMethod, $urlPath, $_GET, $_POST);

$kernel = new Kernel();
$response = $kernel->handle($request);

$response->echo();
