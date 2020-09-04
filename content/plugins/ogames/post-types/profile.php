<?php

/**
 * Registers the `profile` post type.
 */
function profile_init() {
	register_post_type( 'profile', array(
		'labels'                => array(
			'name'                  => __( 'Profil', 'ogames' ),
			'singular_name'         => __( 'Profil', 'ogames' ),
			'all_items'             => __( 'All Profil', 'ogames' ),
			'archives'              => __( 'Profil Archives', 'ogames' ),
			'attributes'            => __( 'Profil Attributes', 'ogames' ),
			'insert_into_item'      => __( 'Insert into Profil', 'ogames' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Profil', 'ogames' ),
			'featured_image'        => _x( 'Featured Image', 'profile', 'ogames' ),
			'set_featured_image'    => _x( 'Set featured image', 'profile', 'ogames' ),
			'remove_featured_image' => _x( 'Remove featured image', 'profile', 'ogames' ),
			'use_featured_image'    => _x( 'Use as featured image', 'profile', 'ogames' ),
			'filter_items_list'     => __( 'Filter Profil list', 'ogames' ),
			'items_list_navigation' => __( 'Profil list navigation', 'ogames' ),
			'items_list'            => __( 'Profil list', 'ogames' ),
			'new_item'              => __( 'New Profil', 'ogames' ),
			'add_new'               => __( 'Add New', 'ogames' ),
			'add_new_item'          => __( 'Add New Profil', 'ogames' ),
			'edit_item'             => __( 'Edit Profil', 'ogames' ),
			'view_item'             => __( 'View Profil', 'ogames' ),
			'view_items'            => __( 'View Profil', 'ogames' ),
			'search_items'          => __( 'Search Profil', 'ogames' ),
			'not_found'             => __( 'No Profil found', 'ogames' ),
			'not_found_in_trash'    => __( 'No Profil found in trash', 'ogames' ),
			'parent_item_colon'     => __( 'Parent Profil:', 'ogames' ),
			'menu_name'             => __( 'Profil', 'ogames' ),
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
		'menu_icon'             => 'dashicons-buddicons-buddypress-logo',
		'show_in_rest'          => true,
		'rest_base'             => 'profiles',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'capabilities'          => [
			'read'                   => 'read',
			'edit_post'              => 'edit_profile',
			'read_post'              => 'read_profile',
			'delete_post'            => 'delete_profile',
			'edit_posts'             => 'edit_profiles',
			'edit_others_posts'      => 'edit_others_profiles',
			'delete_posts'           => 'delete_profiles',
			'publish_posts'          => 'publish_profiles',
			'read_private_posts'     => 'read_private_profiles',
			'delete_private_posts'   => 'delete_private_profiles',
			'delete_published_posts' => 'delete_published_profiles',
			'delete_others_posts'    => 'delete_others_profiles',
			'edit_private_posts'     => 'edit_private_profiles',
			'edit_published_posts'   => 'edit_published_profiles',
			'create_posts'           => 'create_profiles'
		],
	) );

    register_meta(
		'post',
		'info_profile',
		[
			'object_subtype' => 'profile',
			'type'           => 'integer',
			'single'         => true,
			'show_in_rest'   => true
		]
	);

	register_post_meta(
		'profile',
		'email',
		[
			'type'           => 'integer',
			'single'         => true,
			'show_in_rest'   => true
		]
	);
}
add_action( 'init', 'profile_init' );

/**
 * Sets the post updated messages for the `profile` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `profile` post type.
 */
function profile_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['profile'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Profil updated. <a target="_blank" href="%s">View Profil</a>', 'ogames' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'ogames' ),
		3  => __( 'Custom field deleted.', 'ogames' ),
		4  => __( 'Profil updated.', 'ogames' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Profil restored to revision from %s', 'ogames' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Profil published. <a href="%s">View Profil</a>', 'ogames' ), esc_url( $permalink ) ),
		7  => __( 'Profil saved.', 'ogames' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Profil submitted. <a target="_blank" href="%s">Preview Profil</a>', 'ogames' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Profil scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Profil</a>', 'ogames' ),
		date_i18n( __( 'M j, Y @ G:i', 'ogames' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Profil draft updated. <a target="_blank" href="%s">Preview Profil</a>', 'ogames' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'profile_updated_messages' );


/**
 * Manually link meta cap
 *
 * @link http://justintadlock.com/archives/2010/07/10/meta-capabilities-for-custom-post-types
 */
function profile_map_meta_cap($caps, $cap, $user_id, $args) {
	/* If editing, deleting, or reading a tournament, get the post and post type object. */
	if ( 'edit_profile' === $cap || 'delete_profile' === $cap || 'read_profile' === $cap ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = [];
	}

	/* If editing a movie, assign the required capability. */
	if ( 'edit_profile' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}

	/* If deleting a movie, assign the required capability. */
	elseif ( 'delete_profile' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}

	/* If reading a private movie, assign the required capability. */
	elseif ( 'read_profile' == $cap ) {

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

add_filter('map_meta_cap', 'profile_map_meta_cap', 10, 4);
