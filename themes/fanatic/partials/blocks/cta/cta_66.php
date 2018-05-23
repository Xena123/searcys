<!-- +++cta_66 -->
<?php
  $img = get_sub_field('image');
  $size = 'grid-twoThirds';
  $color = get_sub_field('color');
  $textColor = get_sub_field('text_color');
  $link = get_sub_field('link');
  $title = get_sub_field('title');
  $text = get_sub_field('text');
  $cta = get_sub_field('cta');
  $buttonLink = get_sub_field('button_link');
  $thumb = wp_get_attachment_image_src( $img['id'], $size );
?>

<div class="grid-item__inner block__full block__cta <?php echo $color; ?> <?php echo $textColor; ?>">
  <?php if( $link ): ?>
  <a href="<?php echo $link; ?>" class="btn--overlay"></a>
  <?php endif;  ?>

  <div class="block__bgd" style="background: transparent url('<?php echo $thumb['0']; ?>') no-repeat center center; background-size: cover;">
    <div class="block__overlay"></div>
    <div class="block block__content">
      <div class="">
        <?php if( $title ): ?>
        <h2 class="title--cta"><?php echo $title; ?></h2>
        <?php endif;  ?>

        <?php if( $text ): ?>
        <div class="l-constrained--text">
          <p><?php echo $text; ?></p>
        </div>
        <?php endif;  ?>

        
        <?php if( $cta ): ?>
        <a href="<?php echo $buttonLink; ?>" class="btn btn--general"><?php echo $cta; ?></a>
        <?php endif;  ?>
      </div>
    </div>
  </div>
  
</div>