<?php
declare(strict_types=1);

namespace RandomBeerApp\Service\Token;

/**
 * Class TokenServiceFactory
 * @package RandomBeerApp\Service\Token
 */
class TokenServiceFactory
{

    /**
     * @param $settings
     * @return TokenService
     */
    public static function create($settings): TokenService
    {
        return new TokenService($settings);
    }
}