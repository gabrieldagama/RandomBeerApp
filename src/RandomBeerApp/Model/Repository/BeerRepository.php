<?php

namespace RandomBeerApp\Model\Repository;

use Interop\Container\ContainerInterface;

class BeerRepository extends AbstractRepository implements RepositoryInterface
{
    const COLLECTION_NAME = 'beers';

    public function __construct(ContainerInterface $container)
    {
        parent::__construct(
            $container,
            self::COLLECTION_NAME,
            $container->get('beerFactory')
        );
    }
}