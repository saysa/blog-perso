<?php

namespace Framework;

class Controller {

	protected $_view;

	public function __construct() {

		$router      = Registry::get( "router" );
		$this->_view = new View( array(
			"file" => APP_PATH . "/app/views/{$router->getController()}/{$router->getAction()}.tpl",
		) );
	}

	/**
	 * Renders the view
	 */
	public function render() {
		header( "Content-type: text/html" );
		echo $this->_view->getViewContent();
	}

	public function __destruct() {
		$this->render();
	}
}