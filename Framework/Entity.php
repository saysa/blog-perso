<?php

namespace Framework;

class Entity {

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
}