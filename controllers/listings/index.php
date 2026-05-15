<?php

$listings = $db->Query('SELECT * FROM listings')->fetchAll();

loadView('listings/index', ['listings' => $listings]);