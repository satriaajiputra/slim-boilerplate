<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Selective\BasePath\BasePathMiddleware;

require __DIR__ . '/../vendor/autoload.php';

// initiate container with PHP-DI
$container = new Container();

// Set container to create App with on AppFactory
AppFactory::setContainer($container);

// initiate the app
$app = AppFactory::create();

// Add middleware
$app->addRoutingMiddleware();

// Set the base path to run the app in a subdirectory.
// This path is used in urlFor().
$app->add(new BasePathMiddleware($app));

/*
 * 
 * @param bool $displayErrorDetails -> Should be set to false in production
 * @param bool $logErrors -> Parameter is passed to the default ErrorHandler
 * @param bool $logErrorDetails -> Display error details in error log
 * which can be replaced by a callable of your choice.
 * 
 * Note: This middleware should be added last. It will not handle any exceptions/errors
 * for middleware added after it.
 */
$app->addErrorMiddleware(true, true, true);

require __DIR__ . '/../lib/functions.php';