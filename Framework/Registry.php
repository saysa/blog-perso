<?php

namespace Framework;

/**
 * A Registry is a class that can store and return instances of standard classes.
 *
 * Class Registry
 * @package Framework
 */
class Registry {

	private static $_instances = array();

	/**
	 * Tries to get an instance
	 *
	 * @param $key
	 *
	 * @return mixed|null
	 */
	public static function get( $key ) {

		if ( isset( self::$_instances[ $key ] ) ) {
			return self::$_instances[ $key ];
		}

		return null;
	}

	/**
	 * Set an instance in the Registry
	 *
	 * @param $key
	 * @param null $instance
	 */
	public static function set( $key, $instance = null ) {
		self::$_instances[ $key ] = $instance;
	}

	/**
	 * Removes an instance from the Registry
	 *
	 * @param $key
	 */
	public static function erase( $key ) {
		if ( isset( self::$_instances[ $key ] ) ) {
			unset( self::$_instances[ $key ] );
		}
	}

	/**
	 * Returns the list of the instances in the Registry
	 *
	 * @return array
	 */
	public static function getList() {

		$list = array();

		foreach ( self::$_instances as $key => $instance ) {
			$list[ $key ] = $instance;
		}

		return $list;
	}
}