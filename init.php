<?php defined('SYSPATH') or die('No direct script access.');

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$config = Kohana::$config->load('database.default');

$capsule->addConnection([
    'driver'    => strtolower($config['type']),
    'host'      => $config['connection']['hostname'],
    'database'  => $config['connection']['database'],
    'username'  => $config['connection']['username'],
    'password'  => $config['connection']['password'],
    'charset'   => $config['charset'],
    'collation' => 'utf8_unicode_ci',
    'prefix'    => $config['table_prefix'],
]);

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$capsule->setAsGlobal();