<?php

/*
Plugin Name: Core Site Functionality
Plugin URI: http://www.fanaticdesign.co.uk/
Description: Essentials for functionality of the website
Author: The Fanatic team
Author URI: http://www.fanaticdesign.co.uk/
*/

if ( !function_exists('do_action') ) {
	exit();
}

require_once( plugin_dir_path( __FILE__ ) . 'includes/meta.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/post-types.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/taxonomy.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/custom-fields.php' );
foreach (glob(plugin_dir_path( __FILE__ ) . "includes/functions/*.php") as $filename) {
  require_once $filename;
}
foreach (glob(plugin_dir_path( __FILE__ ) . "includes/functions/*.php") as $filename) {
  require_once $filename;
}
foreach (glob(plugin_dir_path( __FILE__ ) . "includes/shortcodes/*.php") as $filename) {
  require_once $filename;
}
require_once( plugin_dir_path( __FILE__ ) . 'includes/acf_override.php' );
