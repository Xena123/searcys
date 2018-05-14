<?php

/* Register Area Taxonomy **/
function gd_area() {
	$labels = array(
		'name'                       => _x( 'Areas', 'Taxonomy General Name', 'fanatic' ),
		'singular_name'              => _x( 'Area', 'Taxonomy Singular Name', 'fanatic' ),
		'menu_name'                  => __( 'Area', 'fanatic' ),
		'all_items'                  => __( 'All Areas', 'fanatic' ),
		'parent_item'                => __( 'Parent Area', 'fanatic' ),
		'parent_item_colon'          => __( 'Parent Area:', 'fanatic' ),
		'new_item_name'              => __( 'New Area Name', 'fanatic' ),
		'add_new_item'               => __( 'Add New Area', 'fanatic' ),
		'edit_item'                  => __( 'Edit Area', 'fanatic' ),
		'update_item'                => __( 'Update Area', 'fanatic' ),
		'view_item'                  => __( 'View Area', 'fanatic' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'fanatic' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'fanatic' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'fanatic' ),
		'popular_items'              => __( 'Popular Items', 'fanatic' ),
		'search_items'               => __( 'Search Items', 'fanatic' ),
		'not_found'                  => __( 'Not Found', 'fanatic' ),
		'no_terms'                   => __( 'No items', 'fanatic' ),
		'items_list'                 => __( 'Items list', 'fanatic' ),
		'items_list_navigation'      => __( 'Items list navigation', 'fanatic' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => false,
	);
	register_taxonomy( 'area', array( 'block','single_line', 'nugget','page', 'hero_image' ), $args );
}
add_action( 'init', 'gd_area', 0 );
