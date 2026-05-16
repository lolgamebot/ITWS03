<?php

use Framework\Validation;
use Framework\Session;
use Framework\Authorization;

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
        $listings = $this->db->Query(
            'SELECT * FROM listings ORDER BY created_at DESC'
        )->fetchAll();

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
     * Show edit form
     * @param string $id
     * @return void
     */
    public function edit($id)
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

        loadView('listings/edit', ['listing' => $listing]);
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

        $newListingData['user_id'] = Session::get('user')['id'];

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

        $fields = implode(', ', array_keys($newListingData));
        $values = implode(', ', array_map(fn($f) => ":{$f}", array_keys($newListingData)));

        $query = "INSERT INTO listings ({$fields}) VALUES ({$values})";

        $params = [];
        foreach ($newListingData as $key => $value) {
            $params[":{$key}"] = $value;
        }

        $this->db->Query($query, $params);

        Session::setFlash('success_message', 'Listing created successfully.');

        redirect('/listings');
    }

    /**
     * Update listing in database
     * @param string $id
     * @return void
     */
    public function update($id)
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

        // Authorization check
        if (!Authorization::isOwner($listing['user_id'])) {
            Session::setFlash('error_message', 'You are not authorized to update this listing.');
            redirect('/listings/' . $id);
            return;
        }

        $allowedFields = [
            'title', 'description', 'salary', 'tags',
            'company', 'address', 'city', 'state',
            'phone', 'email', 'requirements', 'benefits'
        ];

        $updatedValues = array_intersect_key($_POST, array_flip($allowedFields));
        $updatedValues = array_map('sanitize', $updatedValues);

        $requiredFields = ['title', 'description', 'salary', 'email', 'city', 'state'];
        $errors = [];

        foreach ($requiredFields as $field) {
            if (!Validation::string($updatedValues[$field] ?? '')) {
                $errors[] = ucfirst($field) . ' is required.';
            }
        }

        if (!empty($errors)) {
            loadView('listings/edit', [
                'listing' => $listing,
                'errors' => $errors,
            ]);
            return;
        }

        $setClauses = implode(', ', array_map(fn($f) => "{$f} = :{$f}", array_keys($updatedValues)));
        $query = "UPDATE listings SET {$setClauses} WHERE id = :id";

        $params = [':id' => $id];
        foreach ($updatedValues as $key => $value) {
            $params[":{$key}"] = $value;
        }

        $this->db->Query($query, $params);

        Session::setFlash('success_message', 'Listing updated successfully.');

        redirect('/listings/' . $id);
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

        // Authorization check
        if (!Authorization::isOwner($listing['user_id'])) {
            Session::setFlash('error_message', 'You are not authorized to delete this listing.');
            redirect('/listings/' . $id);
            return;
        }

        $this->db->Query('DELETE FROM listings WHERE id = :id', $params);

        Session::setFlash('success_message', 'Listing deleted successfully.');

        redirect('/listings');
    }
}