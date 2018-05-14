<!-- File: gd/templates/archive-banner -->
<?php gd_insertEdit(); ?>

<div class="l-banner-image image-overlay" style="background: transparent url('<?php the_post_thumbnail_url(); ?>') no-repeat center center; background-size: cover;">
</div>
<div class="l-banner-text">
  <h1><?php the_title(); ?></h1>
  <p><?php the_content(); ?></p>
</div>
