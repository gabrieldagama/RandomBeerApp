<?php

use RandomBeerApp\Controllers\Auth\TokenController;
use RandomBeerApp\Controllers\Beer\RandomController;

// Routes
$app->group('/v1', function () {
    $this->get('/auth/token', TokenController::class, ':execute')->setName('auth.token');
    $this->get('/beer/random', RandomController::class, ':execute')->setName('beer.random');
});