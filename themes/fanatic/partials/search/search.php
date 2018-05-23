<fieldset id="venue-search" class="l-nav__search">
	<form action="/">
		<div class="filter-venues-wrapper">
			<div>
				<?php get_restaurants_list(); ?>
			</div>
			<div>
				<?php get_venues_list(); ?>
			</div>
		</div>

		<div class="filter-wrapper">
			<div class="v-type">
				<span class="reset-filter type hidden"><span></span></span>
				<?php get_event_types_list(); ?>
			</div>
			<div class="v-location">
				<span class="reset-filter location hidden"><span></span></span>
				<?php get_event_location_list(); ?>
			</div>
			<div class="search-button disabled">
				<button value="search">Go</button>
			</div>
			<input class="filter-url" type="hidden" placeholder="URL">
		</div>

	</form>
</fieldset>