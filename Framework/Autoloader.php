<?php

namespace Framework;

class Autoloader {

	/**
	 * Includes Class file if exists
	 *
	 * @param $class
	 *
	 * @throws \Exception
	 */
	public static function autoload( $class ) {

		if ( file_exists( $file = APP_PATH . DIRECTORY_SEPARATOR . $class . ".php" ) ) {
			include( $file );

			return;
		}

		throw new \Exception( "{$file} not found" );
	}
}