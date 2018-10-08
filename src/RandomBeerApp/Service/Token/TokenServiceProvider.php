<?php
declare(strict_types=1);

namespace RandomBeerApp\Service\Token;

use Interop\Container\ContainerInterface;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class TokenServiceProvider
 * @package RandomBeerApp\Service\Token
 */
class TokenServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $pimple
     */
    public function register(Container $pimple)
    {
        $pimple['token_service'] = function (ContainerInterface $c) {
            return TokenServiceFactory::create($c->get('settings'));
        };
    }
}