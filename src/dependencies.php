<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// token provider
$container->register(new \RandomBeerApp\Service\Token\TokenServiceProvider());

// http response builder
$container['response_body_builder'] = function ($c) {
    return new RandomBeerApp\Model\Api\ResponseBodyBuilder();
};

// beer factory
$container['beer_factory'] = function ($c) {
    return new \RandomBeerApp\Model\Entity\BeerFactory();
};

// beer repository
$container['beer_repository'] = function ($c) {
    return new \RandomBeerApp\Repository\BeerRepository($c);
};

// beer provider
$container->register(new \RandomBeerApp\Service\Beer\BeerServiceProvider());

// mongo
$container['mongo_client'] = function ($c) {
    $host = $c->get('settings')['db']['host'];
    $port = $c->get('settings')['db']['port'];
    $user = $c->get('settings')['db']['user'];
    $pwd = $c->get('settings')['db']['pwd'];
    return new MongoDB\Client(
        "mongodb://${user}:${pwd}@{$host}:{$port}"
    );
};

// Object converter
$container['converter'] = function ($c) {
    return new RandomBeerApp\Helper\Converter\ObjectToArray();
};

// Object Populate
$container['populate_obj'] = function ($c) {
    return new RandomBeerApp\Helper\PopulateObject();
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};
