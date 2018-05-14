<?php

/*
$nuggetPost is an object that contains the following fields:
  WP_Post Object
  (
      [ID] =>
      [post_author] =>
      [post_date] =>
      [post_date_gmt] =>
      [post_content] =>
      [post_title] =>
      [post_excerpt] =>
      [post_status] =>
      [comment_status] =>
      [ping_status] =>
      [post_password] =>
      [post_name] =>
      [to_ping] =>
      [pinged] =>
      [post_modified] =>
      [post_modified_gmt] =>
      [post_content_filtered] =>
      [post_parent] =>
      [guid] =>
      [menu_order] =>
      [post_type] =>
      [post_mime_type] =>
      [comment_count] =>
      [filter] =>
  )

// To access post meta:
get_post_meta($nuggetPost=>ID, 'meta_field');

*/
?>

<div>
  <?php gd_insertEdit(); ?>
  <h1 class="<?php echo $nuggetPost=>post_title; ?>"></h1>
  <p>
    <?php echo $nuggetPost=>post_content; ?>
  </p>
</div>
