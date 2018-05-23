<?php get_header(); ?>
<!-- +++archive-events -->

<main class="l-constrained grid__events">
  <?php get_template_part( 'partials/banners/banner-single' ); ?>
  
  <?php
    $args = array(
      'post_type' => 'events', 
      'posts_per_page'=>'-1'
    ); 
  ?>
  <?php $the_query = new WP_Query( $args ); ?>
  <?php if ( $the_query->have_posts() ) : ?>
  
    
    
      <div class="row__60 blocks">
        <ul class="grid-container">

          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          
          <?php
            $size = 'grid-third';
            $image = get_field('listing_thumbnail');
            $thumb = wp_get_attachment_image_src( $image['id'], $size );
            $excerpt = get_field('listing_excerpt');
            $buttonText = get_field('button_text');
          ?>

          <li class="grid-item grid-third">
            <div class="grid-item__inner block__full">
              <div class="block__bgd" style="background: transparent url('<?php echo $thumb['0']; ?>') no-repeat center center; background-size: cover;">
                <div class="block__overlay"></div>
                <div class="block block__content block__blogList">
                  <div class="">
                    
                    <h2 class="title--cta"><?php the_title(); ?></h2>
                  
                    <?php echo $excerpt; ?>

                    <a href="<?php the_permalink(); ?>" class="btn btn--general btn--light"><?php echo $buttonText; ?></a>
                    
                  </div>
                </div>
              </div>
            </div>
          </li>
          

          <?php endwhile; ?>
        </ul>
        
      </div>
    
  <?php endif; ?>
</main>
<?php get_footer(); ?>