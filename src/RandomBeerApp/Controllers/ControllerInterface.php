<?php

namespace RandomBeerApp\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Interface ControllerInterface
 * @package RandomBeerApp\Controllers
 */
interface ControllerInterface
{
    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function execute(Request $request, Response $response): Response;
}