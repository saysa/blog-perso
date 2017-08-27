<?php

namespace Framework;

class Route {

	protected $_pattern;
	protected $_controller;
	protected $_action;

	public function __construct( $options = array() ) {

		foreach ( $options as $key => $value ) {
			$method        = "_" . $key;
			$this->$method = $value;
		}
	}
}