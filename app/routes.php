<?php
$router->add('/',function(){
   $controller = new App\Http\Controllers\HomeController();
   echo $controller->show();
});

$router->add('/hello',function() use ($router){
    echo $router->view_display('hello.php');
});
