<?php

require __DIR__.'./../vendor/autoload.php';

use RandomBeerApp\Command\DeploySampleData;
use Symfony\Component\Console\Application;

$command = new DeploySampleData();

$application = new Application();
$application->add($command);

$application->run();
