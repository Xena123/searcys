<?php



function addNuggetDropdownBlock($type="post", $embed=null, $count, $i, $addButton) {
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
    echo "<div class='fanatic_add'><a href='" . home_url() . "/wp-admin/post-new.php?post_type=gd_nugget&embed_id=" . $embed . "&link_post=" . $type . "' class='post-edit-link'>+</a></div>";
  }
}



/*
 *	Fanatic Nugget Dropdown: Choose from list of post type
 *  Nugget post type is embedded in a page, and just references another post type/id.
 *  Content is stored in post.
 *	@params
 *		$embed (string)	Unique identification for connecting
 *      content to a area on a page (e.g. $post->ID . "random_string")
 *		$style (string)	Style of displayed blocks(required)
 *		$count (int)	Number of blocks to be returned
 *		$type  (string)	Post type that you're trying to access: post, page, etc
 *    $addButton (bool) Show + button to add additional blocks when actual blocks < $count
 **/

function fanaticDropdownNugget( $embed, $style="", $count=1, $type="post", $addButton=false ) {
  $pageId = get_the_ID();   // Returns page ID. You can use this to access page info while inside of the fanatic block
	$gdNuggetArgs = array (
		'post_type'		=> 'gd_nugget',
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

	$gdNuggetQuery = new WP_Query( $gdNuggetArgs );
	$i = 0;
	while ( $gdNuggetQuery->have_posts() ): $gdNuggetQuery->the_post();
    $nuggetPostType = $type;
    $nuggetPostId = get_field('gd_nugget_post_id');
    $nuggetPost = get_post($nuggetPostId);
		switch($style) {
			case "test":
				include( PLUGIN_DIR . '/templates/nuggets/' . $style . '.php');
				break;
			default:
        include( PLUGIN_DIR . '/templates/nuggets/' . $style . '.php');
		}
		$i++;
  endwhile;
  wp_reset_postdata();
  addNuggetDropdownBlock($type, $embed, $count, $i, $addButton);
}
