<?php
/**
  * Template Name: Gifts Page
  */
get_header();

?>
<!-- +++page-gifts -->

<main class="l-constrained">
  
  <?php get_template_part( 'partials/banners/banner-single' ); ?>

  <div class="row blocks">
    <ul class="grid-container">

      <?php if( have_rows('gifts') ): ?>

        <li class="grid-item grid-half">
        <?php while( have_rows('gifts') ): the_row();

          // vars
          $logo = get_sub_field('logo');
          $backgroundImage = get_sub_field('background_image');
          $venueID = get_sub_field('data_id');
          // for use with the orangery
          $orangeryGiftLink;
          $orangeryGiftLinkOpen = '';
         
          // change elements if venue is id 6271 (The Orangery)
          if($venueID == '6271') {
            $venueID = '';
            $orangeryGiftLink = 'https://online1.venpos.net/site/ShowPage.aspx?LID=206&PID=60625d74-ce24-4656-a2e9-872abf4190f3&_ga=2.48953253.289919627.1515169463-519641528.1508154996';
            $orangeryGiftLinkOpen = 'onclick="window.location.href=\'https://online1.venpos.net/site/ShowPage.aspx?LID=206&PID=60625d74-ce24-4656-a2e9-872abf4190f3&_ga=2.48953253.289919627.1515169463-519641528.1508154996\'"';
          } 

        ?>

          <div class="grid-item__inner block__full block__cta">
            
            <div class="block__gift block__bgd" style="background-image: url('<?php echo $backgroundImage['url']; ?>');">
              <div class="block__overlay"></div>
              <div class="block block__content">
                <h2 class="title--cta">Title</h2>
                <button class="pwo-order-button btn btn--general" <?php echo $orangeryGiftLinkOpen; ?>  data-venue="<?php echo $venueID; ?>" data-voucher="true">Shop now</button>
              </div>
            </div>
          </div>

        <?php endwhile; ?>
        </li>

      <?php endif; ?>

    </ul>
  </div>


</main>



<script>(function(d, s, id) {
  var js, pjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s);
  js.src = "https://cdn.preoday.com/js/ordernow.js";
  pjs.parentNode.insertBefore(js, pjs);
}(document, 'script', 'pwo-order-script'));</script>
<?php echo get_footer() ?>