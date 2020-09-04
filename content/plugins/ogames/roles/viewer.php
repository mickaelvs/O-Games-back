<?php

function add_viewer_role() {
	add_role(
		'viewer',
		__('Viewer'),
		[
			'read'                 			=> true,
			'edit_tournament'				=> true,
			'read_tournament'				=> false,
			'delete_tournament'				=> false,
			'edit_tournaments'				=> true,
			'edit_others_tournaments'		=> false,
			'delete_tournaments'			=> true,
			'publish_tournaments'			=> false,
			'read_private_tournaments'		=> false,
			'delete_private_tournaments'	=> false,
			'delete_published_tournaments'	=> false,
			'delete_others_tournaments'		=> false,
			'edit_private_tournaments'		=> false,
			'edit_published_tournaments'	=> false,
			'create_tournaments'			=> true,
			'manage_types'              	=> false,
			'manage_details'        		=> false,
			'upload_files'              	=> true,

			'edit_news'						=> true,
			'read_news'						=> false,
			'delete_news'					=> false,
			'edit_newses'					=> true,
			'edit_others_newses'			=> false,
			'delete_newses'					=> true,
			'publish_newses'				=> false,
			'read_private_newses'			=> false,
			'delete_private_newses'			=> false,
			'delete_published_newses'		=> false,
			'delete_others_newses'			=> false,
			'edit_private_newses'			=> false,
			'edit_published_newses'			=> false,
			'create_newses'					=> true,

			'edit_profile'					=> true,
			'read_profile'					=> false,
			'delete_profile'				=> false,
			'edit_profiles'					=> true,
			'edit_others_profiles'			=> false,
			'delete_profiles'				=> true,
			'publish_profiles'				=> false,
			'read_private_profiles'			=> false,
			'delete_private_profiles'		=> false,
			'delete_published_profiles'		=> false,
			'delete_others_profiles'		=> false,
			'edit_private_profiles'			=> false,
			'edit_published_profiles'		=> false,
			'create_profiles'				=> true,
		]
	);
}

function remove_viewer_role() {
	remove_role( 'viewer' );
}
