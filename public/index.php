<?php

define( "APP_PATH", dirname( dirname( __FILE__ ) ) );
define( "BASE_URL", 'http://' . $_SERVER["SERVER_NAME"] . '/' );
setlocale( LC_TIME, 'fra', 'fr_FR' );

try {

	require( "../Framework/Core.php" );
	Framework\Core::initialize();

	// loads and initializes the Database class
	$config = yaml_parse( file_get_contents( APP_PATH . "/app/configuration/config.yml" ) );
	$database = new \Framework\Database( $config['database'] );
	\Framework\Registry::set( "database", $database->connect() );

	// set Twig in the Registry
	$loader = new \Twig_Loader_Filesystem( APP_PATH . '/app/views/' );
	$twig   = new \Twig_Environment( $loader, array( 'autoescape' => false, 'debug' => $config['debug'], ) );
	if ( $config['debug'] ) $twig->addExtension( new Twig_Extension_Debug() );
	\Framework\Registry::set( "twig", $twig );

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