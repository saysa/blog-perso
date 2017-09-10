<?php

namespace app\Controller;

use Framework\Controller;
use Framework\Registry;

class HomepageController extends Controller {

	public function indexAction() {

		if ( filter_has_var( INPUT_POST, 'submit' ) ) {

			# Dpcumentation : https://swiftmailer.symfony.com/docs/introduction.html

			$config    = Registry::get( "config" );
			$firstname = filter_input( INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS );
			$lastname  = filter_input( INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS );

			$message = new \Swift_Message( "Message de $lastname $firstname" );
			$message
				->setFrom( filter_input( INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS ) )
				->setTo( $config->swiftmailer['mailer_user'] )
				->setBody(
					filter_input( INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS ),
					'text/html'
				);

			$transport = new \Swift_SmtpTransport( $config->swiftmailer['mailer_host'], 465, 'ssl' );
			$transport
				->setUsername( $config->swiftmailer['mailer_user'] )
				->setPassword( $config->swiftmailer['mailer_password'] );

			$mailer = new \Swift_Mailer( $transport );
			$mailer->send( $message );
		}
	}
}