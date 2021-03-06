<?php

use Slim\Http\Request;
use Slim\Http\Response;
use RandomBeerApp\Controller\Auth\TokenController;
use RandomBeerApp\Controller\Beer\RandomController;
use RandomBeerApp\Controller\Beer\InsertController;

// API routes
$app->group('/v1', function () {
    $this->get('/auth/token', TokenController::class)->setName('auth.token');
    $this->get('/beer/random', RandomController::class)->setName('beer.random');
    $this->post('/beer/insert', InsertController::class)->setName('beer.insert');
});
