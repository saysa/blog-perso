<?php

namespace Framework;

class Controller {

	protected $_view;

	public function __construct() {

		$router      = Registry::get( "router" );
		$this->_view = new View();
	}
}