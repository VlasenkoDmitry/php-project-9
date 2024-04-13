<?php

require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use DI\Container;


$container = new Container();
$container->set('renderer', function () {
    return new \Slim\Views\PhpRenderer(__DIR__ . '/../templates');
});

AppFactory::setContainer($container);
$app = AppFactory::create();
$router = $app->getRouteCollector()->getRouteParser();

$app->get('/', function ($request, $response) {

    return $this->get('renderer')->render($response, 'main/index.phtml');
});
$app->run();
