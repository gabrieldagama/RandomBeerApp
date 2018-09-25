<?php

namespace RandomBeerApp\Controller\Beer;

use Interop\Container\ContainerInterface;
use RandomBeerApp\Controller\AbstractController;
use RandomBeerApp\Model\Entity\FactoryInterface;
use RandomBeerApp\Repository\RepositoryInterface;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class RandomController
 * @package RandomBeerApp\Controller\Beer
 */
class InsertController extends AbstractController
{

    /**
     * @var FactoryInterface
     */
    private $beerFactory;

    /**
     * @var RepositoryInterface
     */
    private $beerRepository;

    /**
     * InsertController constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->beerFactory = $container->get("beerFactory");
        $this->beerRepository = $container->get('beerRepository');
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function execute(Request $request, Response $response): Response
    {
        /**
         * @ToDo Add body validation
         */
        $parsedBody = $request->getParsedBody();
        $beer = $this->beerFactory->create();
        foreach ($parsedBody as $key => $value) {
            $key = ucfirst($key);
            $beer->{"set{$key}"}($value);
        }
        $result = $this->beerRepository->insert($beer);
        if ($result) {
            $this->responseBodyBuilder->setStatus(self::SUCCESS_STATUS);
            $this->responseBodyBuilder->setMessage('Beer created successfully.');
            $responseBody = $this->responseBodyBuilder->build();
            $response = $response->withJson(
                $this->objectToArrayConverter->convert($responseBody),
                self::HTTP_INTERNAL_SERVER_ERROR
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