<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/mSeguridad.php";

if (!isset($_SESSION["Consecutivo"])) {
    header("Location: /Proyecto_Cliente-Servidor_Grupo05/Views/vSesion/sesion.php");
    exit;
}

if (isset($_POST["btnCambiarAcceso"])) {
    $nuevaContrasenna = $_POST["NuevaContrasenna"];
    $consecutivo = $_SESSION["Consecutivo"];

    $result = ActualizarContrasennaModel($consecutivo, $nuevaContrasenna);

    if ($result) {
        session_unset();
        session_destroy();
        header("Location: /Proyecto_Cliente-Servidor_Grupo05/Views/vSesion/sesion.php?mensaje=cambio");
        exit;
    } else {
        $_SESSION["Mensaje"] = "Su información no fue actualizada correctamente";
        header("Location: /Proyecto_Cliente-Servidor_Grupo05/Views/vSeguridad/cambiarAcceso.php");
        exit;
    }
}

if (isset($_POST["btnCambiarPerfil"])) {
    $identificacion = $_POST["Identificacion"];
    $nombre = $_POST["Nombre"];
    $correoElectronico = $_POST["CorreoElectronico"];
    $consecutivo = $_SESSION["Consecutivo"];

    $result = ActualizarPerfilModel($identificacion, $nombre, $correoElectronico, $consecutivo);

    if ($result) {
        $_SESSION["NombreUsuario"] = $nombre;
        $_SESSION["CorreoElectronico"] = $correoElectronico;
        $_SESSION["Mensaje"] = "Su información fue actualizada correctamente";
        header("Location: /Proyecto_Cliente-Servidor_Grupo05/Views/vSeguridad/cambiarPerfil.php");
        exit;
    } else {
        $_SESSION["Mensaje"] = "Su información no fue actualizada correctamente";
        header("Location: /Proyecto_Cliente-Servidor_Grupo05/Views/vSeguridad/cambiarPerfil.php");
        exit;
    }
}

function ConsultarUsuario()
{
    $consecutivo = $_SESSION["Consecutivo"];
    return ConsultarUsuarioModel($consecutivo);
}
