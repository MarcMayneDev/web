// Al presionar el botón de borrar se hace visible un modal para confirmar que se borre.
$('#modalUsers').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var nombre = button.data('nombre');

    $('#modalTitle').text(id + ' - ' + nombre);
    $('#inputID').val(id);
})