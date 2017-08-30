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
	 * Get view content from the file
	 *
	 * @return bool|string
	 */
	public function getViewContent() {

		if ( file_exists( $this->_file ) ) {
			return file_get_contents( $this->_file );
		}

		return false;
	}

	/**
	 * @param string $file
	 */
	public function setFile( $file ) {
		$this->_file = $file;
	}
}