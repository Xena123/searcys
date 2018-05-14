<!-- File: gd/templates/social_icon.php -->
<?php
  $newTab = '';
  if ( get_field('gd_new_tab') == true ) {
    $newTab = '_blank';
  };
  if ( get_field('gd_font_awesome') != '' ) {
    $linkText = '<i class="fa ' . get_field('gd_font_awesome') . ' btn--hover" aria-hidden="true"></i>';
  } else {
    $linkText = the_field('gd_link_text');
  }
?>

<li>
  <a href="<?php the_field('gd_link_url'); ?>" target="<?php echo $newTab; ?>">
    <?php echo $linkText; ?>
  </a>
  <?php gd_insertEdit(); ?>
</li>
