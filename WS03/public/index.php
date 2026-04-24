<?php

require_once __DIR__ . '/../helpers.php';

$routes = [
    '/' => 'Controllers/home.php',
    '/listings' => 'Controllers/listings/index.php',
    '/listings/create' => 'Controllers/listings/create.php',
    '404' => 'Controllers/error/404.php'
];

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$basePath = '/WS03/Public';
if (str_starts_with($uri, $basePath)) {
    $uri = substr($uri, strlen($basePath));
}

$uri = $uri ?: '/';

if (array_key_exists($uri, $routes)) {
    require basePath($routes[$uri]);
} else {
    require basePath($routes['404']);
}