$(function () {
    $("#formRegistro").validate({
        rules: {
            Identificacion: { required: true },
            Nombre: { required: true },
            CorreoElectronico: { required: true, email: true },
            Contrasenna: { required: true, minlength: 6, maxlength: 20 }
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
                minlength: "Mínimo 6 caracteres",
                maxlength: "Máximo 20 caracteres"
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










