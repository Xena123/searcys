<?php
/*
 * Plugin Name: Fanatic Green Dot
 * Plugin URI: http://fanaticdesign.co.uk/
 * Description: Adds editable content blocks with user friendly green dots for easy editing
 * Version: 1.0
 * Date: 17 May 2017
 * Author: Fanatic Design Ltd
 * Author URI: http://fanaticdesign.co.uk/
 **/

defined( 'ABSPATH' ) or die( 'Silence is golden ...' );
define( 'PLUGIN_DIR', plugin_dir_path(__FILE__).'/' );

/*
TODO: Remove commenting once Front-End Nugget Dropdown feature is added. This feature will rely on acf_form() function to work properly.
function gd_plugin_activate(){
    // Require parent plugin
    if ( ! is_plugin_active( 'advanced-custom-fields/acf.php' ) and current_user_can( 'activate_plugins' ) ) {
      // Stop activation redirect and show error
      wp_die('The Green Dot plugin requires <a href="https://www.advancedcustomfields.com/">Advanced Custom Fields</a> to operate properly. Please install this plugin and try again.<br><a href="' . admin_url( 'plugins.php' ) . '">&laquo; Return to Plugins</a>');
    }
}
register_activation_hook( __FILE__, 'gd_plugin_activate' );
*/

/* Load included files **/
require_once( plugin_dir_path( __FILE__ ) . 'includes/admin-view.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/fanatic-blocks.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/nugget-blocks.php');
// Load Post Types & Post Meta
require_once( plugin_dir_path( __FILE__ ) . 'includes/post_types/blocks.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/post_types/nuggets.php');
//require_once( plugin_dir_path( __FILE__ ) . 'includes/post_types/images.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/post_types/links.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/post_types/single_lines.php');

// Global Post Meta
require_once( plugin_dir_path( __FILE__ ) . 'includes/custom-fields.php' );
// Global Taxonomy
require_once( plugin_dir_path( __FILE__ ) . 'includes/taxonomy.php');

/* If greenDot class doesn't exist, create it **/
if ( !class_exists('greenDot') ) {
	/* @TODO: Find out if there's better solution **/
	if(!function_exists('wp_get_current_user')) {
		include(ABSPATH . "wp-includes/pluggable.php");
	}

	class greenDot {
		function __construct() {
			// Register style sheet.
			add_action( 'wp_enqueue_scripts', array( $this, 'greendot_styles_scripts' ) );
		}
		function greendot_styles_scripts() {
			wp_register_style( 'gd_css', plugins_url( 'green-dot/assets/css/green.min.css' ) );
			wp_enqueue_style( 'gd_css' );
			wp_register_script( 'gd_js', plugins_url( 'green-dot/assets/js/green.min.js' ), array('jquery'),'0.1',true );
			wp_enqueue_script( 'gd_js' );
		}
	}
	/* Only start if user can edit posts **/
	if (  current_user_can('edit_posts') ) {
		$greenDot = new greenDot();
	}
}
