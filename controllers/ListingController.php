<?php

class ListingController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index()
    {
        $listings = $this->db->Query('SELECT * FROM listings')->fetchAll();

        loadView('listings/index', ['listings' => $listings]);
    }

    public function create()
    {
        loadView('listings/create');
    }

    public function show($id)
    {
        $listing = $this->db->Query(
            'SELECT * FROM listings WHERE id = :id',
            [':id' => $id]
        )->fetch();

        if (!$listing) {
            $errorController = new ErrorController();
            $errorController->notFound();
            return;
        }

        loadView('listings/show', ['listing' => $listing]);
    }

    public function store()
    {
        $allowedFields = [
            'title', 'description', 'salary', 'requirements',
            'benefits', 'company', 'address', 'city', 'state', 'phone', 'email'
        ];

        $newListing = [];

        foreach ($allowedFields as $field) {
            $newListing[$field] = isset($_POST[$field]) ? sanitize($_POST[$field]) : '';
        }

        $requiredFields = ['title', 'description', 'salary', 'company', 'city', 'state', 'email'];
        $errors = [];

        foreach ($requiredFields as $field) {
            if (empty($newListing[$field])) {
                $errors[] = ucfirst($field) . ' is required.';
            }
        }

        if (!empty($errors)) {
            loadView('listings/create', [
                'errors' => $errors,
                'listing' => $newListing,
            ]);
            return;
        }

        $query = "INSERT INTO listings
            (title, description, salary, requirements, benefits, company, address, city, state, phone, email)
            VALUES
            (:title, :description, :salary, :requirements, :benefits, :company, :address, :city, :state, :phone, :email)";

        $params = [];
        foreach ($newListing as $key => $value) {
            $params[":{$key}"] = $value;
        }

        $this->db->Query($query, $params);

        redirect('/listings');
    }
}