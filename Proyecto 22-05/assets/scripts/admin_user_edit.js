var checked = false;
// Si se marca la checkbox muestra la contraseña.
$('#mostrarPassword').change(function(){
    checked = !checked;
    if (checked) {
        $('#password').prop('type', 'text');
    } else {
        $('#password').prop('type', 'password');
    }
});
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