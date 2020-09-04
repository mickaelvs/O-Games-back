<?php

/**
 * Registers the `type` taxonomy,
 * for use with 'tournament'.
 */
function type_init() {
	register_taxonomy( 'type', array( 'tournament','news','profile' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'manage_types',
			'edit_terms'    => 'manage_types',
			'delete_terms'  => 'manage_types',
			'assign_terms'  => 'edit_tournaments','edit_newses','edit_profiles'
		),
		'labels'            => array(
			'name'                       => __( 'Types', 'ogames' ),
			'singular_name'              => _x( 'Types', 'taxonomy general name', 'ogames' ),
			'search_items'               => __( 'Search Types', 'ogames' ),
			'popular_items'              => __( 'Popular Types', 'ogames' ),
			'all_items'                  => __( 'All Types', 'ogames' ),
			'parent_item'                => __( 'Parent Types', 'ogames' ),
			'parent_item_colon'          => __( 'Parent Types:', 'ogames' ),
			'edit_item'                  => __( 'Edit Types', 'ogames' ),
			'update_item'                => __( 'Update Types', 'ogames' ),
			'view_item'                  => __( 'View Types', 'ogames' ),
			'add_new_item'               => __( 'Add New Types', 'ogames' ),
			'new_item_name'              => __( 'New Types', 'ogames' ),
			'separate_items_with_commas' => __( 'Separate Types with commas', 'ogames' ),
			'add_or_remove_items'        => __( 'Add or remove Types', 'ogames' ),
			'choose_from_most_used'      => __( 'Choose from the most used Types', 'ogames' ),
			'not_found'                  => __( 'No Types found.', 'ogames' ),
			'no_terms'                   => __( 'No Types', 'ogames' ),
			'menu_name'                  => __( 'Types', 'ogames' ),
			'items_list_navigation'      => __( 'Types list navigation', 'ogames' ),
			'items_list'                 => __( 'Types list', 'ogames' ),
			'most_used'                  => _x( 'Most Used', 'type', 'ogames' ),
			'back_to_items'              => __( '&larr; Back to Types', 'ogames' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'tournament-types','news-types','profile-types',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'type_init' );

/**
 * Sets the post updated messages for the `type` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `type` taxonomy.
 */
function type_updated_messages( $messages ) {

	$messages['type'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Types added.', 'ogames' ),
		2 => __( 'Types deleted.', 'ogames' ),
		3 => __( 'Types updated.', 'ogames' ),
		4 => __( 'Types not added.', 'ogames' ),
		5 => __( 'Types not updated.', 'ogames' ),
		6 => __( 'Types deleted.', 'ogames' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'type_updated_messages' );
