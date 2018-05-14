<?php
class gd_admin_page {

	public function __construct() {

		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
		add_action( 'admin_init', array( $this, 'init_settings'  ) );

	}

	public function add_admin_menu() {

		add_options_page(
			esc_html__( 'Fanatic Settings', 'fanatic' ),
			esc_html__( 'Fanatic Settings', 'fanatic' ),
			'manage_options',
			'gd_settings',
			array( $this, 'page_layout' )
		);

	}

	public function init_settings() {

		register_setting(
			'gd_settings',
			'gd_settings'
		);

		add_settings_section(
			'gd_settings_section',
			'',
			false,
			'gd_settings'
		);

		add_settings_field(
			'gd_display_block',
			__( 'Display Blocks', 'fanatic' ),
			array( $this, 'render_gd_display_block_field' ),
			'gd_settings',
			'gd_settings_section'
		);
		add_settings_field(
			'gd_display_nugget',
			__( 'Display Nuggets', 'fanatic' ),
			array( $this, 'render_gd_display_nugget_field' ),
			'gd_settings',
			'gd_settings_section'
		);
		add_settings_field(
			'gd_display_single',
			__( 'Display Single Lines', 'fanatic' ),
			array( $this, 'render_gd_display_single_field' ),
			'gd_settings',
			'gd_settings_section'
		);
		add_settings_field(
			'gd_display_image',
			__( 'Display Image Blocks', 'fanatic' ),
			array( $this, 'render_gd_display_image_field' ),
			'gd_settings',
			'gd_settings_section'
		);

	}

	public function page_layout() {

		// Check required user capability
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'fanatic' ) );
		}

		// Admin Page Layout
		echo '<div class="wrap">' . "\n";
		echo '	<h1>' . get_admin_page_title() . '</h1>' . "\n";
		echo '	<form action="options.php" method="post">' . "\n";

		settings_fields( 'gd_settings' );
		do_settings_sections( 'gd_settings' );
		submit_button();

		echo '	</form>' . "\n";
		echo '</div>' . "\n";

?>

    <h2>USING THE FANATIC GREEN DOT PLUGIN</h2>
    <h3>Creating a new block area</h3>
    <p>New Fanatic blocks are created using the fanaticBlock() function:</p>
    <pre style="padding-left: 10px;">fanaticBlock( $embed, $style="", $count=1, $type="block", $addButton=false )</pre>
    <ul>
      <li><strong>Arguments</strong></li>
      <li style="padding-left: 10px;">$embed (string): Unique identification for connecting content to a area on a page (e.g. $post->ID . "random_string")</li>
      <li style="padding-left: 10px;">$style (string):	Style of displayed blocks(required)</li>
      <li style="padding-left: 10px;">$count (int):	Number of blocks to be returned</li>
      <li style="padding-left: 10px;">$type  (string):	Post type: gd_block, gd_single_line, gd_nugget, gd_image</li>
      <li style="padding-left: 10px;">$addButton (bool): Show '+' button to add additional blocks when actual blocks < $count</li>
    </ul>

    <h3>Creating Fanatic Block Template</h3>
    <p>The $style argument needs to match the name of a file in plugins/green_dot/templates/.  This file contains the php &amp; html needed to generate the content displayed on the page.</p>
    <p>For instance, if you had a block called social icon, you could use fanaticBlock( 'social-' . $post->ID, social_icon, 5, 'block', true ) and create a file called plugins/green_dot/templates/social_icon.php.</p>

    <h3>Adding a front-end edit button</h3>
    <p>You can add the edit icon to any block or content area by using the function gd_insertEdit();</p>


<?php

	}

	function render_gd_display_block_field() {

		// Retrieve data from the database.
		$options = get_option( 'gd_settings' );

		// Set default value.
		$value = isset( $options['gd_display_block'] ) ? $options['gd_display_block'] : '';

		// Field output.
		echo '<input type="checkbox" name="gd_settings[gd_display_block]" class="gd_display_block_field" value="1" ' . checked( $value, 'checked', false ) . '> ' . __( '', 'fanatic' );

	}

	function render_gd_display_nugget_field() {

		// Retrieve data from the database.
		$options = get_option( 'gd_settings' );

		// Set default value.
		$value = isset( $options['gd_display_nugget'] ) ? $options['gd_display_nugget'] : '';

		// Field output.
		echo '<input type="checkbox" name="gd_settings[gd_display_nugget]" class="gd_display_nugget_field" value="1" ' . checked( $value, 'checked', false ) . '> ' . __( '', 'fanatic' );

	}

	function render_gd_display_single_field() {

		// Retrieve data from the database.
		$options = get_option( 'gd_settings' );

		// Set default value.
		$value = isset( $options['gd_display_single'] ) ? $options['gd_display_single'] : '';

		// Field output.
		echo '<input type="checkbox" name="gd_settings[gd_display_single]" class="gd_display_single_field" value="1" ' . checked( $value, 'checked', false ) . '> ' . __( '', 'fanatic' );

	}

	function render_gd_display_image_field() {

		// Retrieve data from the database.
		$options = get_option( 'gd_settings' );

		// Set default value.
		$value = isset( $options['gd_display_image'] ) ? $options['gd_display_image'] : '';

		// Field output.
		echo '<input type="checkbox" name="gd_settings[gd_display_image]" class="gd_display_image_field" value="1" ' . checked( $value, 'checked', false ) . '> ' . __( '', 'fanatic' );

	}

}

new gd_admin_page;
