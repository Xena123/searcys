<!-- File: gd/templates/block-sidebar.php -->
<?php 
$size = 'grid-half';
$link = get_field('link'); 
?>


<div class="grid-item grid-third">
  <div class="grid-item__inner block__full">
    <?php gd_insertEdit(); ?>
    <?php if( $link ): ?>
    <a href="<?php echo $link; ?>" class="btn--overlay"></a>
    <?php endif;  ?>
    <div class="block__bgd" style="background: transparent url('<?php the_post_thumbnail_url($size); ?>') no-repeat center center; background-size: cover;">
      <div class="block__overlay"></div>
      <h3 class="block__txtCenter title--block"><?php the_title(); ?></h3>
    </div>
  </div>
</div>
