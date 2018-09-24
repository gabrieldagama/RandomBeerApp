<?php

namespace RandomBeerApp\Services\Auth\AuthService;

use \Exception;
use Firebase\JWT\JWT;

/**
 * Class TokenValidator
 * @package RandomBeerApp\Services\Auth\AuthService
 */
class TokenValidator
{
    /**
     * @param $token
     * @param $secretKey
     * @return bool
     *
     */
    public static function validateToken($token, $secretKey)
    {
        try {
            JWT::decode($token, $secretKey, array(TokenGenerator::ENCRYPT_ALGORITH));
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
}