<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        // App settings
        'app'                    => [
            'name' => 'RandomBeerApp',
            'url'  => 'http://randombeerapp.com',
        ],
        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        'auth' => [
            'username' => getenv('BASIC_HTTP_USER'),
            'password' => getenv('BASIC_HTTP_PWD'),
        ],
        'jwt'  => [
            'secret' => getenv('JWT_SECRET'),
        ],
        'db'   => [
            'host' => 'mongo',
            'port' => '27017',
            'user' => 'root',
            'pwd' => 'admin',
            'db_name' => 'randombeerapp'
        ]
    ],
];
