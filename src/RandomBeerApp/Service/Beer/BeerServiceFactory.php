<?php

namespace RandomBeerApp\Service\Beer;

use Interop\Container\ContainerInterface;

/**
 * Class BeerServiceFactory
 * @package RandomBeerApp\Service\Beer
 */
class BeerServiceFactory
{
    /**
     * @param ContainerInterface $container
     * @return BeerService
     */
    public static function create(ContainerInterface $container)
    {
        return new BeerService($container);
    }
}