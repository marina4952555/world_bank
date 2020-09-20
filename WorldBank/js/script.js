$("#ajax_form").on('submit', function (e) {
  e.preventDefault();
  sendAjaxForm('result_form', 'ajax_form', 'calc.php');
});

$( function() {
  $( ".date" ).datepicker({ minDate: 0, dateFormat: "dd.mm.yy" });
} );


$('#radio1').on('change', e => {
  $('.summrep').attr('required', 'required');
});

$('#radio2').on('change', e => {
  $('.summrep').attr('required', false);
});


$( function() {
  $( ".slider1" ).slider({
    value:1000,
    min: 1000,
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
    min: 1000,
    max: 3000000,
    step: 1000,
    slide: function( event, ui ) {
      $( ".summrep" ).val( ui.value );
    }
  });
  $( ".summrep" ).val( $( ".slider2" ).slider( "value" ) );
} );

function sendAjaxForm(result_form, ajax_form, url) {
  $.ajax({
      url: url, 
      type: "POST",
      dataType: "html",
      data: $("#"+ajax_form).serialize(),
      success: function(response) { 
        console.log(response);
        result = $.parseJSON(response);
        $('#result_form').html('Результат: '+result);
    },
    error: function(response) { 
          $('#result_form').html('Ошибка. Данные не отправлены.');
    }
 })
}