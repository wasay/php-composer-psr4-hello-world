<?php
define('BASEPATH', __DIR__);

$autoloader = require __DIR__ . '/../vendor/autoload.php';

// https://phpocean.com/tutorials/back-end/php-frameworking-routing-autoloading-configuration-part-2/10
require('Providers/Router.php');

$router = new App\Providers\Router();
