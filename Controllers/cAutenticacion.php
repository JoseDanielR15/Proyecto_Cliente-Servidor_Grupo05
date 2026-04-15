<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/mAutenticacion.php";

if (isset($_POST["btnIniciarSesion"])) {
    $correoElectronico = $_POST["CorreoElectronico"];
    $contrasenna = $_POST["Contrasenna"];
    $result = IniciarSesionModel($correoElectronico, $contrasenna);
    if ($result) {
        $_SESSION["NombreUsuario"] = $result["NOMBRE"];
        $_SESSION["Consecutivo"] = $result["ID_USUARIO"];
        $_SESSION["CorreoElectronico"] = $result["EMAIL"];
        header("Location: ../Views/vInicio/Inicio.php");
        exit;
    } else {
        $_SESSION["Mensaje"] = "Su información no fue autenticada correctamente";
        header("Location: ../Views/vSesion/sesion.php");
        exit;
    }
}

if (isset($_POST["btnRegistrar"])) {
    $identificacion = $_POST["Identificacion"];
    $nombre = $_POST["Nombre"];
    $correoElectronico = $_POST["CorreoElectronico"];
    $contrasenna = $_POST["Contrasenna"];
    $result = RegistrarModel($identificacion, $nombre, $contrasenna, $correoElectronico);
    if (is_string($result)) {
        $_SESSION["Mensaje"] = $result;
        header("Location: ../Views/vRegistro/registro.php"); // ← esto estaba con HTTP_REFERER
        exit;
    } else if ($result) {
        header("Location: ../Views/vSesion/sesion.php");
        exit;
    } else {
        $_SESSION["Mensaje"] = "Su información no fue registrada correctamente";
        header("Location: ../Views/vRegistro/registro.php");
        exit;
    }
}

if (isset($_POST["btnRecuperarAcceso"])) {
    $correoElectronico = $_POST["CorreoElectronico"];
    $token = RecuperarAccesoModel($correoElectronico);
    if ($token) {
        // In a real app, send email with link
        // For demo, redirect to reset page with token
        header("Location: ../Views/vSesion/resetContrasenna.php?token=" . $token);
        exit;
    } else {
        $_SESSION["Mensaje"] = "Correo electrónico no encontrado.";
        header("Location: ../Views/vSesion/recuperarAcceso.php");
        exit;
    }
}

if (isset($_POST["btnResetContrasenna"])) {
    $token = $_POST["token"];
    $nuevaContrasenna = $_POST["nuevaContrasenna"];
    $result = ResetContrasennaModel($token, $nuevaContrasenna);
    $_SESSION["Mensaje"] = $result;
    header("Location: ../Views/vSesion/sesion.php");
    exit;
}