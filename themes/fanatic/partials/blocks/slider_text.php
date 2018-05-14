<?php
  $title = get_sub_field('title');
  $text = get_sub_field('text');
  $buttonText = get_sub_field('button_text');
  $buttonLink = get_sub_field('button_link');
?>

<div class="l-slider__content block">
  <div class="l-slider__text">
    <h1><?php echo $title; ?></h1>
    <?php echo $text; ?>
    <a href="<?php echo $buttonLink; ?>" class="btn--general btn--banner"><?php echo $buttonText; ?></a>
  </div>
</div>