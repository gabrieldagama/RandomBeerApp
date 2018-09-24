<?php

namespace RandomBeerApp\Services\Auth;

use Interop\Container\ContainerInterface;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class AuthServiceProvider
 * @package RandomBeerApp\Services\Auth
 */
class AuthServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $pimple
     */
    public function register(Container $pimple)
    {
        $pimple['auth'] = function (ContainerInterface $c) {
            return AuthServiceFactory::create($c->get('settings'));
        };
    }
}