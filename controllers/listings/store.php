<?php

$allowedFields = [
    'title',
    'description',
    'salary',
    'requirements',
    'benefits',
    'company',
    'address',
    'city',
    'state',
    'phone',
    'email',
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
    exit;
}

$query = "INSERT INTO listings
    (title, description, salary, requirements, benefits, company, address, city, state, phone, email)
    VALUES
    (:title, :description, :salary, :requirements, :benefits, :company, :address, :city, :state, :phone, :email)";

$params = [];
foreach ($newListing as $key => $value) {
    $params[":{$key}"] = $value;
}

$db->Query($query, $params);

redirect('/listings');