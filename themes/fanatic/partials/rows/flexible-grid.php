<?php 
  if( have_rows('content_boxes') ):
    while( have_rows('content_boxes')) : the_row();
?>

  <div class="row blocks">
    <ul class="grid-container">

      <?php if( get_row_layout() == 'halves_layout' ): ?>
        
        <?php get_template_part( 'partials/rows/layout/halves_layout' ); ?>

      <?php elseif( get_row_layout() == 'section_title' ): ?>
        
        <?php get_template_part( 'partials/rows/layout/section_title' ); ?>

      <?php elseif( get_row_layout() == 'fullWidth_layout' ): ?>
        
        <?php get_template_part( 'partials/rows/layout/fullWidth_layout' ); ?>

      <?php elseif( get_row_layout() == 'quarters_layout' ): ?>
        
        <?php get_template_part( 'partials/rows/layout/quarters_layout' ); ?>

      <?php elseif( get_row_layout() == 'thirds_layout' ): ?>
        
        <?php get_template_part( 'partials/rows/layout/thirds_layout' ); ?>

      <?php elseif( get_row_layout() == 'twoThirds_oneThird_layout' ): ?>
        
        <?php get_template_part( 'partials/rows/layout/twoThirds_oneThird_layout' ); ?>

      <?php elseif( get_row_layout() == 'oneThird_twoThirds_layout' ): ?>
        
        <?php get_template_part( 'partials/rows/layout/oneThird_twoThirds_layout' ); ?>
        
      <?php endif;  ?> <!-- end of row halves layout -->

    </ul>
  </div>
<?php endwhile; endif; ?> <!-- end of content boxes -->

  
