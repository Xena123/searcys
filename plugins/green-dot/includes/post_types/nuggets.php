<?php

/* Register Nugget Post Type **/
function gd_nugget() {
	$labels = array(
		'name'                  => _x( 'Nuggets', 'Post Type General Name', 'fanatic' ),
		'singular_name'         => _x( 'Nugget', 'Post Type Singular Name', 'fanatic' ),
		'menu_name'             => __( 'Nugget', 'fanatic' ),
		'name_admin_bar'        => __( 'Nuggets', 'fanatic' ),
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
		'label'                 => __( 'Nugget', 'fanatic' ),
		'description'           => __( 'Single line fields', 'fanatic' ),
		'labels'                => $labels,
		'supports'              => array( 'title','page-attributes', ),
		'taxonomies'            => array( 'area' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 24,
		'menu_icon'             => 'dashicons-welcome-widgets-menus',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'rewrite'               => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'gd_nugget', $args );
}
add_action( 'init', 'gd_nugget', 0 );



// Nugget Meta
class gd_nugget_meta {

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
			'nugget_meta',
			__( 'Nugget Meta', 'fanatic' ),
			array( $this, 'render_metabox' ),
			'gd_nugget',
			'advanced',
			'high'
		);
	}

	public function render_metabox( $post ) {


		// Retrieve an existing value from the database.
		$gd_nugget_post_type = get_post_meta( $post->ID, 'gd_nugget_post_type', true );
		$gd_nugget_post_id = get_post_meta( $post->ID, 'gd_nugget_post_id', true );

		// Set default values.
   if ( empty( $gd_nugget_post_type ) || $gd_nugget_post_type == '' ) {
      if ( isset( $_GET['link_post'] ) ) {
        $getPostType = $_GET['link_post'];
        $gd_nugget_post_type = $getPostType;
      }
    }

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="gd_nugget_post_type" class="gd_nugget_post_type_label">' . __( 'Post Type', 'fanatic' ) . '</label></th>';
		echo '		<td>';


    echo '			<select id="gd_nugget_post_type" name="gd_nugget_post_type" class="gd_nugget_post_type_field">';

    echo '			<option value="gd_" ' . selected( $gd_nugget_post_type, 'gd_', false ) . '> ' . __( '', 'fanatic' ) . '</option>';
      $postTypeArgs = array(
        'publicly_queryable' => true,
        'public' => true
      );
      $postTypes = get_post_types( $postTypeArgs, 'objects', 'and');
      foreach ($postTypes as $post) {
        if ( $post->name == $getPostType) {
          echo '<option value="' . $post->name . '" ' . selected . '> ' . __( $post->name, 'fanatic' ) . '</option>';
        }
        else if ( $post->name != 'attachment' ) {
          echo '<option value="' . $post->name . '" ' . selected( $gd_nugget_post_type, $post->name, false ) . '> ' . __( $post->name, 'fanatic' ) . '</option>';
        }
      }
		echo '			</select>';



		echo '	<tr>';
		echo '		<th><label for="gd_nugget_post_id" class="gd_nugget_post_id_label">' . __( 'Post ID', 'fanatic' ) . '</label></th>';
		echo '		<td>';
		echo '			<select id="gd_nugget_post_id" name="gd_nugget_post_id" class="gd_nugget_post_id_field">';
		echo '			<option value="gd_" ' . selected( $gd_nugget_post_id, 'gd_', false ) . '> ' . __( '', 'fanatic' ) . '</option>';
    if( !empty( $gd_nugget_post_type ) ) {
      $args = array(
        'posts_per_page' => -1,
        'post_type'   => $gd_nugget_post_type
      );
      $posts = get_posts($args);
      foreach ($posts as $post) {
        echo '<option value="' . $post->ID . '" ' . selected( $gd_nugget_post_id, $post->ID, false ) . '> ' . __( $post->post_title, 'fanatic' ) . '</option>';
      }
    }

		echo '			</select>';
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {

		// Sanitize user input.
		$gd_new_nugget_post_type = isset( $_POST[ 'gd_nugget_post_type' ] ) ? sanitize_text_field( $_POST[ 'gd_nugget_post_type' ] ) : '';

		$gd_new_nugget_post_id = isset( $_POST[ 'gd_nugget_post_id' ] ) ? $_POST[ 'gd_nugget_post_id' ] : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'gd_nugget_post_type', $gd_new_nugget_post_type );

		update_post_meta( $post_id, 'gd_nugget_post_id', $gd_new_nugget_post_id );

	}

}

new gd_nugget_meta;
