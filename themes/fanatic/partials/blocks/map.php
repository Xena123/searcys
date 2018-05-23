<?php 

$location = get_sub_field('map');

print_r($location);

?>
<div class="grid-item__inner block__full">
  <div class="acf-map map__block">
    <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
  </div>
</div>
