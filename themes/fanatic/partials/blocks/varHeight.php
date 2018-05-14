<!-- +++varHeight -->
<?php
  $wysiwyg = get_sub_field('wysiwyg');
  $color = get_sub_field('color');
?>

<div class="grid__varHeight <?php echo $color; ?>">
  <div class="block block__wysi">
    <?php echo $wysiwyg; ?>
  </div>
</div>