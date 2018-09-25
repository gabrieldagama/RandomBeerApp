<?php
// DIC configuration

$container = $app->getContainer();

$container->register(new \RandomBeerApp\Service\Token\TokenServiceProvider());

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// http response builder
$container['responseBodyBuilder'] = function ($c) {
    return new RandomBeerApp\Model\Api\ResponseBodyBuilder();
};

// beer factory
$container['beerFactory'] = function ($c) {
    return new \RandomBeerApp\Model\Entity\BeerFactory();
};

// beer repository
$container['beerRepository'] = function ($c) {
    return new \RandomBeerApp\Model\Repository\BeerRepository($c);
};

// mongo
$container['mongoDbClient'] = function ($c) {
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

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};
