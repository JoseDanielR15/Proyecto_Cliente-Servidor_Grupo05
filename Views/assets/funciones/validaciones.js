// ========================================
// VALIDACIONES PARA INICIAR SESIÓN
// ========================================
$(function () {
    $("#formLogin").validate({
        rules: {
            correo: {
                required: true,
                email: true
            },
            password: {
                required: true,
                maxlength: 15
            }
        },
        messages: {
            correo: {
                required: "Campo obligatorio",
                email: "Formato incorrecto"
            },
            password: {
                required: "Campo obligatorio",
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
        }
    });
});


// ========================================
// VALIDACIONES PARA REGISTRO
// ========================================
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


// ========================================
// VALIDACIONES PARA RECUPERAR ACCESO
// ========================================
$(function () {
    $("#formRecuperarAcceso").validate({
        rules: {
            CorreoElectronico: {
                required: true,
                email: true
            }
        },
        messages: {
            CorreoElectronico: {
                required: "Campo obligatorio",
                email: "Formato incorrecto"
            }
        },
        errorElement: "span",
        errorClass: "text-danger",
        highlight: function (element) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid");
        }
    });
});


// ========================================
// VALIDACIONES PARA CAMBIAR CONTRASEÑA
// ========================================
$.validator.addMethod("sinEspacios", function (value) {
    return !/\s/.test(value);
}, "La contraseña no debe contener espacios");

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
        errorClass: "text-danger",
        highlight: function (element) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid");
        }
    });
});