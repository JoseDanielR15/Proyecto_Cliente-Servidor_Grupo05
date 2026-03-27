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