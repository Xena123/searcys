<?php


/* Register Single-Line Post Type **/
function gd_single_line() {
	$labels = array(
		'name'                  => _x( 'Single lines', 'Post Type General Name', 'fanatic' ),
		'singular_name'         => _x( 'Single line', 'Post Type Singular Name', 'fanatic' ),
		'menu_name'             => __( 'Single line', 'fanatic' ),
		'name_admin_bar'        => __( 'Single line', 'fanatic' ),
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
		'label'                 => __( 'Single line', 'fanatic' ),
		'description'           => __( 'Single line fields', 'fanatic' ),
		'labels'                => $labels,
		'supports'              => array( 'title','page-attributes','thumbnail' ),
		'taxonomies'            => array( 'area' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 21,
		'menu_icon'             => 'dashicons-format-quote',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'rewrite'               => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'gd_single_line', $args );
}
add_action( 'init', 'gd_single_line', 0 );
