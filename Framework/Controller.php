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
		$this->_view->set( "actionFile", $this->_view->getViewFile() ); // pass the actionView to the view
		$data = $this->_view->getData(); // pass custom data to the view
		include $this->_view->getViewLayout(); // show the main layout by default
	}

	public function __destruct() {
		$this->render();
	}
}