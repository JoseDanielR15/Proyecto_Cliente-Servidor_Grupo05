function CerrarSesion() {
    $.ajax({
        url: '../vSesion/logout.php',
        method: 'POST',
        success: function () {
            window.location.href = '../vSesion/sesion.php';
        }
    });
}