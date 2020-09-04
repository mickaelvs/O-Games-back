<?php

function add_gamer_role() {
	add_role(
		'gamer',
		__('Gamer'),
		[
			'read'                 			=> true,
			'edit_tournament'				=> true,
			'read_tournament'				=> true,
			'delete_tournament'				=> true,
			'edit_tournaments'				=> true,
			'edit_others_tournaments'		=> true,
			'delete_tournaments'			=> true,
			'publish_tournaments'			=> true,
			'read_private_tournaments'		=> true,
			'delete_private_tournaments'	=> true,
			'delete_published_tournaments'	=> true,
			'delete_others_tournaments'		=> true,
			'edit_private_tournaments'		=> true,
			'edit_published_tournaments'	=> true,
			'create_tournaments'			=> true,
			'manage_types'              	=> true,
			'manage_details'        		=> true,
			'upload_files'              	=> true,

			'edit_news'						=> true,
			'read_news'						=> true,
			'delete_news'					=> true,
			'edit_newses'					=> true,
			'edit_others_newses'			=> true,
			'delete_newses'					=> true,
			'publish_newses'				=> true,
			'read_private_newses'			=> true,
			'delete_private_newses'			=> true,
			'delete_published_newses'		=> true,
			'delete_others_newses'			=> true,
			'edit_private_newses'			=> true,
			'edit_published_newses'			=> true,
			'create_newses'					=> true,

			'edit_profile'					=> true,
			'read_profile'					=> true,
			'delete_profile'				=> true,
			'edit_profiles'					=> true,
			'edit_others_profiles'			=> true,
			'delete_profiles'				=> true,
			'publish_profiles'				=> true,
			'read_private_profiles'			=> true,
			'delete_private_profiles'		=> true,
			'delete_published_profiles'		=> true,
			'delete_others_profiles'		=> true,
			'edit_private_profiles'			=> true,
			'edit_published_profiles'		=> true,
			'create_profiles'				=> true,
		]
	);
}

function remove_gamer_role() {
	remove_role( 'gamer' );
}

/**
 * WP Rest User Plugin enhancement
 *
 * @link https://wordpress.org/plugins/wp-rest-user/
 */
add_action('wp_rest_user_user_register', 'user_registered');

function user_registered($user) {
    $user->set_role('gamer');
}
