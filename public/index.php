<?php

define( "APP_PATH", dirname( dirname( __FILE__ ) ) );
define( "BASE_URL", 'http://' . $_SERVER["SERVER_NAME"] . '/' );

try {

	require( "../Framework/Core.php" );
	Framework\Core::initialize();

	// loads and initializes the Database class
	$config = yaml_parse( file_get_contents( APP_PATH . "/app/configuration/config.yml" ) );
	$database = new \Framework\Database( $config['database'] );
	\Framework\Registry::set( "database", $database->connect() );

	$router = new \Framework\Router( array(
		"url" => trim( $_SERVER['REQUEST_URI'], "/" ),
	) );
	\Framework\Registry::set( "router", $router );
	foreach ( \app\configuration\Routes::$routes as $route ) {
		$router->addRoute( new \Framework\Route( $route ) );
	}

	$router->dispatch();

} catch ( Exception $e ) {

	header( "Content-type: text/html" );
	echo "An error occurred. " . $e->getMessage();
	exit;
}