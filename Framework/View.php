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
	 * Set the data depending on if $key is an array or a string
	 *
	 * @param $key
	 * @param null $value
	 *
	 * @return $this
	 */
	public function set( $key, $value = null ) {
		if ( is_array( $key ) ) {
			foreach ( $key as $_key => $value ) {
				$this->_set( $_key, $value );
			}

			return $this;
		}

		$this->_set( $key, $value );

		return $this;
	}

	/**
	 * Really set the data
	 *
	 * @param $key
	 * @param $value
	 *
	 * @throws \Exception
	 */
	protected function _set( $key, $value ) {
		if ( ! is_string( $key ) && ! is_numeric( $key ) ) {
			throw new \Exception( "Key must be a string or a number" );
		}

		$this->_data[ $key ] = $value;
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