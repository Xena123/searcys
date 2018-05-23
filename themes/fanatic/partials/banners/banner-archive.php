<!-- +++Banner-archive -->
<?php
  $size = 'hero-heading'; 
  $term = get_queried_object();
  $image = get_field('banner_image', $term);
  $thumb = wp_get_attachment_image_src( $image['id'], $size );
  $header = get_field('banner_header', $term);
?>
<?php if ( $image != '' ) { ?>
<div class="l-banner l-banner--single l-banner--archive">
  <?php get_template_part( 'partials/search/search' ); ?>
  <div class="l-banner-image image-overlay" style="background: transparent url('<?php echo $thumb['0']; ?>') no-repeat center center; background-size: cover;">
  </div>
  <div class="l-banner-text">
    <h1 class="title--banner"><?php echo $header; ?></h1>
  </div>
  <div class="block__overlay"></div>
</div>
<?php } ?>
