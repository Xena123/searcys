<!-- +++social -->
<?php
  $img = get_sub_field('image');
  $color = get_sub_field('color');
  $link = get_sub_field('link');
  $icon = get_sub_field('icon');
  $wysiwyg = get_sub_field('wysiwyg');
?>


<div class="grid-item__inner block__full <?php echo $color; ?>">

  <?php if( $link ): ?>
  <a href="<?php echo $link; ?>" class="btn--overlay"></a>
  <?php endif;  ?>

  <div class="block__bgd" style="background: transparent url('<?php echo $img; ?>') no-repeat center center; background-size: cover;">
    <div class="block block__flexCol btn--overlay">
      <?php if( $icon ): ?>
      <div class="box__icon"><img src="<?php echo $icon; ?>"></div>
      <?php endif;  ?>

      <?php echo $wysiwyg; ?>
    </div>
  </div>
</div>