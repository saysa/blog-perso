<?php

namespace Framework;

class Autoloader {

	public static function autoload( $class ) {

		if ( file_exists( $file = APP_PATH . DIRECTORY_SEPARATOR . $class . ".php" ) ) {
			include( $file );

			return;
		}

		throw new \Exception( "{$file} not found" );
	}
}