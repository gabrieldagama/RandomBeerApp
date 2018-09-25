<?php

namespace RandomBeerApp\Service\Beer;

use Interop\Container\ContainerInterface;
use RandomBeerApp\Helper\PopulateObject;
use RandomBeerApp\Model\Entity\Beer;
use RandomBeerApp\Model\Entity\Beverage;
use RandomBeerApp\Model\Entity\FactoryInterface;
use RandomBeerApp\Repository\BeerRepository;

/**
 * Class BeerService
 * @package RandomBeerApp\Service\Beer
 */
class BeerService
{
    /**
     * @var FactoryInterface
     */
    private $beerFactory;

    /**
     * @var BeerRepository
     */
    private $beerRepository;

    /**
     * @var PopulateObject
     */
    private $populateObj;

    /**
     * BeerService constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->beerFactory = $container->get('beer_factory');
        $this->beerRepository = $container->get('beer_repository');
        $this->populateObj = $container->get('populate_obj');
    }

    /**
     * @param array $data
     * @return bool
     */
    public function createBeer(array $data): bool
    {
        $beer = $this->beerFactory->create();
        $beer = $this->populateObj->populate($beer, $data);
        return $this->beerRepository->insert($beer);
    }

    /**
     * @return Beer
     */
    public function getRandomBeer(): Beer
    {
        $data = $this->beerRepository->getRandomBeer()->toArray()[0];
        $beer = $this->beerFactory->create();
        $beer = $this->populateObj->populate($beer, (array)$data);
        return $beer;
    }
}