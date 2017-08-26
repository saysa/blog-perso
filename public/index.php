<?php

define( "APP_PATH", dirname( dirname( __FILE__ ) ) );

try {

	require( "../Framework/Core.php" );
	Framework\Core::initialize();

	$router = new \Framework\Router();
	\Framework\Registry::set( "router", $router );
	foreach ( \app\configuration\Routes::$routes as $route ) {
		$router->addRoute( $route );
	}

} catch ( Exception $e ) {

	header( "Content-type: text/html" );
	echo "An error occurred." . $e->getMessage();
	exit;
}