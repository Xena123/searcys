<?php get_header(); ?>
<!-- +++archive -->

<main class="l-constrained">
  <?php
    $args = array(
      'post_type' => 'venues', 
      'post_parent' => 0, 
      'posts_per_page'=>'-1'
    ); 
  ?>
  <?php $the_query = new WP_Query( $args ); ?>
  <?php if ( $the_query->have_posts() ) : ?>
  
    
    <main>
      <div class="row blocks">
        <ul class="grid-container">

          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

          <li class="grid-item grid-half">
            <div class="grid-item__inner block__full">
              <?php the_post_thumbnail(); ?>
            </div>
          </li>
          <li class="grid-item grid-half">
            <div class="grid-item__inner block__full">
              <?php the_title(); ?>
              <?php the_content(); ?>
            </div>
          </li>

          <?php endwhile; ?>
        </ul>
        
      </div>
    </main>
    
  
  <?php endif; ?>

<?php get_footer(); ?>