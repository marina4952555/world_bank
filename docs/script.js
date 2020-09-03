$("#ajax_form").on('submit', function (e) {
  e.preventDefault();
  sendAjaxForm('result_form', 'ajax_form', 'calc.php');
});

$('.date').on('change', e => {
  var pickedDate = e.target.value;
  var pickedYear = parseInt(pickedDate.slice(0, 4), 10);
  var pickedMonth = parseInt(pickedDate.slice(5, 7));
  var pickedDay = parseInt(pickedDate.slice(-2));
  var currentDate = new Date();
  var currentYear = currentDate.getFullYear();
  var currentMonth = currentDate.getMonth() + 1;
  var currentDay = currentDate.getDate();

  if (pickedYear > currentYear) {
    return 
  } else {
    if (pickedYear < currentYear) {
      e.target.value = '';
    } else {
      if (pickedMonth > currentMonth) {
        return
      } else {
        if (pickedMonth < currentMonth) {
          e.target.value = '';
        } else {
          if (pickedDay >= currentDay) {
            return
          } else e.target.value = ''; 
        }
      }
    }
  }
});


$('#radio1').on('change', e => {
  $('.summrep').attr('required', 'required');
});

$('#radio2').on('change', e => {
  $('.summrep').attr('required', false);
});

function sendAjaxForm(result_form, ajax_form, url) {
  $.ajax({
      url: url, 
      type: "POST",
      dataType: "html",
      data: $("#"+ajax_form).serialize(),
      success: function(response) { 
        result = $.parseJSON(response);
        $('#result_form').html('Результат: '+result);
    },
    error: function(response) { 
          $('#result_form').html('Ошибка. Данные не отправлены.');
    }
 })
}

$( function() {
  $( ".slider1" ).slider({
    value:1000,
    min: 0,
    max: 3000000,
    step: 1000,
    slide: function( event, ui ) {
      $( ".summ" ).val( ui.value );
    }
  });
  $( ".summ" ).val( $( ".slider1" ).slider( "value" ) );
} );

$( function() {
  $( ".slider2" ).slider({
    value:1000,
    min: 0,
    max: 3000000,
    step: 1000,
    slide: function( event, ui ) {
      $( ".summrep" ).val( ui.value );
    }
  });
  $( ".summrep" ).val( $( ".slider2" ).slider( "value" ) );
} );