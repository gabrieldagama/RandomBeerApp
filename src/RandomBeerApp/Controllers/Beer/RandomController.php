<?php

namespace RandomBeerApp\Controllers\Beer;

use RandomBeerApp\Controllers\AbstractController;
use RandomBeerApp\Models\Api\ResponseBodyBuilder;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class RandomController
 * @package RandomBeerApp\Controllers\Auth
 */
class RandomController extends AbstractController
{

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function execute(Request $request, Response $response): Response
    {
        /**
         * @var ResponseBodyBuilder $responseBodyBuilder
         */
        $this->responseBodyBuilder->setStatus(self::SUCCESS_STATUS);
        $this->responseBodyBuilder->setMessage('testing');
        $responseBody = $this->responseBodyBuilder->build();
        $response = $response->withJson($responseBody->toArray(), self::HTTP_OK);
        return $response;
    }
}