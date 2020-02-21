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
	}
}
