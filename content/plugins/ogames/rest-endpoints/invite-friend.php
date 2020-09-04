<?php

function register_rest_invite_friend_route() {
	register_rest_route(
		'ogames/v1', '/invite-friend', [
			'methods'  => 'POST',
			'callback' => 'send_friend_invitation',
			'args'     => [
				'email' => [
					'validate_callback' => function ( $email ) {
						return filter_var( $email, FILTER_VALIDATE_EMAIL );
					}
				]
			]
		]
	);
}

/**
 * Invite a friend
 *
 * @param WP_REST_Request $request
 *
 * @return WP_Rest_Response|WP_Error
 */
function send_friend_invitation( $request ) {
	$email = $request->get_param( 'email' );

	/**
	 * @todo Configurer le SMTP du serveur ou passer par un plugin comme SMTP Mailer (https://fr.wordpress.org/plugins/smtp-mailer/)
	 */
	$email_status = wp_mail($email, 'Invitation ogames', 'Vous avez reçu une invitation à rejoindre <a href="">ogames</a>.');

	if ( $email_status ) {
		$response = new WP_Rest_Response;

		$response->set_status( 200 );
	} else {
		$response = new WP_Error('L\'envoi de l\'email a échoué.');
	}

	return $response;
}

add_action( 'rest_api_init', 'register_rest_invite_friend_route' );
