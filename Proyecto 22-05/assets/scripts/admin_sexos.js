// Al presionar el botón de borrar se hace visible un modal para confirmar que se borre.
$('#modalSexos').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var ca = button.data('ca');
    var en = button.data('en');
    var es = button.data('es');

    $('#modalTitle').text(id);
    $('#modalSexosInfo').text("CA: " + ca + " EN: " + en + " ES: " + es);
    $('#inputID').val(id);
})