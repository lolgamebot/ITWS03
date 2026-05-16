<?php

namespace Framework\Middleware;

use Framework\Session;

class Authorize
{
    /**
     * Check if user is authenticated
     * @return bool
     */
    public function isAuthenticated(): bool
    {
        return Session::has('user');
    }

    /**
     * Handle the user's request
     * @param string $role
     * @return void
     */
    public function handle(string $role): void
    {
        if ($role === 'guest' && $this->isAuthenticated()) {
            redirect('/');
        } elseif ($role === 'auth' && !$this->isAuthenticated()) {
            redirect('/login');
        }
    }
}