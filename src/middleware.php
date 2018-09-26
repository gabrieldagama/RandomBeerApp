<?php
// Application middleware

$container = $app->getContainer();
$settings = $container->get('settings');

/**
 * Added the middleware to allow CORS
 */
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

/**
 * Adding middleware to validate JWT
 */
$app->add(new Tuupola\Middleware\JwtAuthentication([
    'path' => '/v1',
    'relaxed' => ['localhost', 'web'],
    'secure' => true,
    'ignore' => ['/v1/auth/token'],
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

