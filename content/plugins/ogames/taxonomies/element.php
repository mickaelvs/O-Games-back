<?php

/**
 * Registers the `element` taxonomy,
 * for use with 'tournament'.
 */
function element_init() {
	register_taxonomy( 'element', array( 'tournament' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'manage_elements',
			'edit_terms'    => 'manage_elements',
			'delete_terms'  => 'manage_elements',
			'assign_terms'  => 'edit_tournaments',
		),
		'labels'            => array(
			'name'                       => __( 'Elements', 'ogames' ),
			'singular_name'              => _x( 'Elements', 'taxonomy general name', 'ogames' ),
			'search_items'               => __( 'Search Elements', 'ogames' ),
			'popular_items'              => __( 'Popular Elements', 'ogames' ),
			'all_items'                  => __( 'All Elements', 'ogames' ),
			'parent_item'                => __( 'Parent Elements', 'ogames' ),
			'parent_item_colon'          => __( 'Parent Elements:', 'ogames' ),
			'edit_item'                  => __( 'Edit Elements', 'ogames' ),
			'update_item'                => __( 'Update Elements', 'ogames' ),
			'view_item'                  => __( 'View Elements', 'ogames' ),
			'add_new_item'               => __( 'Add New Elements', 'ogames' ),
			'new_item_name'              => __( 'New Elements', 'ogames' ),
			'separate_items_with_commas' => __( 'Separate Elements with commas', 'ogames' ),
			'add_or_remove_items'        => __( 'Add or remove Elements', 'ogames' ),
			'choose_from_most_used'      => __( 'Choose from the most used Elements', 'ogames' ),
			'not_found'                  => __( 'No Elements found.', 'ogames' ),
			'no_terms'                   => __( 'No Elements', 'ogames' ),
			'menu_name'                  => __( 'Elements', 'ogames' ),
			'items_list_navigation'      => __( 'Elements list navigation', 'ogames' ),
			'items_list'                 => __( 'Elements list', 'ogames' ),
			'most_used'                  => _x( 'Most Used', 'element', 'ogames' ),
			'back_to_items'              => __( '&larr; Back to Elements', 'ogames' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'tournament-elements',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'element_init' );

/**
 * Sets the post updated messages for the `element` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `element` taxonomy.
 */
function element_updated_messages( $messages ) {

	$messages['ingredient'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Elements added.', 'ogames' ),
		2 => __( 'Elements deleted.', 'ogames' ),
		3 => __( 'Elements updated.', 'ogames' ),
		4 => __( 'Elements not added.', 'ogames' ),
		5 => __( 'Elements not updated.', 'ogames' ),
		6 => __( 'Elements deleted.', 'ogames' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'element_updated_messages' );
