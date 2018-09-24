<?php
// Application middleware

$container = $app->getContainer();
$settings = $container->get('settings');
$app->add(new Tuupola\Middleware\HttpBasicAuthentication([
    "path" => "/v1/auth/token",
    "realm" => "Protected",
    "users" => [
        $settings['auth']['username'] => $settings['auth']['password']
    ]
]));