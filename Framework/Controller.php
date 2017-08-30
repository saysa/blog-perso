<?php

namespace Framework;

class Controller {

	protected $_view;

	public function __construct() {

		$router      = Registry::get( "router" );
		$this->_view = new View( array(
			"file" => APP_PATH . "/app/views/{$router->getController()}/{$router->getAction()}.php",
		) );
	}

	/**
	 * Renders the view
	 */
	public function render() {
		header( "Content-type: text/html" );
		include $this->_view->getViewFile();
	}

	public function __destruct() {
		$this->render();
	}
}