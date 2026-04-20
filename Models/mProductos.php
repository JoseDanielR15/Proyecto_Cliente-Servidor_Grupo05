<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/mUtilitario.php";

function ConsultarProductosModel()
{
    $conexion = OpenDatabase();

    $stmt = mysqli_prepare($conexion, "CALL SP_OBTENER_PRODUCTOS()");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $productos = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $productos[] = $row;
    }

    mysqli_stmt_close($stmt);
    mysqli_next_result($conexion);
    CloseDatabase($conexion);
    return $productos;
}

function ObtenerProductoModel($idProducto)
{
    $conexion = OpenDatabase();

    $stmt = mysqli_prepare($conexion, "CALL SP_OBTENER_PRODUCTO_ID(?)");
    mysqli_stmt_bind_param($stmt, "i", $idProducto);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $producto = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
    mysqli_next_result($conexion);
    CloseDatabase($conexion);
    return $producto;
}

function InsertarProductoModel($nombre, $descripcion, $precio, $cantidad, $marca, $categoria, $imagen)
{
    $conexion = OpenDatabase();

    // SP_CREAR_PRODUCTO(nombre, descripcion, precio, cantidad, marca, categoria)
    // Tipos: s=string, s=string, d=decimal, i=int, i=int, i=int
    $stmt = mysqli_prepare($conexion, "CALL SP_CREAR_PRODUCTO(?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssdiii", $nombre, $descripcion, $precio, $cantidad, $marca, $categoria);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_next_result($conexion);

    // Actualizar imagen por separado (SP_CREAR_PRODUCTO no la incluye)
    if ($ok && $imagen !== '') {
        $idProducto = mysqli_insert_id($conexion);
        $stmtImg = mysqli_prepare($conexion, "UPDATE tbl_productos SET IMAGEN = ? WHERE ID_PRODUCTO = ?");
        mysqli_stmt_bind_param($stmtImg, "si", $imagen, $idProducto);
        mysqli_stmt_execute($stmtImg);
        mysqli_stmt_close($stmtImg);
    }

    CloseDatabase($conexion);



    return $ok;
}

function ActualizarProductoModel($idProducto, $nombre, $descripcion, $precio, $cantidad, $imagen)
{
    $conexion = OpenDatabase();

    // SP_ACTUALIZAR_PRODUCTO(idProducto, nombre, descripcion, precio, cantidad, imagen)
    // Tipos: i=int, s=string, s=string, d=decimal, i=int, s=string
    $stmt = mysqli_prepare($conexion, "CALL SP_ACTUALIZAR_PRODUCTO(?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "issdis", $idProducto, $nombre, $descripcion, $precio, $cantidad, $imagen);
    $ok = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_next_result($conexion);
    CloseDatabase($conexion);
    return $ok;
}

function EliminarProductoModel($idProducto)
{
    $conexion = OpenDatabase();

    $stmt = mysqli_prepare($conexion, "CALL SP_ELIMINAR_PRODUCTO(?)");
    mysqli_stmt_bind_param($stmt, "i", $idProducto);
    $ok = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_next_result($conexion);
    CloseDatabase($conexion);
    return $ok;
}

function CambiarEstadoProductoModel($idProducto)
{
    $conexion = OpenDatabase();

    $stmt = mysqli_prepare($conexion, "CALL SP_CAMBIAR_ESTADO_PRODUCTO(?)");
    mysqli_stmt_bind_param($stmt, "i", $idProducto);
    $ok = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_next_result($conexion);
    CloseDatabase($conexion);
    return $ok;
}

function MostrarProductosPorCategoria($idCategoria)
{
    $conexion = OpenDatabase();

    $stmt = mysqli_prepare($conexion, "CALL SP_ProductosPorCategoria(?)");
    mysqli_stmt_bind_param($stmt, "i", $idCategoria);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $productos = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $productos[] = $row;
    }

    mysqli_stmt_close($stmt);
    mysqli_next_result($conexion);
    CloseDatabase($conexion);

    return $productos;
}