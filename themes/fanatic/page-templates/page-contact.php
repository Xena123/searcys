<?php
/*
* Template Name: Contact Page
*/
?>
<?php $shortcode = get_field('ninja_form_code'); ?>
<?php get_header(); ?>
<!-- +++page-contact -->
<?php get_template_part( 'partials/maps/map-contact' ); ?>

<main class="l-constrained grid__contact">
  <ul class="grid-container l-constrained--xtra">
    <li class="grid-item grid-half">
      <div class="grid-item__inner">
        <h2 class="title--contact"><?php fanaticBlock( "formTitle", "gd_single_line", 1, "gd_single_line", true ); ?></h2>
        <div class="block__contact">
          <?php echo do_shortcode($shortcode); ?>
        </div>
      </div>
    </li>
    <li class="grid-item grid-half">
      <div class="grid-item__inner">
        <h2 class="title--contact"><?php fanaticBlock( "enquiriesTitle", "gd_single_line", 1, "gd_single_line", true ); ?></h2>
        <div class="block__contact">
          <?php the_content(); ?>
        </div>
      </div>
    </li>
  </ul>

  <?php get_template_part( 'partials/rows/flexible-grid' ); ?>
    
</main>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoWg7hLJxk_83LHhFl6tWKZ7UKjxttz3M&callback=initContactMap"></script>  
<?php get_footer(); ?>