<?php get_header(); ?>
<!-- +++archive-jobs -->
<main class="l-constrained">
  <ul class="l-constrained--xtra">
  <?php
      $args = array(
        'post_type' => 'jobs', 
        'posts_per_page'=>'-1'
      ); 
    ?>
    <?php $the_query = new WP_Query( $args ); ?>
    <?php if ( $the_query->have_posts() ) : ?>

      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <?php
          $venue = get_field('venue_name');
          $location = get_field('location');
          $type = get_field('type');
          $salary = get_field('salary');
          $excerpt = get_field('listing_excerpt');
          
        ?>
        <div class="grid__job block__job-listing">
          <div class="grid-item__main">
            <div class="title--job"><?php the_title(); ?></div>
            <div class="subtitle--job"><?php echo $venue; ?></div>
            <div class="t-text-grey">
              <ul class="nav--job">
                <li><?php echo $location; ?></li>
                <li><?php echo $type; ?></li>
                <li>Salary: <?php echo $salary; ?></li>
              </ul>

              <div><?php echo $excerpt; ?></div>
            </div>
          </div>
        
        
          <div class="grid-item__side">
            <a href="<?php the_permalink(); ?>" class="btn--job">Details & Apply</a>
          </div>
        </div>

      <?php endwhile; ?>

    <?php endif; ?>
  </ul>
</main>
<?php get_footer(); ?>