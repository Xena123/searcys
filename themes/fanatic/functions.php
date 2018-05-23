<?php

//Fanatic Setup
if (!function_exists('fanatic_setup')) {
	function fanatic_setup()
	{
		//Add Theme Support
		add_theme_support('html5');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		/* Theme Menus */
		register_nav_menus(
			array(
				'primary_1' => __('Primary Menu 1', 'fanatic'),
				'primary_2' => __('Primary Menu 2', 'fanatic'),
				'primary_3' => __('Primary Menu 3', 'fanatic'),
				'primary_4' => __('Primary Menu 4', 'fanatic'),
				'footer' => __('Footer Menu', 'fanatic'),
			)
		);
	}
}
add_action('after_setup_theme', 'fanatic_setup');

//Add image sizing for Image compression
add_theme_support('post-thumbnails');

add_image_size('home-slider', 1800, 500, true); // Homepage banner slider
add_image_size('hero-heading', 1800, 500, true); // Hero heading fullwidth images
//Grid Images
add_image_size('grid-half', 770, 350, true);
add_image_size('grid-twoThirds', 1050, 350, true);
add_image_size('grid-third', 500, 350, true);
add_image_size('grid-quarter', 370, 350, true);

add_image_size('listing-thumb', 350, 175, true); // Thumbnail on listing page

//Change JPEG compression on site
function my_prefix_regenerate_thumbnail_quality() {
    return 100;
}
add_filter( 'jpeg_quality', 'my_prefix_regenerate_thumbnail_quality');

/* Initialize widgets */
// function fanatic_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => 'Twitter',
// 		'id'            => 'twitter',
// 		'before_widget' => '<div class="">',
// 		'after_widget'  => '</div>',
// 		'before_title'  => '<h4 class="">',
// 		'after_title'   => '</h4>',
// 	) );
// }
// add_action( 'widgets_init', 'fanatic_widgets_init' );

function my_acf_init()
{

	acf_update_setting('google_api_key', 'AIzaSyDoWg7hLJxk_83LHhFl6tWKZ7UKjxttz3M');
}

add_action('acf/init', 'my_acf_init');


// Include CSS & JS files
function fanatic_scripts()
{
	// get google CDN jQuery rather than local copy
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', false);
	// Theme Styles
	wp_enqueue_style('slick-style', get_template_directory_uri() . '/assets/vendor/slick/slick.css');
	wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/vendor/slick/slick-theme.css');
	wp_enqueue_style('select2-style', get_template_directory_uri() . '/assets/vendor/select2/select2.min.css');
	wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css?' . time());
	// Fonts
	wp_enqueue_style('font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	// Theme Scripts
	wp_enqueue_script('slick-scripts', get_template_directory_uri() . '/assets/vendor/slick/slick.min.js', array('jquery'), false, true);
	wp_enqueue_script('turn-scripts', get_template_directory_uri() . '/assets/vendor/select2/select2.min.js', array('jquery'), '1.0', true);
	// wp_enqueue_script( 'isotope-scripts', get_template_directory_uri().'/assets/vendor/isotope/isotope.min.js', array( 'jquery' ), '1.0' , true );
	wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/assets/js/script.min.js?' . time(), array('jquery'), '1.0', false);
}

add_action('wp_enqueue_scripts', 'fanatic_scripts');

/* Load Include Files */
//require_once('inc/custom-post-types.php');
//require_once('inc/helper-functions.php');


/**
 * Hide editor on specific pages.
 *
 */
add_action('admin_head', 'hide_editor');

function hide_editor()
{
	// Get the Post ID.
	global $pagenow;
	if (!('post.php' == $pagenow)) return;

	global $post;
	// Get the Post ID.
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
	if (!isset($post_id)) return;
	// Hide the editor on the page titled 'Home Page'
	$pageName = get_the_title($post_id);
	if ($pageName == 'Home Page') {
		remove_post_type_support('page', 'editor');
	}
	// Hide the editor on all pages except ones using contact page template
	// Get the name of the Page Template file.
	$template_file = get_post_meta($post_id, '_wp_page_template', true);

	if ($template_file != 'page-templates/page-contact.php') { // the filename of the page template
		remove_post_type_support('page', 'editor');
	}
}


/* Remove unnecessary header links */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
//remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
//remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

/* Include file to recover ACF from php */
include get_template_directory() . '/acf-php-recovery.php';

/**
 * Register custom fields Global Options
 */

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug' => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect' => false
	));

}

