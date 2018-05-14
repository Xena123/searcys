
<?php
  $newTab = '';
  if ( get_field('gd_new_tab') == true ) {
    $newTab = '_blank';
  };
?>

<li>
  <a href="<?php the_field('gd_link_url'); ?>" target="<?php echo $newTab; ?>" class="<?php the_field('gd_link_text'); ?>"></a>
  <?php gd_insertEdit(); ?>
</li>
