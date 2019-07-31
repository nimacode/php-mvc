<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Service\Config\Config as Config;

$capsule = new Capsule;

$capsule->addConnection(Config::get('database'));

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();