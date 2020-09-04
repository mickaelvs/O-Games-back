<?php
/**
 * Plugin Name:     oGames
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          O'clock Fantasy/Maude/Mikl
 * Author URI:      YOUR SITE HERE
 * Text Domain:     ogames
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         oGames
 */

// Your code starts here.
if (! defined('WPINC')) {
	http_response_code(404);
	exit;
}

require plugin_dir_path( __FILE__ ) . 'post-types/tournament.php';
require plugin_dir_path( __FILE__ ) . 'post-types/news.php';
require plugin_dir_path( __FILE__ ) . 'post-types/profile.php';
require plugin_dir_path( __FILE__ ) . 'taxonomies/detail.php';
require plugin_dir_path( __FILE__ ) . 'taxonomies/type.php';
require plugin_dir_path( __FILE__ ) . 'roles/administrator.php';
require plugin_dir_path( __FILE__ ) . 'roles/gamer.php';
require plugin_dir_path( __FILE__ ) . 'roles/viewer.php';
require plugin_dir_path( __FILE__ ) . 'rest-fields/tournament-comment-count.php';
require plugin_dir_path( __FILE__ ) . 'rest-endpoints/invite-friend.php';

register_activation_hook(
	__FILE__,
	function() {
		add_gamer_role();
		add_viewer_role();

		add_administrator_capabilities();
	}
);

register_deactivation_hook(
	__FILE__,
	function() {
		remove_gamer_role();
		remove_viewer_role();

		remove_administrator_capabilities();
	}
);
