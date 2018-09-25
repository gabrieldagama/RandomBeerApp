<?php

namespace RandomBeerApp\Controllers\Auth;

use Interop\Container\ContainerInterface;
use RandomBeerApp\Controllers\AbstractController;
use RandomBeerApp\Models\Api\ResponseBodyBuilder;
use RandomBeerApp\Services\Token\TokenService;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class TokenControler
 * @package RandomBeerApp\Controllers\Auth
 */
class TokenController extends AbstractController
{
    const SUCCESS_MSG = "Token created successfully.";

    /**
     * @var TokenService;
     */
    private $tokenService;

    /**
     * TokenController constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->tokenService = $container->get('token');
    }

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
        $this->responseBodyBuilder->setMessage(self::SUCCESS_MSG);
        $this->responseBodyBuilder->setData([
            'token' => $this->tokenService->generateToken()
        ]);
        $responseBody = $this->responseBodyBuilder->build();
        $response = $response->withJson($responseBody->toArray(), self::HTTP_CREATED);
        return $response;
    }
}