<?php

namespace RandomBeerApp\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

interface ControllerInterface
{
    public function execute(Request $request, Response $response): Response;
}