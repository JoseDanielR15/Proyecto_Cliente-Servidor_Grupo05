<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/mEstadisticas.php";

function ConsultarEstadisticas()
{
    // Verificar si el usuario es administrador
    if (!isset($_SESSION["ROL"]) || $_SESSION["ROL"] !== "Administrador") {
        header("Location: ../Views/vInicio/Inicio.php");
        exit;
    }

    return ConsultarEstadisticasModel();
}
?>