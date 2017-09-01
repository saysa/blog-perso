<?php

namespace Framework;

class Route {

	protected $_pattern;
	protected $_controller;
	protected $_action;
	protected $_parameters = array();

	public function __construct( $options = array() ) {

		foreach ( $options as $key => $value ) {
			$method        = "_" . $key;
			$this->$method = $value;
		}
	}

	/**
	 * Checks if the url matches the Route
	 * Set the parameters if exists
	 *
	 * @param $url
	 *
	 * @return int | boolean
	 */
	public function matches( $url ) {

		if ( sizeof( $this->getParamsKeysFromPattern( $this->_pattern ) ) ) {

			$url_pattern = preg_replace( "#:([a-zA-Z0-9]+)#", "([a-zA-Z0-9-_]+)", $this->_pattern );

			if ( sizeof( $this->getParamValuesFromURL( $url_pattern, $url ) ) ) {

				$values            = $this->flatten( $this->getParamValuesFromURL( $url_pattern, $url ) );
				$this->_parameters = array_combine( $this->getParamsKeysFromPattern( $this->_pattern ), $this->flatten( $values ) );

				return true;
			}

		} else {
			return preg_match( "#^{$this->_pattern}$#", $url );
		}

		return false;
	}

	/**
	 * Captures the parameters-keys from the pattern and stores it in an array
	 *
	 * @param $pattern
	 *
	 * @return array
	 */
	private function getParamsKeysFromPattern( $pattern ) {

		preg_match_all( "#:([a-zA-Z0-9]+)#", $pattern, $params );

		if ( sizeof( $params[1] ) ) {
			return $params[1];
		}

		return array();
	}

	/**
	 *
	 *
	 * @param $pattern
	 * @param $url
	 *
	 * @return array
	 */
	private function getParamValuesFromURL( $pattern, $url ) {

		preg_match_all( "#^{$pattern}$#", $url, $values );

		if ( sizeof( $values[1] ) ) {

			unset ( $values[0] );

			return $values;
		}

		return array();
	}

	/**
	 * Converts a multi-dimensional array into a uni-dimensional array
	 *
	 * @param array $array
	 * @param array $return
	 *
	 * @return array
	 */
	private function flatten( $array, $return = array() ) {
		foreach ( $array as $key => $value ) {
			if ( is_array( $value ) || is_object( $value ) ) {
				$return = self::flatten( $value, $return );
			} else {
				$return[] = $value;
			}
		}

		return $return;
	}

	/**
	 * @return string
	 */
	public function getController() {
		return $this->_controller;
	}

	/**
	 * @return string
	 */
	public function getAction() {
		return $this->_action;
	}
}