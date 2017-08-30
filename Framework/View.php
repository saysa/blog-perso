<?php

namespace Framework;

class View {

	protected $_file;
	protected $_data = array();

	public function __construct( $options = array() ) {

		foreach ( $options as $key => $value ) {
			$method        = "_" . $key;
			$this->$method = $value;
		}
	}

	/**
	 * Get view content from the file
	 *
	 * @return string | null
	 */
	public function getViewFile() {

		if ( file_exists( $this->_file ) ) {
			return $this->_file;
		}

		return null;
	}

	/**
	 * @param string $file
	 */
	public function setFile( $file ) {
		$this->_file = $file;
	}

	/**
	 * @return array
	 */
	public function getData() {
		return $this->_data;
	}
}