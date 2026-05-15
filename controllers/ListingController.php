<?php

use Framework\Validation;

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

    /**
     * Store data in database
     * @return void
     */
    public function store()
    {
        $allowedFields = [
            'title', 'description', 'salary', 'tags',
            'company', 'address', 'city', 'state',
            'phone', 'email', 'requirements', 'benefits'
        ];

        $newListingData = array_intersect_key($_POST, array_flip($allowedFields));

        $newListingData['user_id'] = 1;

        $newListingData = array_map('sanitize', $newListingData);

        $requiredFields = ['title', 'description', 'salary', 'email', 'city', 'state'];

        $errors = [];

        foreach ($requiredFields as $field) {
            if (!Validation::string($newListingData[$field] ?? '')) {
                $errors[] = ucfirst($field) . ' is required.';
            }
        }

        if (!empty($newListingData['email']) && !Validation::email($newListingData['email'])) {
            $errors[] = 'Please enter a valid email address.';
        }

        if (!empty($errors)) {
            loadView('listings/create', [
                'errors' => $errors,
                'listing' => $newListingData,
            ]);
            return;
        }

        // Build dynamic query
        $fields = implode(', ', array_keys($newListingData));
        $values = implode(', ', array_map(fn($f) => ":{$f}", array_keys($newListingData)));

        $query = "INSERT INTO listings ({$fields}) VALUES ({$values})";

        $params = [];
        foreach ($newListingData as $key => $value) {
            $params[":{$key}"] = $value;
        }

        $this->db->Query($query, $params);

        redirect('/listings');
    }

    /**
     * Delete a listing
     * @param string $id
     * @return void
     */
    public function destroy($id)
    {
        $params = [':id' => $id];

        $listing = $this->db->Query(
            'SELECT * FROM listings WHERE id = :id',
            $params
        )->fetch();

        if (!$listing) {
            $errorController = new ErrorController();
            $errorController->notFound();
            return;
        }

        $this->db->Query('DELETE FROM listings WHERE id = :id', $params);

        $_SESSION['success_message'] = 'Listing deleted successfully.';

        redirect('/listings');
    }
}