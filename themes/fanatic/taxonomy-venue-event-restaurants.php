<?php get_header(); ?>
<!-- +++taxonomy-venue-event-restaurants -->
<?php
  $term = get_queried_object();
  $term_id = get_queried_object_id();
  $tax = $term->taxonomy;
?>
<main class="l-constrained">
  <?php get_template_part( 'partials/banners/banner-archive' ); ?>
  <div class="row__40 blocks">
    <ul class="grid-container grid__listing grid__scroll">

    <?php
      $args = array(
      'numberposts' => -1,
      'post_type' => 'venues',
      'meta_query' => array(
        array(
          'key' => 'display_on_search_bar',
          'compare' => '==',
          'value' => '1'
        )
      )
    );
    $_query = new WP_Query($args);   
    ?>
    
    <?php if ($_query->have_posts()):
      while ($_query->have_posts()): $_query->the_post(); ?>
        <?php
          $size = 'listing-thumb'; 
          $image = get_field('listing_thumbnail', $post->post_parent);
          $thumb = wp_get_attachment_image_src( $image['id'], $size );
          $excerpt = get_field('listing_excerpt', $post->post_parent);
          $location = get_field('google_map');
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
                  <h2 class="title--listing"><?php the_field('title_on_search_bar'); ?></h2>
                </a>
                <div class="t-text-grey listing__excerpt">
                  <?php echo $excerpt; ?>
                </div>
                <div data-lat="<?php echo $lat; ?>" data-lng="<?php echo $long; ?>"></div>
                <div class="row__cta btn__btm">
                  <a href="<?php the_permalink(); ?>" class="btn--dark">View Details</a>
                  <a href="<?php the_permalink(); ?>" class="btn--dark">Make Booking</a>
                </div>
              </div>
            </div>
          </li>
        

        <?php endwhile;  ?>
      <?php endif;  ?>
    <?php wp_reset_postdata(); ?>
    </ul>
    
    <div class="grid__map">

      <?php get_template_part( 'partials/maps/map-listing-restaurants' ); ?>
      
    </div>
    
  </div>
  
  <?php get_template_part( 'partials/rows/flexible-grid-tax' ); ?>

</main>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoWg7hLJxk_83LHhFl6tWKZ7UKjxttz3M"></script>

<?php get_footer(); ?>

