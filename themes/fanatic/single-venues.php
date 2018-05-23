<?php get_header(); ?>
<!-- +++single-venues -->
  <main class="l-constrained">
    <?php get_template_part( 'partials/banners/banner-single-search' ); ?>
      
      <?php $parentTitle = get_the_title($post->post_parent); ?>
      <div class="nav--venues">
        <ul>
          <li>
            <a href="<?php the_permalink($post->post_parent); ?>"><?php echo $parentTitle; ?></a>
          </li>
          <?php 
          $post_id = get_the_ID();

          if ($post->post_parent === 0) {
            wp_list_pages( array( 
              'post_type' => 'venues',
              'title_li' => '',
              'child_of'    => $post_id,
            ) ); 
          } else {
            wp_list_pages( array( 
              'post_type' => 'venues',
              'title_li' => '',
              'child_of'    => $post->post_parent,
            ) ); 
          }

          ?>
        </ul>
      </div>
      
      
      
      <?php if( have_rows('slider') ): ?>

      <div class="row blocks">
        <ul class="grid-container">
          <li class="grid-item grid-half">
            <div class="grid-item__inner block__slider">
              <div class="block__intro block">
                <h1>
                  <?php the_field('title'); ?>
                  <span><?php the_field('subtitle'); ?></span>
                </h1>
                <div class="block__listing">
                  <?php the_field('content'); ?>
                </div>
              </div>
            </div>
          </li>
          
          <li class="grid-item grid-half">
            <div id="slider" class="l-slider grid-item__inner">
            <?php while ( have_rows('slider') ) : the_row(); ?>
              
              <?php 
                $size = 'grid-half'; 
                $image = get_sub_field('slider_images');
                $thumb = wp_get_attachment_image_src( $image['id'], $size );
              ?>

              <div class="l-slider__image">
                <div class="block__bgd block__full" style="background: transparent url('<?php echo $thumb['0']; ?>') no-repeat center center; background-size: cover;"></div>
              </div>
                
            <?php endwhile; else  : endif; ?>
            </div>
          </li>

        </ul>
      </div>

      <?php 
        $shortcode = get_field('ninja_form_code');

      ?>
      
      <div class="l-aside__main">
        <?php get_template_part( 'partials/rows/flexible-grid' ); ?>
      </div>
      <div class="l-aside l-aside__sticky">
        <?php if ( $shortcode ): ?>
        <div class="l-form">
          <?php echo do_shortcode($shortcode); ?>
        </div>
        <?php else: ?>
        <?php the_field('form_script'); ?>
        <?php endif; ?>
      </div>
      
  </main>
  

<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoWg7hLJxk_83LHhFl6tWKZ7UKjxttz3M&callback=initMap"></script> 
<?php get_footer(); ?>
