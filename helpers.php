<?php

function inspect($value)
{
    echo '<pre>',
    var_dump($value);
    echo '</pre>';
}

function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}

function loadView($name)
{
    require basePath("Views/{$name}.view.php");
}

function loadPartial($name)
{
    $partialPath = basePath("Views/Partials/{$name}.php");

    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "Partial '{$name}' not found.";
    }
}