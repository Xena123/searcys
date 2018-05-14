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
<?php $postId = $nuggetPost->ID; ?>
<?php $pageCat = get_the_title($pageId); ?>

<li class="grid-item grid-third--nopad">
  <?php gd_insertEdit(); ?>
  <div class="grid-item__inner block block__background block--full block--overlay" style="background-image: url('<?php echo get_the_post_thumbnail_url($postId); ?>');">
    <a class="btn--overlay" href="<?php echo get_permalink($postId); ?>"></a>
    <div class="block__content-overlay">
      <span class="block__cat"><?php echo $pageCat; ?></span>
      <a href="<?php the_permalink(); ?>"><h4><?php echo $nuggetPost->post_title; ?></h4></a>
    </div>
  </div>
</li>
