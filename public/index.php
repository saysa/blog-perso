<?php

define( "APP_PATH", dirname( dirname( __FILE__ ) ) );

try {

	require( "../Framework/Core.php" );
	Framework\Core::initialize();

} catch ( Exception $e ) {

	header( "Content-type: text/html" );
	echo "An error occurred." . $e->getMessage();
	exit;
}