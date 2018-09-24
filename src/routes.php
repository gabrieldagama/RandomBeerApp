<?php

use Slim\Http\Request;
use Slim\Http\Response;
use RandomBeerApp\Controllers\Auth\TokenController;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
$app->group('/v1', function () {
    $this->get('/auth/token', TokenController::class, ':execute')->setName('auth.token');
});