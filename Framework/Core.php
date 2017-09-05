<?php

namespace Framework;

class Core {

	/**
	 * Implements autoload
	 */
	public static function initialize() {

		spl_autoload_register( function ( $class ) {

			require_once APP_PATH . '/vendor/autoload.php';
		} );

		include "Autoloader.php";
		spl_autoload_register( array( "Framework\Autoloader", "autoload" ) );
	}
}