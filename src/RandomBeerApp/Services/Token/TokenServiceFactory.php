<?php

namespace RandomBeerApp\Services\Token;

/**
 * Class TokenServiceFactory
 * @package RandomBeerApp\Services\Token
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