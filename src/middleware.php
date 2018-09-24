<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

$app->add(new Tuupola\Middleware\HttpBasicAuthentication([
    "path" => "/v1/auth/token", /* or ["/admin", "/api"] */
    "realm" => "Protected",
    "users" => [
        "test" => "test"
    ]
]));