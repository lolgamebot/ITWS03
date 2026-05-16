<?php

use Framework\Middleware\Authorize;

class Router
{
    protected $routes = [];

    public function registerRoutes($method, $uri, $controller, $middleware = [])
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'middleware' => $middleware,
        ];
    }

    /**
     * Add GET route
     * @param string $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     */
    public function get($uri, $controller, $middleware = [])
    {
        $this->registerRoutes('GET', $uri, $controller, $middleware);
    }

    /**
     * Add POST route
     * @param string $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     */
    public function post($uri, $controller, $middleware = [])
    {
        $this->registerRoutes('POST', $uri, $controller, $middleware);
    }

    /**
     * Add PUT route
     * @param string $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     */
    public function put($uri, $controller, $middleware = [])
    {
        $this->registerRoutes('PUT', $uri, $controller, $middleware);
    }

    /**
     * Add DELETE route
     * @param string $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     */
    public function delete($uri, $controller, $middleware = [])
    {
        $this->registerRoutes('DELETE', $uri, $controller, $middleware);
    }

    /**
     * Load error page
     * @param int $httpCode
     * @return void
     */
    public function error($httpCode = 404)
    {
        http_response_code($httpCode);
        loadView("error/{$httpCode}");
        exit;
    }

    /**
     * Route the request to the appropriate controller
     * @param string $uri
     * @param string $method
     * @return void
     */
    public function route($uri, $method)
    {
        // Check for method override via hidden _method input
        if ($method === 'POST' && isset($_POST['_method'])) {
            $method = strtoupper($_POST['_method']);
        }

        foreach ($this->routes as $route) {
            $pattern = '#^' . preg_replace('/\{[^}]+\}/', '([^/]+)', $route['uri']) . '$#';

            if (preg_match($pattern, $uri, $matches) && $route['method'] === $method) {
                array_shift($matches);

                // Run middleware
                foreach ($route['middleware'] as $mw) {
                    (new Authorize())->handle($mw);
                }

                [$controller, $action] = explode('@', $route['controller']);

                if (class_exists($controller)) {
                    $controllerInstance = new $controller();
                    if (method_exists($controllerInstance, $action)) {
                        $controllerInstance->$action(...$matches);
                        return;
                    }
                }

                require basePath($route['controller']);
                return;
            }
        }
        $this->error();
    }
}