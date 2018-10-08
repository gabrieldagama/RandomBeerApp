<?php
declare(strict_types=1);

namespace RandomBeerApp\Controller\Beer;

use Interop\Container\ContainerInterface;
use RandomBeerApp\Controller\AbstractController;
use RandomBeerApp\Service\Beer\BeerService;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class RandomController
 * @package RandomBeerApp\Controller\Beer
 */
class InsertController extends AbstractController
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
        $result = $this->beerService->createBeer($request->getParsedBody());
        if ($result) {
            $this->responseBodyBuilder->setStatus(self::SUCCESS_STATUS);
            $this->responseBodyBuilder->setMessage('Beer created successfully.');
            $responseBody = $this->responseBodyBuilder->build();
            $response = $response->withJson(
                $this->objectToArrayConverter->convert($responseBody),
                self::HTTP_CREATED
            );
            return $response;
        }
        $this->responseBodyBuilder->setStatus(self::ERROR_STATUS);
        $this->responseBodyBuilder->setMessage('There was an error creating beer object.');
        $responseBody = $this->responseBodyBuilder->build();
        $response = $response->withJson(
            $this->objectToArrayConverter->convert($responseBody),
            self::HTTP_INTERNAL_SERVER_ERROR
        );
        return $response;
    }
}