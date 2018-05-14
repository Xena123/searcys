<?php

/* Register Block Post Type **/
function gd_block() {
	$labels = array(
		'name'                  => _x( 'Blocks', 'Post Type General Name', 'fanatic' ),
		'singular_name'         => _x( 'Block', 'Post Type Singular Name', 'fanatic' ),
		'menu_name'             => __( 'Block', 'fanatic' ),
		'name_admin_bar'        => __( 'Block', 'fanatic' ),
		'archives'              => __( 'Block Archives', 'fanatic' ),
		'parent_item_colon'     => __( 'Parent Block:', 'fanatic' ),
		'all_items'             => __( 'All Blocks', 'fanatic' ),
		'add_new_item'          => __( 'Add New Block', 'fanatic' ),
		'add_new'               => __( 'Add New', 'fanatic' ),
		'new_item'              => __( 'New Block', 'fanatic' ),
		'edit_item'             => __( 'Edit Block', 'fanatic' ),
		'update_item'           => __( 'Update Block', 'fanatic' ),
		'view_item'             => __( 'View Block', 'fanatic' ),
		'search_items'          => __( 'Search Block', 'fanatic' ),
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
		'label'                 => __( 'Block', 'fanatic' ),
		'description'           => __( 'Building block', 'fanatic' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail','page-attributes', ),
		'taxonomies'            => array( 'area' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-screenoptions',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'rewrite'               => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'gd_block', $args );

}
add_action( 'init', 'gd_block', 0 );
