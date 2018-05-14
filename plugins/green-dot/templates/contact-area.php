<!-- File: gd/templates/social_icon.php -->

<li>
  <img src="<?php the_post_thumbnail_url(); ?>" />
  <a href="<?php the_field('gd_link_url'); ?>" target="<?php echo $newTab; ?>">
    <?php the_field('gd_link_text'); ?>
  </a>
  <?php gd_insertEdit(); ?>
</li>
