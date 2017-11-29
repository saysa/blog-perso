<?php

namespace Framework;

class Router {

	protected $_url;
	protected $_controller;
	protected $_action;
	protected $_routes = array();
	protected $container;

	public function __construct(Container $container, $options = array() ) {

		foreach ( $options as $key => $value ) {
			$method        = "_" . $key;
			$this->$method = $value;
		}

		$this->container = $container;
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

				$this->_controller = $route->getController();
				$this->_action     = $route->getAction();

				try {
					$controllerClass = "\\app\\Controller\\" . ucfirst( $this->_controller ) . "Controller";
					$controller      = new $controllerClass($this->container);

				} catch ( \Exception $e ) {
					throw new \Exception( "Controller {$this->_controller} not found." );
				}

				if ( ! method_exists( $controller, $this->_action . "Action" ) ) {
					throw new \Exception( "Action {$this->_action}Action not found" );
				}

				if ( sizeof( $route->getParameters() ) >= 1 ) {
					// executes action with parameters
					call_user_func_array( array(
						$controller,
						$this->_action . "Action"
					), $route->getParameters() );
				} else {
					// executes the action without parameters
					$action = $this->_action . "Action";
					$controller->$action();
				}

				break;
			}
		}
	}

	/**
	 * @return string
	 */
	public function getController() {
		return $this->_controller;
	}

	/**
	 * @return string
	 */
	public function getAction() {
		return $this->_action;
	}
}