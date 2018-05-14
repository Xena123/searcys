<!-- +++feature -->
<?php
  $img = get_sub_field('image');
  $link = get_sub_field('link');
  $title = get_sub_field('title');
?>

<div class="grid-item__inner block__full">
  <?php if( $link ): ?>
  <a href="<?php echo $link; ?>" class="btn--overlay"></a>
  <?php endif;  ?>
  <?php if( $title ): ?>
    <h2 class="title--feature"><?php echo $title; ?><i class="fa fa-long-arrow-right"></i></h2>
  <?php endif;  ?>
  <div class="block__bgd block__partial" style="background: transparent url('<?php echo $img; ?>') no-repeat center center; background-size: cover;">
  </div>
</div>