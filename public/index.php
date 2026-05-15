<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../helpers.php';

$config = require basePath('config/db.php');

$db = new Database($config);

$router = new Router();

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));

if ($scriptDir !== '/' && stripos($uri, $scriptDir) === 0) {
    $uri = substr($uri, strlen($scriptDir));
}

$uri = $uri === '' ? '/' : $uri;

$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);