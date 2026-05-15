<?php

require __DIR__ . '/Database.php';
require __DIR__ . '/Router.php';
require __DIR__ . '/controllers/HomeController.php';
require __DIR__ . '/controllers/ListingController.php';
require __DIR__ . '/controllers/ErrorController.php';

function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}

function loadView($name, $data = [])
{
    extract($data);
    require basePath("Views/{$name}.view.php");
}

function loadPartial($name, $data = [])
{
    extract($data);
    $partialPath = basePath("Views/Partials/{$name}.php");

    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "Partial '{$name}' not found.";
    }
}

function inspect($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

function inspectAndDie($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    die();
}

/**
 * Sanitize data
 * @param string $dirty
 * @return string
 */
function sanitize(string $dirty): string
{
    return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
}

function redirect($path)
{
    $base = defined('BASE_PATH') ? BASE_PATH : '/WS03/Public';
    header("Location: {$base}{$path}");
    exit;
}