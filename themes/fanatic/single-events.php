<?php get_header(); ?>
<!-- +++single-events -->
<main class="l-constrained">

  <div class="l-aside__main">
  <?php if ( have_posts() ) { ?>
    <?php while ( have_posts() ) { ?>
      <?php the_post(); ?>
    
      
      <div class="row blocks">
        <ul class="grid-container">

          <li class="grid-item grid-full">
            <div class="grid-item__inner">
              <h1 class="title--blog"><?php the_title(); ?></h1>
              <div class="block__wysi">
                <?php the_content(); ?>
              </div>
            </div>
          </li>
          

          
        </ul>
        
      </div>
      
    <?php }  ?>
  <?php } ?>
  </div>

  <div class="l-aside">
    <h3 class="title--sidebar"><?php fanaticBlock( "blogSidebarTitle-" . $post->ID, "gd_single_line", 1, "gd_single_line", true ); ?></h3>
    <?php fanaticBlock( "blogSidebar-" . $post->ID, "block-sidebar", 3, "gd_block", true ); ?>
  </div>

</main>
 
<?php get_footer(); ?>
