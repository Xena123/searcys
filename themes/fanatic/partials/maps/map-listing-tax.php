<?php
  $term = get_queried_object();
  $term_id = get_queried_object_id();
  $tax = $term->taxonomy;
?>

<div class="acf-map">

  <?php
      $args = array(
        'posts_per_page' => -1,
        'post_type' => 'venues', //change the post type here
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
        $location = get_field('google_map');
        $long = $location['lng'];
        $lat = $location['lat'];
        $address = get_field('marker_address');
      ?>

      <?php if( $location ): ?>
      <div class="marker map__marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
        <div class="map__content">
          <a href="<?php the_permalink(); ?>" rel="bookmark" class="title--marker"><?php the_title(); ?></a>
          <?php if( $address ): ?>
          <div class="address"><?php echo $address; ?></div>
          <?php endif;  ?>
        </div>
      </div>
      <?php endif;  ?>

    <?php endwhile;  ?>
  <?php endif;  ?>

</div>
<?php wp_reset_postdata(); ?>