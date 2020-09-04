<?php

function add_administrator_capabilities() {
	$administrator = get_role( 'administrator' );

	$administrator->add_cap('read');
	$administrator->add_cap('edit_tournament');
	$administrator->add_cap('read_tournament');
	$administrator->add_cap('delete_tournament');
	$administrator->add_cap('edit_tournaments');
	$administrator->add_cap('edit_others_tournaments');
	$administrator->add_cap('delete_tournaments');
	$administrator->add_cap('publish_tournaments');
	$administrator->add_cap('read_private_tournaments');
	$administrator->add_cap('delete_private_tournaments');
	$administrator->add_cap('delete_published_tournaments');
	$administrator->add_cap('delete_others_tournaments');
	$administrator->add_cap('edit_private_tournaments');
	$administrator->add_cap('edit_published_tournaments');
	$administrator->add_cap('create_tournaments');

	$administrator->add_cap('edit_news');
	$administrator->add_cap('read_news');
	$administrator->add_cap('delete_news');
	$administrator->add_cap('edit_newses');
	$administrator->add_cap('edit_others_newses');
	$administrator->add_cap('delete_newses');
	$administrator->add_cap('publish_newses');
	$administrator->add_cap('read_private_newses');
	$administrator->add_cap('delete_private_newses');
	$administrator->add_cap('delete_published_newses');
	$administrator->add_cap('delete_others_newses');
	$administrator->add_cap('edit_private_newses');
	$administrator->add_cap('edit_published_newses');
	$administrator->add_cap('create_newses');

	$administrator->add_cap('edit_profile');
	$administrator->add_cap('read_profile');
	$administrator->add_cap('delete_profile');
	$administrator->add_cap('edit_profiles');
	$administrator->add_cap('edit_others_profiles');
	$administrator->add_cap('delete_profiles');
	$administrator->add_cap('publish_profiles');
	$administrator->add_cap('read_private_profiles');
	$administrator->add_cap('delete_private_profiles');
	$administrator->add_cap('delete_published_profiles');
	$administrator->add_cap('delete_others_profiles');
	$administrator->add_cap('edit_private_profiles');
	$administrator->add_cap('edit_published_profiles');
	$administrator->add_cap('create_profiles');

	$administrator->add_cap('manage_types');
	$administrator->add_cap('manage_details');
}

function remove_administrator_capabilities() {
	$administrator = get_role( 'administrator' );

	$administrator->remove_cap('read');
	$administrator->remove_cap('edit_tournament');
	$administrator->remove_cap('read_tournament');
	$administrator->remove_cap('delete_tournament');
	$administrator->remove_cap('edit_tournaments');
	$administrator->remove_cap('edit_others_tournaments');
	$administrator->remove_cap('delete_tournaments');
	$administrator->remove_cap('publish_tournaments');
	$administrator->remove_cap('read_private_tournaments');
	$administrator->remove_cap('delete_private_tournaments');
	$administrator->remove_cap('delete_published_tournaments');
	$administrator->remove_cap('delete_others_tournaments');
	$administrator->remove_cap('edit_private_tournaments');
	$administrator->remove_cap('edit_published_tournaments');
	$administrator->remove_cap('create_tournaments');

	$administrator->remove_cap('edit_news');
	$administrator->remove_cap('read_news');
	$administrator->remove_cap('delete_news');
	$administrator->remove_cap('edit_newses');
	$administrator->remove_cap('edit_others_newses');
	$administrator->remove_cap('delete_newses');
	$administrator->remove_cap('publish_newses');
	$administrator->remove_cap('read_private_newses');
	$administrator->remove_cap('delete_private_newses');
	$administrator->remove_cap('delete_published_newses');
	$administrator->remove_cap('delete_others_newses');
	$administrator->remove_cap('edit_private_newses');
	$administrator->remove_cap('edit_published_newses');
	$administrator->remove_cap('create_newses');

	$administrator->remove_cap('edit_profile');
	$administrator->remove_cap('read_profile');
	$administrator->remove_cap('delete_profil');
	$administrator->remove_cap('edit_profiles');
	$administrator->remove_cap('edit_others_profiles');
	$administrator->remove_cap('delete_profiles');
	$administrator->remove_cap('publish_profiles');
	$administrator->remove_cap('read_private_profiles');
	$administrator->remove_cap('delete_private_profiles');
	$administrator->remove_cap('delete_published_profiles');
	$administrator->remove_cap('delete_others_profiles');
	$administrator->remove_cap('edit_private_profiles');
	$administrator->remove_cap('edit_published_profiles');
	$administrator->remove_cap('create_profiles');

	$administrator->remove_cap('manage_types');
	$administrator->remove_cap('manage_details');
}
