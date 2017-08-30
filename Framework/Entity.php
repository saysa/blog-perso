<?php

namespace Framework;

class Entity {

	protected $_created;
	protected $_modified;

	public function __construct( array $parameters ) {

		$this->hydrate( $parameters );
	}

	/**
	 * @param array $data
	 *
	 * @return $this
	 */
	private function hydrate( array $data ) {
		foreach ( $data as $key => $value ) {
			$method = 'set' . ucfirst( $key );
			if ( method_exists( $this, $method ) ) {
				$this->$method( $value );
			}
		}

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCreated() {
		return $this->_created;
	}

	/**
	 * @param mixed $created
	 */
	public function setCreated( $created ) {
		$this->_created = $created;
	}

	/**
	 * @return mixed
	 */
	public function getModified() {
		return $this->_modified;
	}

	/**
	 * @param mixed $modified
	 */
	public function setModified( $modified ) {
		$this->_modified = $modified;
	}
}