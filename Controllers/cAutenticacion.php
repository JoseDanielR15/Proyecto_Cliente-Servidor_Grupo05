<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/mAutenticacion.php";

if (isset($_POST["btnIniciarSesion"])) {
    $correoElectronico = $_POST["correo"];
    $contrasenna = $_POST["password"];
    $result = IniciarSesionModel($correoElectronico, $contrasenna);
    if ($result) {
        $_SESSION["NombreUsuario"] = $result["Nombre"];
        $_SESSION["Consecutivo"] = $result["Consecutivo"];
        $_SESSION["CorreoElectronico"] = $result["CorreoElectronico"];
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