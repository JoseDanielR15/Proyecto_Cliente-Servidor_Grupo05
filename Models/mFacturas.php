<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/mUtilitario.php";

function ConsultarFacturasUsuarioModel($idUsuario)
{
    $conexion = OpenDatabase();

    $stmt = mysqli_prepare($conexion, "CALL SP_CONSULTAR_FACTURAS_USUARIO(?)");
    mysqli_stmt_bind_param($stmt, "i", $idUsuario);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $facturas = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $facturas[] = $row;
    }

    mysqli_stmt_close($stmt);
    mysqli_next_result($conexion);
    CloseDatabase($conexion);
    return $facturas;
}

function ConsultarTodasFacturasModel()
{
    $conexion = OpenDatabase();

    $stmt = mysqli_prepare($conexion, "CALL SP_CONSULTAR_TODAS_FACTURAS()");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $facturas = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $facturas[] = $row;
    }

    mysqli_stmt_close($stmt);
    mysqli_next_result($conexion);
    CloseDatabase($conexion);
    return $facturas;
}

function ConsultarDetalleFacturaModel($idFactura)
{
    $conexion = OpenDatabase();

    $stmt = mysqli_prepare($conexion, "CALL SP_CONSULTAR_DETALLE_FACTURA(?)");
    mysqli_stmt_bind_param($stmt, "i", $idFactura);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $detalle = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $detalle[] = $row;
    }

    mysqli_stmt_close($stmt);
    mysqli_next_result($conexion);
    CloseDatabase($conexion);
    return $detalle;
}

function ActualizarEstadoFacturaModel($idFactura, $idEstado)
{
    $conexion = OpenDatabase();

    $stmt = mysqli_prepare($conexion, "CALL SP_ACTUALIZAR_ESTADO_FACTURA(?, ?)");
    mysqli_stmt_bind_param($stmt, "ii", $idFactura, $idEstado);
    $ok = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_next_result($conexion);
    CloseDatabase($conexion);
    return $ok;
}