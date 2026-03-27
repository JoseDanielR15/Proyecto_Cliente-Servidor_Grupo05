$(function () {
    if ($("#tProductos").length) {
        new DataTable("#tProductos", {
            language: {
                url: "https://cdn.datatables.net/plug-ins/2.3.7/i18n/es-ES.json",
            },
            ordering: false
        });
    }
});

$(function () {
    $("form").validate({
        rules: {
            Nombre: "required",
            Precio: "required",
            Cantidad: "required"
        }
    });
});