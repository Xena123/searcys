$(document).ready(function () {

  // initializing select2 to advanced search select components
  $('#venue-search select').select2(
    {
      width: 'resolve',
      dropdownAutoWidth : true,
      minimumResultsForSearch: -1
    }
  );

  // Setting up select2 events
  $('.venue-filter, .restaurant-filter, .event-type-filter, .event-location-filter').on("select2:open", function() {
    $(".select2-search--dropdown .select2-search__field").attr("placeholder", "Type to filter");
  });
  $('.venue-filter, .restaurant-filter, .event-type-filter, .event-location-filter').on("select2:opening", function() {
    setTimeout(function(){
      $('.select2-dropdown').css("opacity", "1");
    }, 100);
  });

  $('.venue-filter, .restaurant-filter, .event-type-filter, .event-location-filter').on('select2:closing', function (e) {
    $('.select2-dropdown').css("opacity", "0");
  });
  $('.venue-filter, .restaurant-filter, .event-type-filter, .event-location-filter').on('select2:close', function (e) {
    $('.select2-dropdown').css("opacity", "");
  });

  // Search functionality

  $( ".venue-filter" ).change(function() {
    $(location).attr('href', $(this).val());
  });

  $( ".restaurant-filter" ).change(function() {
    $(location).attr('href', $(this).val());
  });

  $( ".event-type-filter" ).change(function() {
    var currentDomain = document.location.origin;
    if ($(this).val() !== '0') {
      $('.reset-filter.type').removeClass('hidden');
      $( ".v-type .select2-selection__arrow" ).hide();

      if ($('.event-location-filter').val() !== '0') {
        $( ".filter-url" ).val(currentDomain + '/' + $(this).val() + '-in-' +  $('.event-location-filter').val())
      }  else {
        $( ".filter-url" ).val(currentDomain + '/venue-event/' + $(this).val());
      }
    } else {
      $('.reset-filter.type').addClass('hidden');
      $( ".v-type .select2-selection__arrow" ).show();
    }
  });

  $( ".event-location-filter" ).change(function() {
    var currentDomain = document.location.origin;
    if ($(this).val() !== '0') {
      $('.reset-filter.location').removeClass('hidden');
      $( ".v-location .select2-selection__arrow" ).hide();

      if ($('.event-type-filter').val() !== '0') {
        $( ".filter-url" ).val(currentDomain + '/' + $('.event-type-filter').val() + '-in-' + $(this).val())
      }  else {
        $( ".filter-url" ).val(currentDomain + '/venue-location/' + $(this).val());
      }
    } else {
      $('.reset-filter.location').addClass('hidden');
      $( ".v-location .select2-selection__arrow" ).show();
    }
  });

  $( ".event-type-filter, .event-location-filter" ).change(function() {

    showVenues();
    handleSubmit(false);

    var location = $(".event-location-filter"),
      type = $(".event-type-filter");

    if (type.val() !== '0') {
      hideVenues();
      $('.event-type-filter, .event-location-filter').closest('div').removeClass('disabled');
    }
    if (location.val() !== '0') {
      hideVenues();
      $('.event-type-filter, .event-location-filter').closest('div').removeClass('disabled');
    }
  });

  function hideVenues() {
    $('.venue-filter, .event-type-filter, .restaurant-filter, .event-location-filter').closest('div').addClass('disabled');
    handleSubmit(true)
  }

  function showVenues() {
    $('.venue-filter, .event-type-filter, .restaurant-filter, .event-location-filter').closest('div').removeClass('disabled');
  }

  function handleSubmit(disabled) {
    if (disabled === true) {
      $('.search-button').removeClass('disabled');
    } else {
      $('.search-button').addClass('disabled');
    }
  }

  $( "#venue-search form" ).submit(function(e) {
    e.preventDefault();
    var $url = $( ".filter-url" ).val();
    $(location).attr('href',$url);
  });

  $( ".reset-filter.type" ).click(function(e) {
    e.preventDefault();
    $('.event-type-filter').val(0).trigger('change');
    $(this).addClass('hidden');
    console.log("Remove filter");
  });

  $( ".reset-filter.location" ).click(function(e) {
    e.preventDefault();
    $('.event-location-filter').val(0).trigger('change');
    $(this).addClass('hidden');
  });
});