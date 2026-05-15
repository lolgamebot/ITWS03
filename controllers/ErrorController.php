<?php

class ErrorController
{
    public function notFound()
    {
        http_response_code(404);
        loadView('error/404');
    }

    public function forbidden()
    {
        http_response_code(403);
        loadView('error/403');
    }
}