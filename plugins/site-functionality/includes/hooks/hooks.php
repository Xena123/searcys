<?
/*
  Useful Wordpress Hooks
**/

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more_text) {
	global $post;
	return '... <a href="'. get_permalink($post->ID) . '">' . $more_text . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Remove image caption width
add_filter('img_caption_shortcode', 'my_img_caption_shortcode_filter',10,3);

//Add active class to selected menu item
function special_nav_class($classes, $item){
	if( in_array('current-menu-item', $classes) ){
		$classes[] = 'active ';
	}
	return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);


// Change wordpress admin footer text
function remove_footer_admin() {
	echo 'Fueled by <a href="http://www.wordpress.org" target="_blank">WordPress</a> | Designed by <a href="http://fanaticdesign.co.uk" target="_blank">Fanatic Design</a></p>';
}
add_filter('admin_footer_text', 'remove_footer_admin');



/* Remove space at top of page when logged in **/
function my_filter_head() {
 remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'my_filter_head');

/* Sort Portfolio archive to order by order field **/
add_action( 'pre_get_posts', 'my_change_sort_order');
    function my_change_sort_order($query){
        if( is_post_type_archive( 'portfolio' ) ):
           $query->set( 'order', 'ASC' );
           $query->set( 'orderby', 'menu_order' );
        endif;
    };

//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

