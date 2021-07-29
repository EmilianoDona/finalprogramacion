$(document).ready(function () {

  // Confirmar

  new jBox('Confirm', {
    content: '<p style="color:black; font-weight:bold;">¿DESEA ELIMINARLO?</p>',
    cancelButton: 'Cancelar',
    confirmButton: 'Confirmar'
  });

  // JS adicional para fines de demostración

  $('#Tooltip-4').on('mouseenter mouseleave', function () {
    $('#Tooltip-4').addClass('active').html('Wait...');
  });

  $('.target-notice').on('click', function () {
    $(this).addClass('active').html('Click me again');
  }).on('mouseleave', function () {
    $(this).removeClass('active').html('Click me');
  });

  var colors = ['red', 'green', 'blue', 'yellow'];
  var index = 0;
  var getColor = function () {
    if (index >= colors.length) {
      index = 0;
    }
    return colors[index++];
  };
});