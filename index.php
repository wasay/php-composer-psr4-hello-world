<?php

$loader = require 'vendor/autoload.php';

$hello = new App\Controllers\HomeController();
echo $hello->show();