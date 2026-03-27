$(function () {
    $("#formRegistro").validate({
        rules: {
            Identificacion: { required: true },
            Nombre: { required: true },
            CorreoElectronico: { required: true, email: true },
            Contrasenna: { required: true, minlength: 8, maxlength: 15 }
        },
        messages: {
            Identificacion: { required: "Campo obligatorio" },
            Nombre: { required: "Campo obligatorio" },
            CorreoElectronico: {
                required: "Campo obligatorio",
                email: "Formato incorrecto"
            },
            Contrasenna: {
                required: "Campo obligatorio",
                minlength: "Mínimo 8 caracteres",
                maxlength: "Máximo 15 caracteres"
            }
        },
        errorElement: "span",
        errorClass: "text-danger",
        highlight: function (element) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid");
        },
        submitHandler: function (form) {
            // Solo se envía si pasa la validación
            form.submit();
        }
    });
});



function ConsultarNombre() {
    document.getElementById("Nombre").value = "";
    let identificacion = document.getElementById("Identificacion").value;

    if (identificacion.length >= 9) {
        $.ajax({
            url: "https://apis.gometa.org/cedulas/" + identificacion,
            method: "GET",
            dataType: "json",
            success: function (response) {
                if (response.resultcount > 0) {
                    document.getElementById("Nombre").value = response.nombre;
                }
            },
            error: function () {
                alert("Hubo un problema al consultar la información.");
            }
        });
    }
}










