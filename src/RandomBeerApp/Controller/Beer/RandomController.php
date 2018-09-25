<?php

namespace RandomBeerApp\Controller\Beer;

use Interop\Container\ContainerInterface;
use RandomBeerApp\Controller\AbstractController;
use RandomBeerApp\Model\Api\ResponseBodyBuilder;
use RandomBeerApp\Service\Beer\BeerService;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class RandomController
 * @package RandomBeerApp\Controller\Beer
 */
class RandomController extends AbstractController
{
    /**
     * @var BeerService
     */
    private $beerService;

    /**
     * InsertController constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->beerService = $container->get("beer_service");
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function execute(Request $request, Response $response): Response
    {
        $beer = $this->beerService->getRandomBeer();
        /**
         * @var ResponseBodyBuilder $responseBodyBuilder
         */
        $this->responseBodyBuilder->setStatus(self::SUCCESS_STATUS);
        $this->responseBodyBuilder->setMessage('Random Beer returned.');
        $this->responseBodyBuilder->setData($this->objectToArrayConverter->convert($beer));
        $responseBody = $this->responseBodyBuilder->build();
        $response = $response->withJson(
            $this->objectToArrayConverter->convert($responseBody),
            self::HTTP_OK
        );
        return $response;
    }
}