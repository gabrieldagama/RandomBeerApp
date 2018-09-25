<?php
// Application middleware

$container = $app->getContainer();
$settings = $container->get('settings');

/**
 * Adding middleware to validate JWT
 */
$app->add(new Tuupola\Middleware\JwtAuthentication([
    'path' => '/v1',
    'relaxed' => ['localhost', 'web'],
    'secure' => true,
    'ignore' => ['/v1/auth/token', '/'],
    'secret' => $settings['jwt']['secret']
]));

/**
 * Adding middleware to validate HTTP basic auth for token generation
 */
$app->add(new Tuupola\Middleware\HttpBasicAuthentication([
    'path' => '/v1/auth/token',
    'relaxed' => ['localhost', 'web'],
    'secure' => true,
    'realm' => 'Protected',
    'users' => [
        $settings['auth']['username'] => $settings['auth']['password']
    ]
]));

