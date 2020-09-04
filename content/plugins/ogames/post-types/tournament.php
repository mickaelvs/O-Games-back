<?php

/**
 * Registers the `tournament` post type.
 */
function tournament_init() {
	register_post_type( 'tournament', array(
		'labels'                => array(
			'name'                  => __( 'Tournois', 'ogames' ),
			'singular_name'         => __( 'Tournois', 'ogames' ),
			'all_items'             => __( 'All Tournois', 'ogames' ),
			'archives'              => __( 'Tournois Archives', 'ogames' ),
			'attributes'            => __( 'Tournois Attributes', 'ogames' ),
			'insert_into_item'      => __( 'Insert into Tournois', 'ogames' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Tournois', 'ogames' ),
			'featured_image'        => _x( 'Featured Image', 'tournament', 'ogames' ),
			'set_featured_image'    => _x( 'Set featured image', 'tournament', 'ogames' ),
			'remove_featured_image' => _x( 'Remove featured image', 'tournament', 'ogames' ),
			'use_featured_image'    => _x( 'Use as featured image', 'tournament', 'ogames' ),
			'filter_items_list'     => __( 'Filter Tournois list', 'ogames' ),
			'items_list_navigation' => __( 'Tournois list navigation', 'ogames' ),
			'items_list'            => __( 'Tournois list', 'ogames' ),
			'new_item'              => __( 'New Tournois', 'ogames' ),
			'add_new'               => __( 'Add New', 'ogames' ),
			'add_new_item'          => __( 'Add New Tournois', 'ogames' ),
			'edit_item'             => __( 'Edit Tournois', 'ogames' ),
			'view_item'             => __( 'View Tournois', 'ogames' ),
			'view_items'            => __( 'View Tournois', 'ogames' ),
			'search_items'          => __( 'Search Tournois', 'ogames' ),
			'not_found'             => __( 'No Tournois found', 'ogames' ),
			'not_found_in_trash'    => __( 'No Tournois found in trash', 'ogames' ),
			'parent_item_colon'     => __( 'Parent Tournois:', 'ogames' ),
			'menu_name'             => __( 'Tournois', 'ogames' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt', 'custom-fields', 'comments', 'revisions', 'array' ),
		'has_archive'           => false,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-money',
		'show_in_rest'          => true,
		'rest_base'             => 'tournaments',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'capabilities'          => [
			'read'                   => 'read',
			'edit_post'              => 'edit_tournament',
			'read_post'              => 'read_tournament',
			'delete_post'            => 'delete_tournament',
			'edit_posts'             => 'edit_tournaments',
			'edit_others_posts'      => 'edit_others_tournaments',
			'delete_posts'           => 'delete_tournaments',
			'publish_posts'          => 'publish_tournaments',
			'read_private_posts'     => 'read_private_tournaments',
			'delete_private_posts'   => 'delete_private_tournaments',
			'delete_published_posts' => 'delete_published_tournaments',
			'delete_others_posts'    => 'delete_others_tournaments',
			'edit_private_posts'     => 'edit_private_tournaments',
			'edit_published_posts'   => 'edit_published_tournaments',
			'create_posts'           => 'create_tournaments'
		],
	) );

    register_meta(
		'post',
		'title',
		[
			'object_subtype' => 'tournament',
			'type'           => 'integer',
			'single'         => true,
			'show_in_rest'   => true
		]
	);

	register_post_meta(
		'tournament',
		'content',
		[
			'type'           => 'integer',
			'single'         => true,
			'show_in_rest'   => true
		]
	);

	register_post_meta(
		'tournament',
		'dateStart',
		[
			'type'           => 'integer',
			'single'         => true,
			'show_in_rest'   => true
		]
	);

	register_post_meta(
		'tournament',
		'timeStart',
		[
			'type'           => 'integer',
			'single'         => true,
			'show_in_rest'   => true
		]
	);

	register_post_meta(
		'tournament',
		'maxParticipants',
		[
			'type'           => 'integer',
			'single'         => true,
			'show_in_rest'   => true
		]
	);

	register_post_meta(
		'tournament',
		'gameMode',
		[
			'type'           => 'integer',
			'single'         => true,
			'show_in_rest'   => true
		]
	);

	register_post_meta(
		'tournament',
		'details',
		[
			'type'           => 'integer',
			'single'         => true,
			'show_in_rest'   => true
		]
	);
}
add_action( 'init', 'tournament_init' );

/**
 * Sets the post updated messages for the `tournament` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `profile` post type.
 */
function tournament_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['tournament'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Tournois updated. <a target="_blank" href="%s">View Tournois</a>', 'ogames' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'ogames' ),
		3  => __( 'Custom field deleted.', 'ogames' ),
		4  => __( 'Tournois updated.', 'ogames' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Tournois restored to revision from %s', 'ogames' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Tournois published. <a href="%s">View Tournois</a>', 'ogames' ), esc_url( $permalink ) ),
		7  => __( 'Tournois saved.', 'ogames' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Tournois submitted. <a target="_blank" href="%s">Preview Tournois</a>', 'ogames' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Tournois scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Tournois</a>', 'ogames' ),
		date_i18n( __( 'M j, Y @ G:i', 'ogames' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Tournois draft updated. <a target="_blank" href="%s">Preview Tournois</a>', 'ogames' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'tournament_updated_messages' );


/**
 * Manually link meta cap
 *
 * @link http://justintadlock.com/archives/2010/07/10/meta-capabilities-for-custom-post-types
 */
function tournament_map_meta_cap($caps, $cap, $user_id, $args) {
	/* If editing, deleting, or reading a tournament, get the post and post type object. */
	if ( 'edit_tournament' === $cap || 'delete_tournament' === $cap || 'read_tournament' === $cap ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = [];
	}

	/* If editing a movie, assign the required capability. */
	if ( 'edit_tournament' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}

	/* If deleting a movie, assign the required capability. */
	elseif ( 'delete_tournament' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}

	/* If reading a private movie, assign the required capability. */
	elseif ( 'read_tournament' == $cap ) {

		if ( 'private' != $post->post_status )
			$caps[] = 'read';
		elseif ( $user_id == $post->post_author )
			$caps[] = 'read';
		else
			$caps[] = $post_type->cap->read_private_posts;
	}

	/* Return the capabilities required by the user. */
	return $caps;
}

add_filter('map_meta_cap', 'tournament_map_meta_cap', 10, 4);
