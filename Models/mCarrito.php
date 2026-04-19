<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/mUtilitario.php";

function ObtenerOCrearCarritoModel($idUsuario)
{
    $conexion = OpenDatabase();

    // Buscar carrito existente
    $stmt = mysqli_prepare($conexion, "CALL SP_OBTENER_CARRITO(?)");
    mysqli_stmt_bind_param($stmt, "i", $idUsuario);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $carrito = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    mysqli_next_result($conexion);

    if ($carrito) {
        CloseDatabase($conexion);
        return $carrito["ID_CARRITO"];
    }

    // No existe → crear uno nuevo
    $stmtCrear = mysqli_prepare($conexion, "CALL SP_CREAR_CARRITO_USUARIO(?)");
    mysqli_stmt_bind_param($stmtCrear, "i", $idUsuario);
    mysqli_stmt_execute($stmtCrear);
    $resultCrear = mysqli_stmt_get_result($stmtCrear);
    $nuevo = mysqli_fetch_assoc($resultCrear);
    mysqli_stmt_close($stmtCrear);
    mysqli_next_result($conexion);

    CloseDatabase($conexion);
    return $nuevo["ID_CARRITO"];
}

function AgregarProductoCarritoModel($idUsuario, $idProducto, $cantidad)
{
    $idCarrito = ObtenerOCrearCarritoModel($idUsuario);
    $conexion  = OpenDatabase();

    // Verificar si el producto ya está en el carrito
    $stmtVer = mysqli_prepare($conexion, "CALL SP_VERIFICAR_ITEM_CARRITO(?, ?)");
    mysqli_stmt_bind_param($stmtVer, "ii", $idCarrito, $idProducto);
    mysqli_stmt_execute($stmtVer);
    $result = mysqli_stmt_get_result($stmtVer);
    $itemExistente = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmtVer);
    mysqli_next_result($conexion);

    if ($itemExistente) {
        // Sumar cantidad
        $nuevaCantidad = $itemExistente["CANTIDAD"] + $cantidad;
        $stmtUpd = mysqli_prepare($conexion, "CALL SP_ACTUALIZAR_ITEM_CARRITO(?, ?)");
        mysqli_stmt_bind_param($stmtUpd, "ii", $itemExistente["ID_ITEM"], $nuevaCantidad);
        $ok = mysqli_stmt_execute($stmtUpd);
        mysqli_stmt_close($stmtUpd);
        mysqli_next_result($conexion);
    } else {
        // Insertar nuevo ítem
        $stmtIns = mysqli_prepare($conexion, "CALL SP_INSERTAR_ITEM_CARRITO(?, ?, ?)");
        mysqli_stmt_bind_param($stmtIns, "iii", $idCarrito, $idProducto, $cantidad);
        $ok = mysqli_stmt_execute($stmtIns);
        mysqli_stmt_close($stmtIns);
        mysqli_next_result($conexion);
    }

    CloseDatabase($conexion);
    return $ok;
}

function ConsultarCarritoModel($idUsuario)
{
    $conexion = OpenDatabase();

    $stmt = mysqli_prepare($conexion, "CALL SP_CONSULTAR_CARRITO(?)");
    mysqli_stmt_bind_param($stmt, "i", $idUsuario);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $items = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }

    mysqli_stmt_close($stmt);
    mysqli_next_result($conexion);
    CloseDatabase($conexion);
    return $items;
}

function ConsultarResumenCarritoModel($idUsuario)
{
    $conexion = OpenDatabase();

    $stmt = mysqli_prepare($conexion, "CALL SP_RESUMEN_CARRITO(?)");
    mysqli_stmt_bind_param($stmt, "i", $idUsuario);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $resumen = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
    mysqli_next_result($conexion);
    CloseDatabase($conexion);
    return $resumen;
}

function RemoverProductoCarritoModel($idItem)
{
    $conexion = OpenDatabase();

    $stmt = mysqli_prepare($conexion, "CALL SP_REMOVER_ITEM_CARRITO(?)");
    mysqli_stmt_bind_param($stmt, "i", $idItem);
    $ok = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_next_result($conexion);
    CloseDatabase($conexion);
    return $ok;
}

function PagarCarritoModel($idUsuario)
{
    $idCarrito = ObtenerOCrearCarritoModel($idUsuario);
    $conexion  = OpenDatabase();

    // 1. Calcular total
    $stmtTotal = mysqli_prepare($conexion, "CALL SP_TOTAL_CARRITO(?)");
    mysqli_stmt_bind_param($stmtTotal, "i", $idCarrito);
    mysqli_stmt_execute($stmtTotal);
    $resultTotal = mysqli_stmt_get_result($stmtTotal);
    $total = mysqli_fetch_assoc($resultTotal)["Total"];
    mysqli_stmt_close($stmtTotal);
    mysqli_next_result($conexion);

    // 2. Crear factura
    $stmtFact = mysqli_prepare($conexion, "CALL SP_CREAR_FACTURA(?, ?)");
    mysqli_stmt_bind_param($stmtFact, "id", $idUsuario, $total);
    mysqli_stmt_execute($stmtFact);
    $resultFact = mysqli_stmt_get_result($stmtFact);
    $idFactura = mysqli_fetch_assoc($resultFact)["ID_FACTURA"];
    mysqli_stmt_close($stmtFact);
    mysqli_next_result($conexion);

    // 3. Insertar detalle de factura
    $stmtDet = mysqli_prepare($conexion, "CALL SP_CREAR_DETALLE_FACTURA(?, ?)");
    mysqli_stmt_bind_param($stmtDet, "ii", $idFactura, $idCarrito);
    mysqli_stmt_execute($stmtDet);
    mysqli_stmt_close($stmtDet);
    mysqli_next_result($conexion);

    // 4. Descontar stock
    $stmtStock = mysqli_prepare($conexion, "CALL SP_DESCONTAR_STOCK(?)");
    mysqli_stmt_bind_param($stmtStock, "i", $idCarrito);
    mysqli_stmt_execute($stmtStock);
    mysqli_stmt_close($stmtStock);
    mysqli_next_result($conexion);

    // 5. Vaciar carrito
    $stmtVaciar = mysqli_prepare($conexion, "CALL SP_VACIAR_CARRITO(?)");
    mysqli_stmt_bind_param($stmtVaciar, "i", $idCarrito);
    $ok = mysqli_stmt_execute($stmtVaciar);
    mysqli_stmt_close($stmtVaciar);
    mysqli_next_result($conexion);

    CloseDatabase($conexion);
    return $ok;
}

function VaciarCarritoCompletoModel($idUsuario)
{
    $conexion = OpenDatabase();

    $stmt = mysqli_prepare($conexion, "CALL SP_VACIAR_CARRITO_USUARIO(?)");
    mysqli_stmt_bind_param($stmt, "i", $idUsuario);
    $ok = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_next_result($conexion);
    CloseDatabase($conexion);
    return $ok;
}