<?php
/*------------------------------------*
* Useful Wordpress Functions
*------------------------------------*/

function get_page_by_slug($page_slug, $output = OBJECT, $post_type = 'page' ) {
  global $wpdb;
  $page = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_name = %s AND post_type= %s", $page_slug, $post_type ) );
  if ( $page )
    return get_page($page, $output);
  return null;
}

/* Check Banner Height & return class */
function checkBannerHeight() {
  if ( is_page_template('page-templates/about.php') ) {
    $slideHeightClass = 'slide--tall';
  } else if ( is_page_template('page-templates/contact.php') ) {
    $slideHeightClass = "slide--mid";
  } else if ( is_home() || is_archive() ) {
    $slideHeightClass = "slide--short";
  } else {
    $slideHeightClass = 'slide--tall';
  }
  return $slideHeightClass;
}

/* Add Post View Count Field  */
function fl_set_post_views($postID) {
    $count_key = 'fl_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Get excerpt of custom length
function get_excerpt($field, $count, $post_id) {
  if ( $post_id == '' ) {
    global $post;
    $post_id = $post->ID;
  }
	$permalink = get_permalink($post_id);
	$excerpt = get_post_field($field, $post_id);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $count);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  return $excerpt;

}

function getLimitedField($field, $count, $post_id = '', $clipChars = '' ) {
  if ( $post_id == '' ) {
    global $post;
    $post_id = $post->ID;
  }
  $getField = get_post_field($field, $post_id);

  $returnValue = mb_strimwidth($getField, 0, $count, $clipChars);

}

// Return value of "redirect_link" custom field if exists, otherwise return permalink.
function get_custom_link() {
	global $post;
	if(the_field('redirect_link')) {
		return the_field('redirect_link');
	} else {
		get_permalink();
	}
}

//Get meta data for archive single posts
function get_meta($field) {
	global $post;
	if (get_post_meta($post->ID, $field, true)) {
		return get_post_meta($post->ID, $field, true);
	}
}

// Check ACF Field. Return default field value if empty
function checkField($field, $defaultText) {
  if ( get_field($field) == '' || get_field($field) == '#' ) {
    return $defaultText;
  } else {
    return get_field($field);
  }
}

/* Archive Functions **/
function checkPostType($postId, $postType) {
  $returnCats = '';
  if ( $postType == 'post' ) {
    $returnCats = get_the_category();
  } elseif ( $postType == 'portfolio' ) {
    $returnCats = get_the_terms( $postId, 'portfolio_cat' );
  }
  return $returnCats;
}

function getPostTerms($postCats) {
  $returnArray = [];
  $returnArray['name'] = '';
  $returnArray['slug'] = '';
  $returnArray['filter'] = '';
  if ( $postCats != '' ) {
    $postLen = count($postCats);
    $postCatList = '';
    $postCatTagList = '';
    $postCatFilter = [];
    $i = 0;
    foreach( $postCats as $category ) {
      if ( $category->slug != 'blog' && $category->slug != 'uncategorized' ) {
        if ( $i == $postLen - 1 ) {
          $postCatList .= $category->name;
          $postCatTagList .= $category->slug;
          $postCatFilter[] = $category->name;
        } else {
          $postCatList .= $category->name . ' / ';
          $postCatTagList .= $category->slug . ' ';
          $postCatFilter[] = $category->name;
        }
      }
      $i++;
    }
    $returnArray['name'] = $postCatList;
    $returnArray['slug'] = $postCatTagList;
    $returnArray['filter'] = $postCatFilter;
  }
  return $returnArray;
}

// Get Featured Articles
  // Returns array of posts.
  // $cat: Category to return
  // $count: # to return in array.
function getFeaturedPosts($type, $cat, $count, $exclude) {
  $args = array(
    'post_type' => $type,
    'posts_per_page' => $count,
    'exclude' => $exclude,
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => array(
      array(
        'taxonomy' => 'category',
        'field'    => 'name',
        'terms'    => $cat,
      ),
    ),
  );
  $getArray = get_posts($args);

  return $getArray;
}
