// Mediante JQuery, se detecta cuando se pulsa una tecla en 
// el elemento con ID descripción y se actualiza el elemento charNum.
$('#descripcion').on('keyup', function() {
    var max = 160;
    var len = $(this).val().length;
    $('#charNum').text(len + '/' + max);
});

var max = 160;
var len = $('#descripcion').val().length;
$('#charNum').text(len + '/' + max);