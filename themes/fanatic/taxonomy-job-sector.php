<?php get_header(); ?>
<!-- +++taxonomy-job-sector -->
<?php
  $term = get_queried_object();
  $term_id = get_queried_object_id();
  $tax = $term->taxonomy;
?>

<main class="l-constrained">
  
  <hr class="l-constrained l-header__div">
  <div class="title--section"><?php fanaticBlock( "Title-". $post->ID, "gd_single_line", 1, "gd_single_line", true ); ?></div>

  <?php
    $terms = get_terms( array(
        'taxonomy' => 'job-sector',
        'hide_empty' => false,
    ) );
    echo '<div class="nav--venues">';
    echo '<ul>';
    foreach ( $terms as $term ) {
      $term_link = get_term_link( $term );
      if ( is_wp_error( $term_link ) ) {
          continue;
      }
      echo '<li><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
    }
    echo '</ul>';
    echo '</div>';
  ?>
  <?php get_template_part( 'partials/rows/flexible-grid-tax' ); ?>

  <ul class="l-constrained--xtra">
    <?php
      $args = array(
        'posts_per_page' => -1,
        'post_type' => 'jobs', //change the post type here
        'post_parent' => 0,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => $tax,
                'field' => 'term_id',
                'terms' => $term_id,
            ),
        ),
    );
    $_query = new WP_Query($args);   
    ?>
    
    <?php if ($_query->have_posts()):
      while ($_query->have_posts()): $_query->the_post(); ?>
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