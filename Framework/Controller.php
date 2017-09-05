<?php

namespace Framework;

class Controller {

	protected $_actionView;
	protected $_layoutView;

	public function __construct() {

		$router      = Registry::get( "router" );
		$this->_actionView = new View( array(
			"file" => "{$router->getController()}/{$router->getAction()}.html.twig",
		) );

		$this->_layoutView = new View( array(
			"file" => "layouts/standard.html.twig",
		) );

		$this->_layoutView->set( "base_url", BASE_URL );
	}

	/**
	 * Displays HTML (Twig) content from the layout
	 *
	 * @return string
	 */
	public function render() {
		$this->_layoutView->set( "actionFile", $this->_actionView->getViewContent() );
		header( "Content-type: text/html" );
		echo $this->_layoutView->getViewContent();
	}

	public function __destruct() {
		$this->render();
	}
}