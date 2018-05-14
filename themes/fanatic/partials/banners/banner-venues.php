<!-- +++Banner-venues -->
<?php
  the_post();
  $page = get_page_by_path('venues'); 
  $pageID = $page->ID;
  $size = 'hero-heading';
  $banner_image = get_field('banner_image', $pageID);
  $thumb = wp_get_attachment_image_src( $banner_image['id'], $size );
  $header = get_field('banner_header', $pageID);
?>

<?php if ( $banner_image != '' ) { ?>
<div class="l-banner l-banner--single">
  
  <div class="l-banner-image image-overlay" style="background: transparent url('<?php echo $thumb['0']; ?>') no-repeat center center; background-size: cover;">
  </div>
  <div class="l-banner-text title--banner">
    <h1><?php echo $header; ?></h1>
  </div>

  <div class="block__overlay"></div>
</div>
<?php } ?>
