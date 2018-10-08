<?php
declare(strict_types=1);

namespace RandomBeerApp\Service\Beer;

use Interop\Container\ContainerInterface;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class BeerServiceProvider
 * @package RandomBeerApp\Service\Beer
 */
class BeerServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $pimple
     */
    public function register(Container $pimple)
    {
        $pimple['beer_service'] = function (ContainerInterface $c) {
            return BeerServiceFactory::create($c);
        };
    }
}