<?php

require('vendor\autoload.php');
use Illuminate\Database\Capsule\Manager as CapsuleManager;

$capsuleManager = new CapsuleManager;

$capsuleManager->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'stocksense',
    'username' => 'root',
    'password' => 'thelastofus1',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
]);

$capsuleManager->bootEloquent();