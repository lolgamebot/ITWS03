<?php

use Framework\Validation;
use Framework\Session;

class UserController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * Show login page
     * @return void
     */
    public function login()
    {
        loadView('users/login');
    }

    /**
     * Show create page (register)
     * @return void
     */
    public function create()
    {
        loadView('users/create');
    }

    /**
     * Store user to DB
     * @return void
     */
    public function store()
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $city = $_POST['city'] ?? '';
        $state = $_POST['state'] ?? '';
        $password = $_POST['password'] ?? '';
        $passwordConfirmation = $_POST['password_confirmation'] ?? '';

        $errors = [];

        // Validate email
        if (!Validation::email($email)) {
            $errors['email'] = 'Please enter a valid email address.';
        }

        // Validate name
        if (!Validation::string($name, 2, 50)) {
            $errors['name'] = 'Name must be between 2 and 50 characters.';
        }

        // Validate password
        if (!Validation::string($password, 6)) {
            $errors['password'] = 'Password must be at least 6 characters.';
        }

        // Validate password match
        if (!Validation::match($password, $passwordConfirmation)) {
            $errors['password_confirmation'] = 'Passwords do not match.';
        }

        if (!empty($errors)) {
            loadView('users/create', [
                'errors' => $errors,
                'user' => [
                    'name' => $name,
                    'email' => $email,
                    'city' => $city,
                    'state' => $state,
                ],
            ]);
            return;
        }

        // Check if email already exists
        $existingUser = $this->db->Query(
            'SELECT * FROM users WHERE email = :email',
            [':email' => $email]
        )->fetch();

        if ($existingUser) {
            $errors['email'] = 'That email already exists.';
            loadView('users/create', [
                'errors' => $errors,
                'user' => [
                    'name' => $name,
                    'email' => $email,
                    'city' => $city,
                    'state' => $state,
                ],
            ]);
            return;
        }

        // Create user account
        $params = [
            ':name' => $name,
            ':email' => $email,
            ':city' => $city,
            ':state' => $state,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        $this->db->Query(
            'INSERT INTO users (name, email, city, state, password) VALUES (:name, :email, :city, :state, :password)',
            $params
        );

        // Get new user ID and set session
        $userId = $this->db->conn->lastInsertId();

        Session::set('user', [
            'id' => $userId,
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'state' => $state,
        ]);

        redirect('/');
    }

    /**
     * Logout user and kill session
     * @return void
     */
    public function logout()
    {
        Session::clearAll();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 86400, $params['path'], $params['domain']);

        redirect('/');
    }
}