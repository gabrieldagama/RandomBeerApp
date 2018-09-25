<?php

namespace RandomBeerApp\Repository;

use Interop\Container\ContainerInterface;

/**
 * Class BeerRepository
 * @package RandomBeerApp\Repository
 */
class BeerRepository extends AbstractRepository implements RepositoryInterface
{
    const COLLECTION_NAME = 'beers';

    /**
     * BeerRepository constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        parent::__construct(
            $container,
            self::COLLECTION_NAME,
            $container->get('beer_factory')
        );
    }

    /**
     * @return \Traversable
     */
    public function getRandomBeer()
    {
        return $this->getCollection()->aggregate([[
            '$sample' => ['size' => 1]
        ]]);
    }
}