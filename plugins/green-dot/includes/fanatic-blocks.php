<?php

if ( !function_exists('do_action') ) {
	exit();
}

function addFanaticBlock($type="block", $embed=null, $count, $i, $addButton) {
	if ( $embed == null ) {
		global $post;
		if ( !$post ) {
      return;
    }
		$embed = $post->ID;
	}
  /* Don't run rest of function if user is not admin **/
	if ( !current_user_can( 'manage_options' ) ) {
    return;
  }
  /* If $addButton = true, more blocks are allowed, and admin user: Show '+' button **/
  if ( $addButton && ( $i < $count || $i == 0 ) && current_user_can( 'manage_options' ) ) {
    echo "<div class='fanatic_add'><a href='" . home_url() . "/wp-admin/post-new.php?post_type=". $type . "&embed_id=" . $embed . "' class='post-edit-link'>+</a></div>";
  }
}

/*
 *	Fanatic Building block
 *	@params
 *		$embed (string)	Unique identification for connecting
 *      content to a area on a page (e.g. $post->ID . "random_string")
 *		$style (string)	Style of displayed blocks(required)
 *		$count (int)	Number of blocks to be returned
 *		$type  (string)	Post type: gd_block, gd_single_line, gd_nugget, gd_image
 *    $addButton (bool) Show + button to add additional blocks when actual blocks < $count
 **/
function fanaticBlock( $embed, $style="", $count=1, $type="gd_block", $addButton=false ) {
  $pageId = get_the_ID();   // Returns page ID. You can use this to access page info while inside of the fanatic block
	$gdArgs = array(
		'post_type'		=> $type,
		'posts_per_page'	=> $count ,
		'orderby'=> 'menu_order',
		'order'=>'ASC',
		'meta_query' => array(
			array(
			  'key'  => '_gd_embed',
			  'value'   => $embed,
			  'meta_compare'   => '='
			),
		),
	);

	$gdQuery = new WP_Query( $gdArgs );
	$i = 0;
	while ( $gdQuery->have_posts() ): $gdQuery->the_post();
		switch($style) {
			case "test":
				include( PLUGIN_DIR . '/templates/' . $style . '.php');
				break;
			default:
        include( PLUGIN_DIR . '/templates/' . $style . '.php');
		}
		$i++;
  endwhile;
  wp_reset_postdata();
  addFanaticBlock($type, $embed, $count, $i, $addButton);
}

/*
 *	Fanatic Edit Button
 *
 *  Insert 'green dot' edit button into editable content
 *    area when user has admin permissions
 *
 **/
function gd_insertEdit() {
  if (current_user_can('manage_options')) {
    edit_post_link( );
  }
}


/* Remove Yoast Metaboxes from GD custom post types */
function remove_yoast_metaboxes(){
    remove_meta_box('wpseo_meta', 'gd_link', 'normal');
    remove_meta_box('wpseo_meta', 'gd_nugget', 'normal');
    remove_meta_box('wpseo_meta', 'gd_single_line', 'normal');
    remove_meta_box('wpseo_meta', 'gd_image', 'normal');
    remove_meta_box('wpseo_meta', 'gd_block', 'normal');
}
add_action( 'add_meta_boxes', 'remove_yoast_metaboxes',11 );
