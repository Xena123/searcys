<?php 
      if( have_rows('image_boxes') ):
        while( have_rows('image_boxes') ) : the_row();
      ?>
      <?php
        $title_left = get_sub_field('row_title_left');
        $img_left = get_sub_field('row_img_left');
        $link_left = get_sub_field('row_link_left');
        $title_right = get_sub_field('row_title_right');
        $img_right = get_sub_field('row_img_right');
        $link_right = get_sub_field('row_link_right');
        $title_1 = get_sub_field('row_title_1');
        $title_2 = get_sub_field('row_title_2');
        $title_3 = get_sub_field('row_title_3');
        $title_4 = get_sub_field('row_title_4');
        $img_1 = get_sub_field('row_img_1');
        $img_2 = get_sub_field('row_img_2');
        $img_3 = get_sub_field('row_img_3');
        $img_4 = get_sub_field('row_img_4');
        $link_1 = get_sub_field('row_link_1');
        $link_2 = get_sub_field('row_link_2');
        $link_3 = get_sub_field('row_link_3');
        $link_4 = get_sub_field('row_link_4');
      ?>
      
      <?php if( get_row_layout() == '1_1_image_box' ): ?>

      <li class="grid-item grid-half">
        <div class="grid-item__inner block__full">
          <a href="<?php echo $link_left; ?>" class="btn--overlay"></a>
          <div class="block__bgd" style="background: transparent url('<?php echo $img_left; ?>') no-repeat center center; background-size: cover;">
            <p><?php echo $title_left; ?></p>
          </div>
        </div>
      </li>
      <li class="grid-item grid-half">
        <div class="grid-item__inner block__full">
          <a href="<?php echo $link_right; ?>" class="btn--overlay"></a>
          <div class="block__bgd" style="background: transparent url('<?php echo $img_right; ?>') no-repeat center center; background-size: cover;">
            <p><?php echo $title_right; ?></p>
          </div>
        </div>
      </li>

    <?php elseif( get_row_layout() == '3_1_image_box' ): ?>

    <li class="grid-item grid-two-third">
        <div class="grid-item__inner block__full">
          <a href="<?php echo $link_left; ?>" class="btn--overlay"></a>
          <div class="block__bgd" style="background: transparent url('<?php echo $img_left; ?>') no-repeat center center; background-size: cover;">
            <p><?php echo $title_left; ?></p>
          </div>
        </div>
      </li>
      <li class="grid-item grid-third">
        <div class="grid-item__inner block__full">
          <a href="<?php echo $link_right; ?>" class="btn--overlay"></a>
          <div class="block__bgd" style="background: transparent url('<?php echo $img_right; ?>') no-repeat center center; background-size: cover;">
            <p><?php echo $title_right; ?></p>
          </div>
        </div>
      </li>

    <?php elseif( get_row_layout() == '1_1_1_1_image_box' ): ?>

      <li class="grid-item grid-quarter">
          <div class="grid-item__inner block__full">
            <a href="<?php echo $link_1; ?>" class="btn--overlay"></a>
            <div class="block__bgd" style="background: transparent url('<?php echo $img_1; ?>') no-repeat center center; background-size: cover;">
              <p><?php echo $title_1; ?></p>
            </div>
          </div>
        </li>
        <li class="grid-item grid-quarter">
          <div class="grid-item__inner block__full">
            <a href="<?php echo $link_2; ?>" class="btn--overlay"></a>
            <div class="block__bgd" style="background: transparent url('<?php echo $img_2; ?>') no-repeat center center; background-size: cover;">
              <p><?php echo $title_2; ?></p>
            </div>
          </div>
        </li>
        <li class="grid-item grid-quarter">
          <div class="grid-item__inner block__full">
            <a href="<?php echo $link_3; ?>" class="btn--overlay"></a>
            <div class="block__bgd" style="background: transparent url('<?php echo $img_3; ?>') no-repeat center center; background-size: cover;">
              <p><?php echo $title_3; ?></p>
            </div>
          </div>
        </li>
        <li class="grid-item grid-quarter">
          <div class="grid-item__inner block__full">
            <a href="<?php echo $link_4; ?>" class="btn--overlay"></a>
            <div class="block__bgd" style="background: transparent url('<?php echo $img_4; ?>') no-repeat center center; background-size: cover;">
              <p><?php echo $title_4; ?></p>
            </div>
          </div>
        </li>

      <?php endif; endwhile;

      else :

      // no layouts found

      endif;

    ?>
    
          
      