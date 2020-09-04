<?php

/**
 * Registers the `detail` taxonomy,
 * for use with 'tournament'.
 */
function detail_init() {
	register_taxonomy( 'detail', array( 'tournament','news','profile' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'manage_details',
			'edit_terms'    => 'manage_details',
			'delete_terms'  => 'manage_details',
			'assign_terms'  => 'edit_tournaments','edit_newses','edit_profiles'
		),
		'labels'            => array(
			'name'                       => __( 'Details', 'ogames' ),
			'singular_name'              => _x( 'Details', 'taxonomy general name', 'ogames' ),
			'search_items'               => __( 'Search Details', 'ogames' ),
			'popular_items'              => __( 'Popular Details', 'ogames' ),
			'all_items'                  => __( 'All Details', 'ogames' ),
			'parent_item'                => __( 'Parent Details', 'ogames' ),
			'parent_item_colon'          => __( 'Parent Details:', 'ogames' ),
			'edit_item'                  => __( 'Edit Details', 'ogames' ),
			'update_item'                => __( 'Update Details', 'ogames' ),
			'view_item'                  => __( 'View Details', 'ogames' ),
			'add_new_item'               => __( 'Add New Details', 'ogames' ),
			'new_item_name'              => __( 'New Details', 'ogames' ),
			'separate_items_with_commas' => __( 'Separate Details with commas', 'ogames' ),
			'add_or_remove_items'        => __( 'Add or remove Details', 'ogames' ),
			'choose_from_most_used'      => __( 'Choose from the most used Details', 'ogames' ),
			'not_found'                  => __( 'No Details found.', 'ogames' ),
			'no_terms'                   => __( 'No Details', 'ogames' ),
			'menu_name'                  => __( 'Details', 'ogames' ),
			'items_list_navigation'      => __( 'Details list navigation', 'ogames' ),
			'items_list'                 => __( 'Details list', 'ogames' ),
			'most_used'                  => _x( 'Most Used', 'detail', 'ogames' ),
			'back_to_items'              => __( '&larr; Back to Details', 'ogames' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'tournament-details', 'news-details','profile-details',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'detail_init' );

/**
 * Sets the post updated messages for the `detail` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `detail` taxonomy.
 */
function detail_updated_messages( $messages ) {

	$messages['detail'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Details added.', 'ogames' ),
		2 => __( 'Details deleted.', 'ogames' ),
		3 => __( 'Details updated.', 'ogames' ),
		4 => __( 'Details not added.', 'ogames' ),
		5 => __( 'Details not updated.', 'ogames' ),
		6 => __( 'Details deleted.', 'ogames' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'detail_updated_messages' );
