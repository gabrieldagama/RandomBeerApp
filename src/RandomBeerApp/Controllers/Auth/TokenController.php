<?php

namespace RandomBeerApp\Controllers\Auth;

use Interop\Container\ContainerInterface;
use RandomBeerApp\Controllers\AbstractController;
use RandomBeerApp\Models\Api\ResponseBodyBuilder;
use RandomBeerApp\Services\Auth\AuthService;
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
     * @var AuthService;
     */
    private $authService;

    /**
     * TokenController constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->authService = $container->get('auth');
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
            'token' => $this->authService->generateToken()
        ]);
        $responseBody = $this->responseBodyBuilder->build();
        $response = $response->withJson($responseBody->toArray(), self::HTTP_CREATED);
        return $response;
    }
}