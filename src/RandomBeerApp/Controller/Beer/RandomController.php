<?php

namespace RandomBeerApp\Controller\Beer;

use RandomBeerApp\Controller\AbstractController;
use RandomBeerApp\Model\Api\ResponseBodyBuilder;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class RandomController
 * @package RandomBeerApp\Controller\Beer
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
        $response = $response->withJson(
            $this->objectToArrayConverter->convert($responseBody),
            self::HTTP_INTERNAL_SERVER_ERROR
        );
        return $response;
    }
}