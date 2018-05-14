<?php



/* Register Link Post Type **/
function gd_link() {
	$labels = array(
		'name'                  => _x( 'Links', 'Post Type General Name', 'fanatic' ),
		'singular_name'         => _x( 'Link', 'Post Type Singular Name', 'fanatic' ),
		'menu_name'             => __( 'Link', 'fanatic' ),
		'name_admin_bar'        => __( 'Link', 'fanatic' ),
		'archives'              => __( 'Item Archives', 'fanatic' ),
		'parent_item_colon'     => __( 'Parent Item:', 'fanatic' ),
		'all_items'             => __( 'All Items', 'fanatic' ),
		'add_new_item'          => __( 'Add New Item', 'fanatic' ),
		'add_new'               => __( 'Add New', 'fanatic' ),
		'new_item'              => __( 'New Item', 'fanatic' ),
		'edit_item'             => __( 'Edit Item', 'fanatic' ),
		'update_item'           => __( 'Update Item', 'fanatic' ),
		'view_item'             => __( 'View Item', 'fanatic' ),
		'search_items'          => __( 'Search Item', 'fanatic' ),
		'not_found'             => __( 'Not found', 'fanatic' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'fanatic' ),
		'featured_image'        => __( 'Featured Image', 'fanatic' ),
		'set_featured_image'    => __( 'Set featured image', 'fanatic' ),
		'remove_featured_image' => __( 'Remove featured image', 'fanatic' ),
		'use_featured_image'    => __( 'Use as featured image', 'fanatic' ),
		'insert_into_item'      => __( 'Insert into item', 'fanatic' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'fanatic' ),
		'items_list'            => __( 'Items list', 'fanatic' ),
		'items_list_navigation' => __( 'Items list navigation', 'fanatic' ),
		'filter_items_list'     => __( 'Filter items list', 'fanatic' ),
	);
	$args = array(
		'label'                 => __( 'Links', 'fanatic' ),
		'description'           => __( 'Links', 'fanatic' ),
		'labels'                => $labels,
		'supports'              => array( 'title','page-attributes','thumbnail' ),
		'taxonomies'            => array( 'area' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 21,
		'menu_icon'             => 'dashicons-admin-links',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'rewrite'               => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'gd_link', $args );
}
add_action( 'init', 'gd_link', 0 );


/* Register Link Meta **/
class gd_link_meta {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	public function init_metabox() {

		add_action( 'add_meta_boxes',        array( $this, 'add_metabox' )         );
		add_action( 'save_post',             array( $this, 'save_metabox' ), 10, 2 );

	}

	public function add_metabox() {

		add_meta_box(
			'link_meta',
			__( 'Link Meta', 'fanatic' ),
			array( $this, 'render_metabox' ),
			'gd_link',
			'advanced',
			'high'
		);

	}

	public function render_metabox( $post ) {

		// Retrieve an existing value from the database.
		$gd_link_text = get_post_meta( $post->ID, 'gd_link_text', true );
		$gd_link_url = get_post_meta( $post->ID, 'gd_link_url', true );
		$gd_new_tab = get_post_meta( $post->ID, 'gd_new_tab', true );
		$gd_font_awesome = get_post_meta( $post->ID, 'gd_font_awesome', true );

		// Set default values.
		if( empty( $gd_link_text ) ) $gd_link_text = '';
		if( empty( $gd_link_url ) ) $gd_link_url = '';
		if( empty( $gd_new_tab ) ) $gd_new_tab = '';
		if( empty( $gd_font_awesome ) ) $gd_font_awesome = '';

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="gd_font_awesome" class="gd_font_awesome_label">' . __( 'Font Awesome Icon', 'fanatic' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="gd_font_awesome" name="gd_font_awesome" class="gd_font_awesome_field" placeholder="' . esc_attr__( '', 'fanatic' ) . '" value="' . esc_attr( $gd_font_awesome ) . '">';
		echo '			<p class="description">' . __( 'Enter icon class to use icon instead of text: http://fontawesome.io/icons/', 'fanatic' ) . '</p>';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="gd_link_text" class="gd_link_text_label">' . __( 'Link Text', 'fanatic' ) . '</label></th>';
		echo '		<td>';
		echo '			<textarea id="gd_link_text" name="gd_link_text" class="gd_link_text_field" placeholder="' . esc_attr__( '', 'fanatic' ) . '">' . $gd_link_text . '</textarea>';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="gd_link_url" class="gd_link_url_label">' . __( 'Link URL', 'fanatic' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="url" id="gd_link_url" name="gd_link_url" class="gd_link_url_field" placeholder="' . esc_attr__( '', 'fanatic' ) . '" value="' . esc_attr( $gd_link_url ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="gd_new_tab" class="gd_new_tab_label">' . __( 'Open Link in New Tab?', 'fanatic' ) . '</label></th>';
		echo '		<td>';
		echo '			<label><input type="checkbox" id="gd_new_tab" name="gd_new_tab" class="gd_new_tab_field" value="' . $gd_new_tab . '" ' . checked( $gd_new_tab, 'checked', false ) . '> ' . __( '', 'fanatic' ) . '</label>';
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {

		// Sanitize user input.
    $gd_new_font_awesome = isset( $_POST[ 'gd_font_awesome' ] ) ? sanitize_text_field( $_POST[ 'gd_font_awesome' ] ) : '';
		$gd_new_link_text = isset( $_POST[ 'gd_link_text' ] ) ? sanitize_text_field( $_POST[ 'gd_link_text' ] ) : '';
		$gd_new_link_url = isset( $_POST[ 'gd_link_url' ] ) ? esc_url( $_POST[ 'gd_link_url' ] ) : '';
		$gd_new_new_tab = isset( $_POST[ 'gd_new_tab' ] ) ? 'checked'  : '';

		// Update the meta field in the database.
    update_post_meta( $post_id, 'gd_font_awesome', $gd_new_font_awesome );
		update_post_meta( $post_id, 'gd_link_text', $gd_new_link_text );
		update_post_meta( $post_id, 'gd_link_url', $gd_new_link_url );
		update_post_meta( $post_id, 'gd_new_tab', $gd_new_new_tab );

	}

}

new gd_link_meta;
