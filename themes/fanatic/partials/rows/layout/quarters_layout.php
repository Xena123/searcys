    <?php
      $block_1 = get_sub_field('block_1');
    ?>
    
    <?php 
      if( have_rows('block_1') ):
        while( have_rows('block_1') ) : the_row();
    ?>
      <li class="grid-item grid-quarter">

      <?php if( get_row_layout() == 'wysiwyg_box' ): ?>
        
        <?php get_template_part( 'partials/blocks/wysiwyg' ); ?>
        
      <?php elseif( get_row_layout() == 'cta_box' ): ?>
      
        <?php get_template_part( 'partials/blocks/cta/cta_25' ); ?>
        
      <?php elseif( get_row_layout() == 'social_box' ): ?>
        
        <?php get_template_part( 'partials/blocks/social' ); ?>

      <?php elseif( get_row_layout() == 'feature_box' ): ?>
        
        <?php get_template_part( 'partials/blocks/feature/feature_25' ); ?>
      
      <?php endif;  ?> <!-- end wysiwyg  -->

      </li>

    <?php endwhile; endif;  ?> <!-- end of rows block_1 -->
    