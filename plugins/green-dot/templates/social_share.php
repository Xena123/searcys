<!-- File: gd/templates/social_share.php -->
<?php
  $pageLink = get_permalink($pageId);
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
  <a href="<?php echo get_field('gd_link_url') . $pageLink; ?>" target="<?php echo $newTab; ?>">
    <?php echo $linkText; ?>
  </a>
  <?php gd_insertEdit(); ?>
</li>
