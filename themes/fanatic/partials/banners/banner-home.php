<!-- +++Banner-home -->

<div class="l-banner l-banner__slider">

<?php if( have_rows('slider') ): ?>

    <div id="slider" class="l-slider">
    <?php while ( have_rows('slider') ) : the_row(); ?>
      
      <?php 
        $size = 'hero-heading'; 
        $image = get_sub_field('slider_image');
        $thumb = wp_get_attachment_image_src( $image['id'], $size );
      ?>

      <div class="l-slider__image">
        <div class="block__bgd block__banner" style="background: transparent url('<?php echo $thumb['0']; ?>') no-repeat center center; background-size: cover;">
          
          <?php 
            if( have_rows('slider_text_box') ):
              while( have_rows('slider_text_box') ) : the_row();
          ?>
            <?php if( get_row_layout() == 'content_box' ): ?>

              <?php get_template_part( '/partials/blocks/slider_text' ); ?>

            <?php endif;  ?> <!-- end of content_box -->
          <?php endwhile; endif; ?> <!-- end of slider_text_box -->

        </div>
      </div>
        
    <?php endwhile; else  : endif; ?>
    </div>
      
  </div>