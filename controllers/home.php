<?php

$listings = $db->Query('SELECT * FROM listings LIMIT 6')->fetchAll();

loadView('home', ['listings' => $listings]);