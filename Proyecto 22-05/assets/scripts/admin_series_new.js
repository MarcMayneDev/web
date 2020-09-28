// Mediante JQuery, se detecta cuando se pulsa una tecla en 
// el elemento con ID sinopsis y se actualiza el elemento charNum.
function actualizar() {
    var max = 1500;
    var len = $('#sinopsis').val().length;
    $('#charNum').text(len + '/' + max);
}

$('#sinopsis').on('keyup', function() {
    actualizar();
});

actualizar();