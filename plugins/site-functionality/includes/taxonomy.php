<?php
/*
  Taxonomy
**/
// Register Venue Location Taxonomy
function venue_location() {

  $labels = array(
    'name'                       => _x( 'Location', 'Taxonomy General Name', 'text_domain' ),
    'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'text_domain' ),
    'menu_name'                  => __( 'Location', 'text_domain' ),
    'all_items'                  => __( 'All Items', 'text_domain' ),
    'parent_item'                => __( 'Parent Item', 'text_domain' ),
    'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
    'new_item_name'              => __( 'New Item Name', 'text_domain' ),
    'add_new_item'               => __( 'Add New Item', 'text_domain' ),
    'edit_item'                  => __( 'Edit Item', 'text_domain' ),
    'update_item'                => __( 'Update Item', 'text_domain' ),
    'view_item'                  => __( 'View Item', 'text_domain' ),
    'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
    'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
    'popular_items'              => __( 'Popular Items', 'text_domain' ),
    'search_items'               => __( 'Search Items', 'text_domain' ),
    'not_found'                  => __( 'Not Found', 'text_domain' ),
    'no_terms'                   => __( 'No items', 'text_domain' ),
    'items_list'                 => __( 'Items list', 'text_domain' ),
    'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'venue-location', array( 'venues' ), $args );

}
add_action( 'init', 'venue_location', 0 );

// Register Venue Event Taxonomy
function venue_event() {

  $labels = array(
    'name'                       => _x( 'Event Type', 'Taxonomy General Name', 'text_domain' ),
    'singular_name'              => _x( 'Event Type', 'Taxonomy Singular Name', 'text_domain' ),
    'menu_name'                  => __( 'Event Type', 'text_domain' ),
    'all_items'                  => __( 'All Items', 'text_domain' ),
    'parent_item'                => __( 'Parent Item', 'text_domain' ),
    'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
    'new_item_name'              => __( 'New Item Name', 'text_domain' ),
    'add_new_item'               => __( 'Add New Item', 'text_domain' ),
    'edit_item'                  => __( 'Edit Item', 'text_domain' ),
    'update_item'                => __( 'Update Item', 'text_domain' ),
    'view_item'                  => __( 'View Item', 'text_domain' ),
    'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
    'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
    'popular_items'              => __( 'Popular Items', 'text_domain' ),
    'search_items'               => __( 'Search Items', 'text_domain' ),
    'not_found'                  => __( 'Not Found', 'text_domain' ),
    'no_terms'                   => __( 'No items', 'text_domain' ),
    'items_list'                 => __( 'Items list', 'text_domain' ),
    'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'venue-event', array( 'venues' ), $args );

}
add_action( 'init', 'venue_event', 0 );