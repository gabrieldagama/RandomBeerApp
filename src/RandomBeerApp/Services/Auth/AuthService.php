<?php

namespace RandomBeerApp\Services\Auth;

use RandomBeerApp\Services\Auth\AuthService\TokenGenerator;

/**
 * Class AuthService
 * @package RandomBeerApp\Services\Auth
 */
class AuthService
{
    /**
     * @var object
     */
    private $settings;

    /**
     * AuthService constructor.
     * @param $settings
     */
    public function __construct($settings)
    {
        $this->settings = $settings;
    }

    /**
     * @return string
     */
    public function generateToken()
    {
        return TokenGenerator::generateToken(
            $this->settings['jwt']['secret'],
            $this->settings['app']['url'],
            $this->settings['auth']['username']
        );
    }
}