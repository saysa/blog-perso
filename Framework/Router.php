<?php

namespace Framework;

class Router {

	protected $_url;
	protected $_controller;
	protected $_action;
	protected $_routes = array();

	public function __construct( $options = array() ) {

		foreach ( $options as $key => $value ) {
			$method        = "_" . $key;
			$this->$method = $value;
		}
	}

	/**
	 * Adds a route in the Router
	 *
	 * @param Route $route
	 *
	 * @return $this
	 */
	public function addRoute( Route $route ) {

		$this->_routes[] = $route;

		return $this;
	}

	public function removeRoute( $route ) {

	}

	public function getRoutesByName() {

	}

	public function getRoutes() {

	}

	public function dispatch() {

		foreach ( $this->_routes as $route ) {

			if ( $route->matches( $this->_url ) ) {

			}
		}
	}
}