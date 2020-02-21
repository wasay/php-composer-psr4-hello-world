PHP Composer PSR-4 Basic
=============

This is a basic tutorial.

I have struggled to find basic example of php/composer/psr-4.
Almost all example's have some kind of npm based frameworks.

I hope this tutorial will be helpful to you to get started.

[Helpful answer to read up](https://stackoverflow.com/questions/28046052/composer-autoload-full-example)

You can clone this git repository or follow along the below steps.

* install [php](http://php.net)
* install [composer](http://getcomposer.org/)
* add composer to environment variables path value
* open bash/command prompt/power shell
* create project folder
* cd into project folder
* composer init
* update composer.json add:
```json
"autoload": {
    "psr-4": {
        "App\\": "app/"
    }
},
```
* composer update

* created folder app
* cd into app

* create file bootstrap.php
```php
<?php
    define('BASEPATH', __DIR__);
    
    $autoloader = require __DIR__ . '/../vendor/autoload.php';
    
    // https://phpocean.com/tutorials/back-end/php-frameworking-routing-autoloading-configuration-part-2/10
    require('Providers/Router.php');
    
    $router = new App\Providers\Router();
```

* create file routes.php
```php
<?php
$router->add('/',function(){
   $controller = new App\Http\Controllers\HomeController();
   echo $controller->show();
});

$router->add('/hello',function() use ($router){
    echo $router->view_display('hello.php');
});
```

* create folder Http
* create folder Controllers
* cd into Controllers

* create file HomeController.php with following code
```php
<?php
namespace App\Http\Controllers;
use App\Providers\Router;
class HomeController
{
    public function __construct()
    {
    }

    public function show()
    {
        $router = new Router();

        return $router->view_display('home.php');
        //return "Hello World!";
    }
}
```

* return one folder up to app folder
* create a folder named Providers
* create file Router.php
```php
<?php
namespace App\Providers;

class Router
{
	private $routes = [];
	private $notFound;

	public function __construct()
	{
		$this->notFound = function ($url) {
			echo "404 - $url was not found!";
		};
	}

	public function add($url, $action)
	{
		$this->routes[$url] = $action;
	}

	public function setNotFound($action)
	{
		$this->notFound = $action;
	}

	public function dispatch()
	{
		if ( ! is_array($this->routes) || empty($this->routes))
		{
			return false;
		}

		foreach ($this->routes as $url => $action)
		{
			if ($url == $_SERVER['REQUEST_URI'])
			{
				return $action();
			}
		}
		call_user_func_array($this->notFound, [$_SERVER['REQUEST_URI']]);
	}

	public function view_load($view_path, $view_name)
	{
		if (file_exists($view_path . $view_name))
		{
			return file_get_contents($view_path . $view_name);
		}
		throw new Exception("View does not exist: " . $view_path . $view_name);
	}

	public function view_display($view_name)
	{
		$view_path = BASEPATH . '/../resources/views/';

		return $this->view_load($view_path, $view_name);
	}
}
```

* cd to root folder

* create file /public/index.php with following content
```php
<?php
require '../app/bootstrap.php';
require '../app/routes.php';

$router->dispatch();
```

* generate autoload files if any
* composer dumpautoload -o

* test site
* php -S localhost:8080 -t public/
* browser the url at [http://localhost:8080](http://localhost:8080)

Appreciate if you mark the git repository with a star if this has been helpful or userful to you.

Checkout [Modernize Your Legacy PHP Application](http://mlaphp.com/) for dependency injection concept.

[My Blog @ WasaySyed.com](http://www.wasaysyed.com)
