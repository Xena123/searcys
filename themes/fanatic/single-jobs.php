<?php get_header(); ?>
<!-- +++single-jobs -->
<main class="l-constrained">
  <div class="l-constrained--xtra">
  <?php
    $venue = get_field('venue_name');
    $location = get_field('location');
    $type = get_field('type');
    $salary = get_field('salary');
    $excerpt = get_field('listing_excerpt');
    $description = get_field('job_description');
    $responsibilities = get_field('responsibilities');
    $experience = get_field('experience');
  ?>

  <div class="l-aside__main row__60">
    <h1 class="title--job"><?php the_title(); ?></h1>
    <h2 class="subtitle--job"><?php echo $venue; ?></h2>
    <div class="row__40">
      <div class="block__flex title--listing ">
        <ul class="block__fifth">
          <li>Location</li>
          <li>Type</li>
          <li>Salary</li>
        </ul>
        <ul>
          <li><?php echo $location; ?></li>
          <li><?php echo $type; ?></li>
          <li><?php echo $salary; ?></li>
        </ul>
      </div>
    </div>
    <div class="block__wysi block__job">
    <div>
      <h3>Job Description</h3>
      <?php echo $description; ?>
    </div>
    <div>
      <h3>Responsibilities</h3>
      <?php echo $responsibilities; ?>
    </div>
    <div>
      <h3>Required Skills / Experience</h3>
      <?php echo $experience; ?>
    </div>
    </div>
  </div>
  
  <div class="l-aside">
    <div class="l-form__job">
      <h4>Quick Apply</h4>
      <?php //echo do_shortcode('[ninja_form id=4]'); ?>
      <?php fanaticBlock( "jobFormCode", "form_code", 1, "gd_single_line", true ); ?>
    </div>
  </div>

    
  </div>
  <section class="row__60">
    <h3 class="title--sidebar"><?php fanaticBlock( "jobRelatedTitle", "gd_single_line", 1, "gd_single_line", true ); ?></h3>
    <div class="grid-container">
      <?php fanaticBlock( "jobRelatedSection-" . $post->ID, "block-job", 3, "gd_block", true ); ?>
    </div>
  </section>
</main>
 
<?php get_footer(); ?>