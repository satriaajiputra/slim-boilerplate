<?php

use App\Models\Setting;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Slim\Routing\RouteParser;

/*
|--------------------------------------------------------------------------
| Get the container instance
|--------------------------------------------------------------------------
|*/
$container = $app->getContainer();

/*
|--------------------------------------------------------------------------
| Insert route parser to the container
|--------------------------------------------------------------------------
| This will be used for getting urlFor method at functions.php
|*/
$container->set('routeParser', new RouteParser($app->getRouteCollector()));

/*
|--------------------------------------------------------------------------
| Including php-view to the container
|--------------------------------------------------------------------------
|*/
$container->set('view', function($container) {
    $renderer = new \Slim\Views\PhpRenderer(__DIR__ . '/../views/');
    return $renderer;
});

/*
|--------------------------------------------------------------------------
| Database container setting
|--------------------------------------------------------------------------
| Here we load the database configuration from 'configs/database.php'
| After that, we instantiate the capsule and start connection to the database
|*/
$container->set('settings.database', require __DIR__ . '/../configs/database.php');

$capsule = new Capsule;

$capsule->addConnection($container->get('settings.database'));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$container->set('db', $capsule);

/*
|--------------------------------------------------------------------------
| Settings from database
|--------------------------------------------------------------------------
| Here we store setting from database into container
|*/
$container->set('settings', function($container) {
    return Setting::whereIn('setting_name', require __DIR__ . '/../configs/settings.php')->get()->keyBy('setting_name');
});