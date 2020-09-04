<?php

/**
 * Registers the `news` post type.
 */
function news_init() {
	register_post_type( 'news', array(
		'labels'                => array(
			'name'                  => __( 'Actualités', 'ogames' ),
			'singular_name'         => __( 'Actualités', 'ogames' ),
			'all_items'             => __( 'All Actualités', 'ogames' ),
			'archives'              => __( 'Actualités Archives', 'ogames' ),
			'attributes'            => __( 'Actualités Attributes', 'ogames' ),
			'insert_into_item'      => __( 'Insert into Actualités', 'ogames' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Actualités', 'ogames' ),
			'featured_image'        => _x( 'Featured Image', 'news', 'ogames' ),
			'set_featured_image'    => _x( 'Set featured image', 'news', 'ogames' ),
			'remove_featured_image' => _x( 'Remove featured image', 'news', 'ogames' ),
			'use_featured_image'    => _x( 'Use as featured image', 'news', 'ogames' ),
			'filter_items_list'     => __( 'Filter Actualités list', 'ogames' ),
			'items_list_navigation' => __( 'Actualités list navigation', 'ogames' ),
			'items_list'            => __( 'Actualités list', 'ogames' ),
			'new_item'              => __( 'New Actualités', 'ogames' ),
			'add_new'               => __( 'Add New', 'ogames' ),
			'add_new_item'          => __( 'Add New Actualités', 'ogames' ),
			'edit_item'             => __( 'Edit Actualités', 'ogames' ),
			'view_item'             => __( 'View Actualités', 'ogames' ),
			'view_items'            => __( 'View Actualités', 'ogames' ),
			'search_items'          => __( 'Search Actualités', 'ogames' ),
			'not_found'             => __( 'No Actualités found', 'ogames' ),
			'not_found_in_trash'    => __( 'No Actualités found in trash', 'ogames' ),
			'parent_item_colon'     => __( 'Parent Actualités:', 'ogames' ),
			'menu_name'             => __( 'Actualités', 'ogames' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt', 'custom-fields', 'comments', 'revisions' , 'array' ),
		'has_archive'           => false,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-welcome-widgets-menus',
		'show_in_rest'          => true,
		'rest_base'             => 'newses',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'capabilities'          => [
			'read'                   => 'read',
			'edit_post'              => 'edit_news',
			'read_post'              => 'read_news',
			'delete_post'            => 'delete_news',
			'edit_posts'             => 'edit_newses',
			'edit_others_posts'      => 'edit_others_newses',
			'delete_posts'           => 'delete_newses',
			'publish_posts'          => 'publish_newses',
			'read_private_posts'     => 'read_private_newses',
			'delete_private_posts'   => 'delete_private_newses',
			'delete_published_posts' => 'delete_published_newses',
			'delete_others_posts'    => 'delete_others_newses',
			'edit_private_posts'     => 'edit_private_newses',
			'edit_published_posts'   => 'edit_published_newses',
			'create_posts'           => 'create_newses'
		],
	) );

    register_meta(
		'post',
		'news_game',
		[
			'object_subtype' => 'news',
			'type'           => 'integer',
			'single'         => true,
			'show_in_rest'   => true
		]
	);

	register_post_meta(
		'news',
		'date',
		[
			'type'           => 'integer',
			'single'         => true,
			'show_in_rest'   => true
		]
	);
}
add_action( 'init', 'news_init' );

/**
 * Sets the post updated messages for the `news` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `news` post type.
 */
function news_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['news'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Actualités updated. <a target="_blank" href="%s">View Actualités</a>', 'ogames' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'ogames' ),
		3  => __( 'Custom field deleted.', 'ogames' ),
		4  => __( 'Actualités updated.', 'ogames' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Actualités restored to revision from %s', 'ogames' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Actualités published. <a href="%s">View Actualités</a>', 'ogames' ), esc_url( $permalink ) ),
		7  => __( 'Actualités saved.', 'ogames' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Actualités submitted. <a target="_blank" href="%s">Preview Actualités</a>', 'ogames' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Actualités scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Actualités</a>', 'ogames' ),
		date_i18n( __( 'M j, Y @ G:i', 'ogames' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Actualités draft updated. <a target="_blank" href="%s">Preview Actualités</a>', 'ogames' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'news_updated_messages' );


/**
 * Manually link meta cap
 *
 * @link http://justintadlock.com/archives/2010/07/10/meta-capabilities-for-custom-post-types
 */
function news_map_meta_cap($caps, $cap, $user_id, $args) {
	/* If editing, deleting, or reading a tournament, get the post and post type object. */
	if ( 'edit_news' === $cap || 'delete_news' === $cap || 'read_news' === $cap ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = [];
	}

	/* If editing a movie, assign the required capability. */
	if ( 'edit_news' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}

	/* If deleting a movie, assign the required capability. */
	elseif ( 'delete_news' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}

	/* If reading a private movie, assign the required capability. */
	elseif ( 'read_news' == $cap ) {

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

add_filter('map_meta_cap', 'news_map_meta_cap', 10, 4);
