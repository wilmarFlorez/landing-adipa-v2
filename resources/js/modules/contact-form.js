(function ($) {
  'use strict';

  var EMAIL_REGEX = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  // Validation rules per field
  var rules = {
    name: function (val) {
      if (!val) return 'El nombre es requerido.';
      if (val.length < 2) return 'El nombre debe tener al menos 2 caracteres.';
      return null;
    },
    email: function (val) {
      if (!val) return 'El correo electrónico es requerido.';
      if (!EMAIL_REGEX.test(val)) return 'Ingresa un correo electrónico válido.';
      return null;
    },
    message: function (val) {
      if (!val) return 'El mensaje es requerido.';
      if (val.length < 10) return 'El mensaje debe tener al menos 10 caracteres.';
      return null;
    },
  };

  // Apply valid/error state to a single input
  function applyFieldState($input, errorMessage) {
    var fieldName  = $input.attr('name');
    var $errorSpan = $('#' + fieldName + '-error');

    if (errorMessage) {
      $input
        .removeClass('c-form__input--valid')
        .addClass('c-form__input--error');
      $errorSpan.text(errorMessage);
    } else {
      $input
        .removeClass('c-form__input--error')
        .addClass('c-form__input--valid');
      $errorSpan.text('');
    }

    return !errorMessage;
  }

  // Validate a single field and return whether it passed
  function validateField($input) {
    var name  = $input.attr('name');
    var value = $input.val().trim();
    var error = rules[name] ? rules[name](value) : null;
    return applyFieldState($input, error);
  }

  // Validate all fields and return whether the whole form is valid
  function validateForm($form) {
    var isValid = true;

    $form.find('.c-form__input').each(function () {
      if (!validateField($(this))) {
        isValid = false;
      }
    });

    return isValid;
  }

  // Show success state — hide form, fade in success message
  function showSuccess($form, $success) {
    $form.fadeOut(250, function () {
      $success.fadeIn(350);
    });
  }

  $(function () {
    var $form    = $('#contact-form');
    var $success = $('#form-success');

    if (!$form.length) return;

    // Lazy validation: validate on blur and on subsequent input only for
    // fields the user has already interacted with (touched)
    $form.on('blur.contactForm', '.c-form__input', function () {
      var $input = $(this);
      $input.data('touched', true);
      validateField($input);
    });

    $form.on('input.contactForm', '.c-form__input', function () {
      if ($(this).data('touched')) {
        validateField($(this));
      }
    });

    // Submit handler
    $form.on('submit.contactForm', function (e) {
      e.preventDefault();

      // Mark all fields as touched so errors show even if untouched
      $form.find('.c-form__input').data('touched', true);

      if (!validateForm($form)) return;

      // Disable submit button and update label while "sending"
      var $btn = $form.find('[type="submit"]');
      $btn.prop('disabled', true).text('Enviando...');

      // Simulate async form submission
      setTimeout(function () {
        showSuccess($form, $success);
      }, 1500);
    });
  });
})(jQuery);