/* -------------------------------
Venue advanced search functions
------------------------------- */

/* Build the list of venues dropdown */
function get_venues_list()
{

	$type = 'venues';
	$args = array(
		'post_type' => $type,
		'post_status' => 'publish',
		'meta_key' => 'venue_order_weight',
		'orderby' => 'meta_value',
		'post_parent' => 0,
		'posts_per_page' => -1,
		'ignore_sticky_posts' => true
	);
	$query = null;
	$query = new WP_Query($args);


	if ($query->have_posts()):
		?>
		<label class="select" for="venuefilter"><i><?php the_field('venues_default_text', 'option'); ?></i>
			<select class="venue-filter" name="venuefilter">
				<option value="0"><?php the_field('venues_default_text', 'option'); ?></option>
				<?php
				while ($query->have_posts()) : $query->the_post();
					?>
					<option value="<?php the_permalink(); ?>"><?php echo the_title(); ?></option>
				<?php
				endwhile;
				?>
			</select>
		</label>
	<?php
	endif;
	wp_reset_query();

}

/* Build the list of restaurants dropdown */
function get_restaurants_list()
{

	$type = 'venues';
//	$args = array(
//		'post_type' => $type,
//		'post_status' => 'publish',
//		'posts_per_page' => -1,
//		'ignore_sticky_posts'=> true,
//		'tax_query' => array(
//			array (
//				'taxonomy' => 'venue-event',
//				'field' => 'slug',
//				'terms' => 'restaurants',
//			)
//		),
//	);

	$args = array(
		'numberposts' => -1,
		'post_type' => $type,
		'meta_key' => 'order_on_search_bar',
		'orderby' => 'meta_value',
		'meta_query' => array(
			array(
				'key' => 'display_on_search_bar',
				'compare' => '==',
				'value' => '1'
			)
		)
	);


	$query = null;
	$query = new WP_Query($args);

	if ($query->have_posts()):
		?>
		<label class="select" for="restaurantfilter"><i><?php the_field('restaurants_default_text', 'option'); ?></i>
			<select class="restaurant-filter" name="restaurantfilter">
				<option value="0"><?php the_field('restaurants_default_text', 'option'); ?></option>
				<?php
				while ($query->have_posts()) : $query->the_post();
					$title = get_field("title_on_search_bar");
					if ($title) {
						?>
						<option value="<?php the_permalink(); ?>"><?php echo $title ?></option>
					<?php }
				endwhile;
				?>
			</select>
		</label>
	<?php
	endif;
	wp_reset_query();

}

/* Build the list of event types dropdown */
function get_event_types_list()
{

	$taxonomy = 'venue-event';
	$args = array(
		'taxonomy' => $taxonomy,
		'orderby' => 'ID',
		'hide_empty' => false,
	);

	?>
	<label class="select" for="eventtypefilter"><i><?php the_field('event_spaces_default_text', 'option'); ?></i>
		<select class="event-type-filter" name="eventtypefilter">
			<option value="0"><?php the_field('event_spaces_default_text', 'option'); ?></option>
			<?php

			$custom_terms = get_terms($taxonomy, $args);
			foreach ($custom_terms as $term) {
				if ($term->slug !== 'restaurants') {
					?>
					<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
					<?php
				}
			} ?>
		</select>
	</label>
	<?php


}

/* Build the list of event types dropdown */
function get_event_location_list()
{

	$taxonomy = 'venue-location';
	$args = array(
		'taxonomy' => $taxonomy,
		'orderby' => 'ID',
		'hide_empty' => false,
	);

	?>
	<label class="select" for="eventlocationfilter"><i><?php the_field('locations_default_text', 'option'); ?></i>
		<select class="event-location-filter" name="eventlocationfilter">
			<option value="0"><?php the_field('locations_default_text', 'option'); ?></option>
			<?php
			$custom_terms = get_terms($taxonomy, $args);
			foreach ($custom_terms

			as $term){
			?>
			<option value="<?php echo $term->slug; ?>">
				<?php
				echo $term->name;
				echo '</option>';
				}
				?>
		</select>
	</label>
	<?php


}
