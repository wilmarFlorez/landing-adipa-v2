(function ($) {
  'use strict';

  var SCROLL_THRESHOLD = 10;

  $(function () {
    // Cache selectors inside DOM-ready so queries run after the DOM is built
    var $header  = $('.l-header');
    var $burger  = $('.l-header__burger');
    var $navList = $('.l-header__nav-list');

    // Add/remove scrolled shadow class based on page scroll position
    function handleScroll() {
      if ($(window).scrollTop() > SCROLL_THRESHOLD) {
        $header.addClass('l-header--scrolled');
      } else {
        $header.removeClass('l-header--scrolled');
      }
    }

    // Toggle mobile menu open/closed
    function toggleMenu() {
      var isOpen = $navList.hasClass('is-open');

      $navList.toggleClass('is-open');
      $burger.attr('aria-expanded', String(!isOpen));
      $burger.attr('aria-label', isOpen ? 'Abrir menú' : 'Cerrar menú');
    }

    // Close mobile menu
    function closeMenu() {
      $navList.removeClass('is-open');
      $burger.attr('aria-expanded', 'false');
      $burger.attr('aria-label', 'Abrir menú');
    }

    // Close menu when clicking outside the header
    function handleOutsideClick(e) {
      if ($navList.hasClass('is-open') && !$(e.target).closest('.l-header').length) {
        closeMenu();
      }
    }

    // Close menu when a nav link is clicked (smooth scroll navigation)
    function handleNavLinkClick() {
      closeMenu();
    }

    // Initial scroll check (page might load already scrolled)
    handleScroll();

    $(window).on('scroll.header', handleScroll);
    $burger.on('click.header', toggleMenu);
    $(document).on('click.header', handleOutsideClick);
    $navList.on('click.header', '.l-header__nav-link', handleNavLinkClick);
  });
})(jQuery);
