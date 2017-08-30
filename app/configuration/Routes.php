<?php

namespace app\configuration;

/**
 * Contains all the routes for the application
 *
 * Class Routes
 * @package app\configuration
 */
class Routes {

	public static $routes = array(
		array(
			"pattern"    => "homepage",
			"controller" => "homepage",
			"action"     => "index",
		),
		array(
			"pattern"    => "blog",
			"controller" => "blog",
			"action"     => "index",
		),
	);
}