<!-- File: gd/templates/single_line.php -->
<?php
  $code = get_the_title(); 
  gd_insertEdit();
?>
<?php echo do_shortcode($code); ?>

