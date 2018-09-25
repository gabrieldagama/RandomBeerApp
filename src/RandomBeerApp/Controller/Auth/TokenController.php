<?php

namespace RandomBeerApp\Controller\Auth;

use Interop\Container\ContainerInterface;
use RandomBeerApp\Controller\AbstractController;
use RandomBeerApp\Model\Api\ResponseBodyBuilder;
use RandomBeerApp\Service\Token\BeerService;
use RandomBeerApp\Service\Token\TokenService;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class TokenController
 * @package RandomBeerApp\Controller\Auth
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
        $this->tokenService = $container->get('token_service');
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
        $response = $response->withJson($this->objectToArrayConverter->convert($responseBody), self::HTTP_CREATED);
        return $response;
    }
}