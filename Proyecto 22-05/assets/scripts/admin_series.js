// Al presionar el botón de borrar se hace visible un modal para confirmar que se borre.
$('#modalSeries').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var titulo = button.data('titulo');

    $('#modalTitle').text(id + " - " + titulo);
    $('#inputID').val(id);
})