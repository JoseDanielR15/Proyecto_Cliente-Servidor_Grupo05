$(document).on("click", ".btn-info", function () {
    var id = $(this).data('id');
    var nombre = $(this).data('nombre');
    var email = $(this).data('email');
    var telefono = $(this).data('telefono');
    var especialidad = $(this).data('especialidad');

    $("#edit_id").val(id);
    $("#edit_nombre").val(nombre);
    $("#edit_email").val(email);
    $("#edit_telefono").val(telefono);
    $("#edit_especialidad").val(especialidad);
});