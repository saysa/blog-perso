<?php

namespace Framework;

class View {

	protected $_file;

	public function __construct( $options = array() ) {

		foreach ( $options as $key => $value ) {
			$method        = "_" . $key;
			$this->$method = $value;
		}
	}

	/**
	 * @param string $file
	 */
	public function setFile( $file ) {
		$this->_file = $file;
	}
}