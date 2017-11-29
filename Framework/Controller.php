<?php

namespace Framework;

class Controller {

	protected $_actionView;
	protected $_layoutView;
	protected $container;

	public function __construct(Container $container) {

        $this->container = $container;
		$router      = $this->container->get('router');
		$this->_actionView = new View( $this->container, array(
			"file" => "{$router->getController()}/{$router->getAction()}.html.twig",
		) );

		$this->_layoutView = new View( $this->container, array(
			"file" => "layouts/standard.html.twig",
		) );

		$this->_layoutView->set( "base_url", BASE_URL );
		$this->_actionView->set( "base_url", BASE_URL );
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