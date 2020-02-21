<?php
namespace App\Providers;

// https://phpocean.com/tutorials/back-end/php-frameworking-routing-autoloading-configuration-part-2/10

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
