<?php get_header(); ?> 
<!-- +++archive-venues -->

<main class="l-constrained">
  <?php get_template_part( 'partials/banners/banner-venues' ); ?>

  <div class="row__40 blocks">
    <ul class="grid-container grid__listing grid__scroll">

    <?php
      $args = array(
        'posts_per_page' => -1,
        'post_type' => 'venues', //change the post type here
        'post_parent' => 0,
        'orderby' => 'menu_order',
        'order' => 'ASC'
        
    );
    $_query = new WP_Query($args);   
    ?>
    
    <?php if ($_query->have_posts()):
      while ($_query->have_posts()): ?>

        <?php $_query->the_post(); ?>
        <?php
          $size = 'listing-thumb';
          $image = get_field('listing_thumbnail');
          $thumb = wp_get_attachment_image_src( $image['id'], $size );
          $excerpt = get_field('listing_excerpt');
        ?>
        
        
          <li class="grid-item grid-half-listing">
            <div class="grid-item__inner block__half">
              <div class="block__bgd" style="background: transparent url('<?php echo $thumb['0']; ?>') no-repeat center center; background-size: cover;"></div>
            </div>
          </li>
          <li class="grid-item grid-half-listing">
            <div class="grid-item__inner block__half">
              <div class="">
                <a href="<?php the_permalink(); ?>">
                  <h2 class="title--listing"><?php the_title(); ?></h2>
                </a>
                <div class="t-text-grey">
                  <?php echo $excerpt; ?>
                </div>
                <div class="row__cta btn__btm">
                  <a href="<?php the_permalink(); ?>" class="btn--dark">View Details</a>
                  <a href="<?php the_permalink(); ?>" class="btn--dark">Make Booking</a>
                </div>
              </div>
            </div>
          </li>
      

        <?php endwhile;  ?>
      <?php endif;  ?>

    </ul>

    <div class="grid__map">

      <?php get_template_part( 'partials/maps/map-listing-venues' ); ?>
      
    </div>

  </div>
  
  <?php get_template_part( 'partials/rows/flexible-grid-venues' ); ?>

</main>

<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoWg7hLJxk_83LHhFl6tWKZ7UKjxttz3M&callback=initMap"></script>  
<?php get_footer(); ?>

