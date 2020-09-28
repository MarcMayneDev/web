// Mediante JQuery, se detecta cuando se pulsa una tecla en 
// el elemento con ID sinopsis y se actualiza el elemento charNum.
$('#sinopsis').on('keyup', function() {
    var max = 1500;
    var len = $(this).val().length;
    $('#charNum').text(len + '/' + max);
});

var max = 1500;
var len = $('#sinopsis').val().length;
$('#charNum').text(len + '/' + max);