// Variables para la subida de imagen.
var defaultImage = $('#thumbnail').attr('src');
var defaultImageLabel = "Seleccionar archivo";

// Cuando hay un cambio en el input de la imagen, se llama
// a la función readURL y se actualiza el nombre del fichero
$('#imagen').change(function (){
    var fileName = $(this).val();
    console.log(fileName);
    $('.custom-file-label').html(fileName);
    readURL(this);
});

// Si se a escogido una imagen, cambia el source de thumbnail.
// En caso contrario, se utilizan los datos por defecto.
function readURL (input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#thumbnail').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        $('#thumbnail').attr('src', defaultImage);
        $('.custom-file-label').html(defaultImageLabel);
    }
}