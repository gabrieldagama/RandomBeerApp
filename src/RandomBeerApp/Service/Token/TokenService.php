<?php

namespace RandomBeerApp\Service\Token;

use RandomBeerApp\Service\Token\TokenService\TokenGenerator;

/**
 * Class TokenService
 * @package RandomBeerApp\Service\Token
 */
class TokenService
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