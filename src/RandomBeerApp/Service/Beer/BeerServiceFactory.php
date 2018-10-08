<?php
declare(strict_types=1);

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
    public static function create(ContainerInterface $container): BeerService
    {
        return new BeerService($container);
    }
}