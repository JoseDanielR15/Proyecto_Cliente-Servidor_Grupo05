$.validator.addMethod("sinEspacios", function (value) {
    return !/\s/.test(value);
}, "No se permiten espacios");

$(function () {
    $("#formResetContrasenna").validate({
        rules: {
            nuevaContrasenna: {
                required: true,
                minlength: 8,
                sinEspacios: true
            },
            confirmarContrasenna: {
                required: true,
                equalTo: "#nuevaContrasenna"
            }
        },
        messages: {
            nuevaContrasenna: {
                required: "Campo obligatorio",
                minlength: "Mínimo 8 caracteres"
            },
            confirmarContrasenna: {
                required: "Campo obligatorio",
                equalTo: "Las contraseñas no coinciden"
            }
        },
        errorElement: "span",
        errorClass: "text-danger"
    });
});