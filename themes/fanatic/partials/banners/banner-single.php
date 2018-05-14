<!-- +++Banner-single -->
<?php
  the_post();
  $size = 'hero-heading';
  $banner_image = get_field('banner_image');
  $thumb = wp_get_attachment_image_src( $banner_image['id'], $size );
  $header = get_field('banner_header');
?>

<?php if ( $banner_image != '' ) { ?>
<div class="l-banner l-banner--single">
  
  <div class="l-banner-image image-overlay" style="background: transparent url('<?php echo $thumb['0']; ?>') no-repeat center center; background-size: cover;">
    <?php gd_insertEdit(); ?>
  </div>
  <div class="l-banner-text">
    <h1 class="title--banner"><?php echo $header; ?></h1>
  </div>

  <div class="block__overlay"></div>
</div>
<?php } ?>
