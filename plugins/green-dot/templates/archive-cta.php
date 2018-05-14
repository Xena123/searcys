<!-- File: gd/templates/archive-cta -->

<div class="row cta">
  <div class="l-constrained--inner">
    <div class="cta__text">
      <p><?php the_title(); ?></p>
      <?php gd_insertEdit(); ?>
    </div>
    <a href="<?php the_field('gd_link_url'); ?>" class="btn--cta btn--right btn--red"><span><?php echo the_field('gd_link_text'); ?></span></a>
  </div>
</div>