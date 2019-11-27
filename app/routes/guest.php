<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/', '\App\Controllers\HomeController:home');
$app->get('/info', function(Request $request, Response $response, $args) {
    return $response;
})->setName('info');