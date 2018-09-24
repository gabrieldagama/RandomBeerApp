<?php

namespace RandomBeerApp\Services\Auth;

/**
 * Class AuthServiceFactory
 * @package RandomBeerApp\Services\Auth
 */
class AuthServiceFactory
{

    /**
     * @param $settings
     * @return AuthService
     */
    public static function create($settings)
    {
        return new AuthService($settings);
    }
}