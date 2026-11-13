<?php

require __DIR__ . '/app/bootstrap.php';

$hello = new App\Http\Controllers\HomeController();
echo $hello->show();