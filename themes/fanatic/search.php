<?php get_header(); ?>
<!-- +++search -->

<?php if ( have_posts() ) { ?>
  <?php while ( have_posts() ) { ?>
    <?php the_post(); ?>
    <main>

      <div class="row blocks">
        <ul class="grid-container">

          <li class="grid-item grid-half">
            <div class="grid-item__inner block__full">
              <?php the_post_thumbnail(); ?>
            </div>
          </li>
          <li class="grid-item grid-half">
            <div class="grid-item__inner block__full">
              <?php the_title(); ?>
              <?php the_content(); ?>
            </div>
          </li>

        </ul>
        
      </div>

    </main>
   
  <?php }  ?>
<?php } ?>
<?php get_footer(); ?>
