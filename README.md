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
* create folder Controllers
* cd into Controllers
* create file HomeController.php with following code
```php
<?php
namespace App\Controllers;

class HomeController
{
    public function __construct()
    {
    }

    public function show()
    {
        return "Hello World!";
    }
}
```
* cd to root folder
* create file index.php with following content
```php
<?php

$loader = require 'vendor/autoload.php';

$hello = new App\Controllers\HomeController();
echo $hello->show();
```
* run following commands to test the page
* composer dumpautoload -o
* php -S localhost:8080
* browser the url at http://localhost:8080

Appreciate if you mark the git repository with a star if this has been helpful or userful to you.

Checkout [Modernize Your Legacy PHP Application](http://mlaphp.com/) for dependency injection concept.

[My Blog @ WasaySyed.com](http://www.wasaysyed.com)
