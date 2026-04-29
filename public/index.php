<?php

require __DIR__ . '/../helpers.php';

require basePath('Router.php');

require basePath('Database.php');

$router = new Router();

$routes = require basePath('routes.php');

$config = require basePath ('config/db.php');

$db = new Database($config);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$base = '/WS03/Public';

if (strpos($uri, $base) === 0) {
    $uri = substr($uri, strlen($base));
}

$uri = $uri === '' ? '/' : $uri;

$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);