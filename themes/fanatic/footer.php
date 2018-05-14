<!-- +++footer -->
    <footer class="l-footer">
      <div class="l-footer--top">
        <div class="l-constrained">

          <div class="l-footer__wrap hvr--footer">
            <div class="l-footer__logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/logo_scrolled_white.png"></div>
            <nav class="l-footer__nav">
              <?php
                $args = array(
                  'menu' => 'Footer Menu',
                  'theme_location' => 'footer',
                  'container' => false,
                  'menu_class' => 'nav nav--footer hvr--nav',
                  'menu_id' => '',
                  'depth' => 0
                );
                wp_nav_menu( $args );
              ?>
            </nav>
            
          </div>
        </div>
      </div>
      <div class="l-footer--bottom">
        <div class="l-constrained">
          © <?php echo date("Y"); ?> Searcys
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
