<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/mFacturas.php";

if (!isset($_SESSION["Consecutivo"])) {
    header("Location: /Proyecto_Cliente-Servidor_Grupo05/Views/vSesion/sesion.php");
    exit;
}

if (isset($_POST["btnActualizarEstado"])) {
    $idFactura = (int)$_POST["IdFactura"];
    $idEstado  = (int)$_POST["IdEstado"];

    $result = ActualizarEstadoFacturaModel($idFactura, $idEstado);

    if ($result) {
        $_SESSION["MensajeExito"] = "Estado de la factura actualizado correctamente";
    } else {
        $_SESSION["Mensaje"] = "No se pudo actualizar el estado de la factura";
    }
    header("Location: /Proyecto_Cliente-Servidor_Grupo05/Views/vFacturas/vAdminFacturas.php");
    exit;
}

function ConsultarFacturasUsuario()
{
    $idUsuario = (int)$_SESSION["Consecutivo"];
    return ConsultarFacturasUsuarioModel($idUsuario);
}

function ConsultarTodasFacturas()
{
    return ConsultarTodasFacturasModel();
}

function ConsultarDetalleFactura($idFactura)
{
    return ConsultarDetalleFacturaModel((int)$idFactura);
}