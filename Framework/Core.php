<?php

namespace Framework;

class Core {

	/**
	 * Implements autoload
	 */
	public static function initialize() {
		include "Autoloader.php";
		spl_autoload_register( array( "Framework\Autoloader", "autoload" ) );
	}
}