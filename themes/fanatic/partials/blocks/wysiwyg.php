<!-- +++wysiwyg -->
<?php
  $wysiwyg = get_sub_field('wysiwyg');
  $color = get_sub_field('color');
  $textColor = get_sub_field('text_color');
?>

<div class="grid-item__inner block__full <?php echo $color; ?>">
  <div class="block block__wysi <?php echo $textColor; ?>">
    <?php echo $wysiwyg; ?>
  </div>
</div>