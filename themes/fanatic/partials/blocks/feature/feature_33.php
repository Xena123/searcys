<!-- +++feature_33 -->
<?php
  $img = get_sub_field('image');
  $size = 'grid-third';
  $link = get_sub_field('link');
  $title = get_sub_field('title');
  $thumb = wp_get_attachment_image_src( $img['id'], $size );
?>

<div class="grid-item__inner block__full">
  <?php if( $link ): ?>
  <a href="<?php echo $link; ?>" class="btn--overlay"></a>
  <?php endif;  ?>
  <?php if( $title ): ?>
    <h2 class="title--feature"><?php echo $title; ?></h2>
  <?php endif;  ?>
  <div class="block__bgd block__partial" style="background: transparent url('<?php echo $thumb['0']; ?>') no-repeat center center; background-size: cover;">
  </div>
</div>