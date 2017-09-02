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
		array(
			"pattern"    => "blog/add",
			"controller" => "blog",
			"action"     => "add",
		),
		array(
			"pattern"    => "blog/edit/:id",
			"controller" => "blog",
			"action"     => "edit",
		),
		array(
			"pattern"    => "blog/:id",
			"controller" => "blog",
			"action"     => "show",
		),
	);
}