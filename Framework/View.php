<?php

namespace Framework;

class View {

	protected $_file;
	protected $_twig;
	protected $_data = array();
	protected $container;

	public function __construct( Container $container, $options = array() ) {

		foreach ( $options as $key => $value ) {
			$method        = "_" . $key;
			$this->$method = $value;
		}
		$this->container = $container;

		$this->_twig = $this->container->get('twig');
	}

	/**
	 * Returns HTML (Twig) content from the file $this->_file
	 *
	 * @return string
	 */
	public function getViewContent() {

		/** @var \Twig_Environment $twig */
		$twig = $this->_twig;
		return $twig->render( $this->_file, $this->getData() );
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