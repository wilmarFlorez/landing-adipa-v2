(function ($) {
  'use strict';

  $(function () {
    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // If the user prefers reduced motion, skip all JS-driven animations and
    // make every animated element immediately visible.
    if (reducedMotion) {
      $('.js-animate-on-scroll').addClass('is-visible');
      return;
    }

    var STAGGER_MS = 80;

    // Assign per-card stagger delays before the observer fires so the delay
    // is ready even when cards are already in the initial viewport.
    $('.s-courses__grid .js-animate-on-scroll').each(function (index) {
      $(this).data('stagger-delay', index * STAGGER_MS);
    });

    // ── Entrance animation observer ───────────────────────────────────────────
    var entranceObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var $el    = $(entry.target);
          var delay  = $el.data('stagger-delay') || 0;

          entry.target.style.transitionDelay = delay + 'ms';
          $el.addClass('is-visible');
          entranceObserver.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '0px 0px -40px 0px',
    });

    $('.js-animate-on-scroll').each(function () {
      entranceObserver.observe(this);
    });


  });
})(jQuery);
