<?php

function register_tournament_comment_count_rest_field() {
	register_rest_field(
		'tournament',
		'comment_count',
		[
			'get_callback' => 'get_tournament_comment_count',
			// 'update_callback' => function( $tournament ) { }

		]
	);
}

/**
 * Get tournament comment count
 *
 * @param array $tournament Tournament data
 *
 * @return int Comment count
 */
function get_tournament_comment_count( $tournament ) {
	$comment_count = get_comments_number( $tournament['id'] );

	// return (int) $comment_count;
	return intval( $comment_count );
}

/**
 * Add rest_api_init hook action
 *
 * @link https://developer.wordpress.org/reference/hooks/rest_api_init/
 */
add_action( 'rest_api_init', 'register_tournament_comment_count_rest_field' );
