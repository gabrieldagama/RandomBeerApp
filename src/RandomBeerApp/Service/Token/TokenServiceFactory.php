<?php

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
    public static function create($settings)
    {
        return new TokenService($settings);
    }
}