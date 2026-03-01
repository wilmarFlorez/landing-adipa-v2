(function ($) {
  'use strict';

  var $pills    = $('.c-filter-pill');
  var $items    = $('.s-courses__item');
  var $noResult = $('#no-courses');

  // Filter courses by category and update grid visibility
  function filterCourses(category) {
    var visibleCount = 0;

    $items.each(function () {
      var $item        = $(this);
      var itemCategory = $item.data('category');
      var shouldShow   = category === 'all' || itemCategory === category;

      if (shouldShow) {
        $item.removeClass('is-hidden');
        visibleCount++;
      } else {
        $item.addClass('is-hidden');
      }
    });

    // Show empty-state message only when no courses match
    if (visibleCount === 0) {
      $noResult.fadeIn(200);
    } else {
      $noResult.fadeOut(150);
    }
  }

  // Update pill active state and aria-pressed attributes
  function updatePills($active) {
    $pills.each(function () {
      var $pill    = $(this);
      var isActive = $pill.is($active);

      $pill
        .toggleClass('c-filter-pill--active', isActive)
        .attr('aria-pressed', String(isActive));
    });
  }

  $(function () {
    $pills.on('click.courseFilter', function () {
      var $pill    = $(this);
      var category = $pill.data('category');

      // Skip if already active
      if ($pill.hasClass('c-filter-pill--active')) return;

      updatePills($pill);
      filterCourses(category);
    });
  });
})(jQuery);
