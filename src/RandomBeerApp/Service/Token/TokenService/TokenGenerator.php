<?php
declare(strict_types=1);

namespace RandomBeerApp\Service\Token\TokenService;

use Firebase\JWT\JWT;

/**
 * Class TokenGenerator
 * @package RandomBeerApp\Service\Token\TokenService
 */
class TokenGenerator
{
    const ENCRYPT_ALGORITH = 'HS256';

    /**
     * @param $secretKey
     * @param $appUrl
     * @param $apiUser
     * @return string
     */
    public static function generateToken($secretKey, $appUrl, $apiUser): string
    {
        $now = new \DateTime();
        $future = new \DateTime('now +2 hours');
        $payload = [
            'iat' => $now->getTimeStamp(),
            'exp' => $future->getTimeStamp(),
            'jti' => base64_encode(random_bytes(16)),
            'iss' => $appUrl,
            'sub' => $apiUser,
        ];
        $secret = $secretKey;
        $token = JWT::encode($payload, $secret, self::ENCRYPT_ALGORITH);
        return $token;
    }
}