<div>
  <?php
    $args = array(
      'menu' => 'Primary Menu 1',
      'theme_location' => 'primary_1',
      'container' => false,
      'menu_class' => 'nav nav--header hvr--nav',
      'menu_id' => '',
      'depth' => 0
    );
    wp_nav_menu( $args );
  ?>
  </div>
  <div>
  <?php
    $args = array(
      'menu' => 'Primary Menu 2',
      'theme_location' => 'primary_2',
      'container' => false,
      'menu_class' => 'nav nav--header hvr--nav',
      'menu_id' => '',
      'depth' => 0
    );
    wp_nav_menu( $args );
  ?>
  </div>
  <div>
  <?php
    $args = array(
      'menu' => 'Primary Menu 3',
      'theme_location' => 'primary_3',
      'container' => false,
      'menu_class' => 'nav nav--header hvr--nav',
      'menu_id' => '',
      'depth' => 0
    );
    wp_nav_menu( $args );
  ?>
  </div>
  <div>
  <?php
    $args = array(
      'menu' => 'Primary Menu 4',
      'theme_location' => 'primary_4',
      'container' => false,
      'menu_class' => 'nav nav--header hvr--nav',
      'menu_id' => '',
      'depth' => 0
    );
    wp_nav_menu( $args );
  ?>

</div>
<div class="l-header__social-mobile">
  <ul class="social">
    <?php fanaticBlock( "telephone", "gd_link", 1, "gd_link", true ); ?>
    <?php fanaticBlock( "mail", "gd_link", 1, "gd_link", true ); ?>
    <li><a href="">Sign Up</a></li>
  </ul>
</div>