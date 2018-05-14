<!-- File: gd/templates/cta -->

<section class="row heavy <?php echo $bgClass; ?>">
  <div class="l-constrained--inner">
    <header class="row__header-center heavy__header">
      <h2><?php the_title(); ?></h2>
      <?php gd_insertEdit(); ?>
    </header>
    <div class="heavy__content <?php echo $textClass; ?>">
      <?php the_content(); ?>
    </div>
  </div>
</section>

<?php
  if (!empty(get_the_content())) {
    the_content();
  } else {
    echo "<p>We're always taking on new projects.</p><p>Would you like to discuss yours?</p>";
  }
?>
