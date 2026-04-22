<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/mUtilitario.php";

function ConsultarEstadisticasModel()
{
    $context = OpenDatabase();

    $datos = [];

    // Producto más vendido
    $queryProducto = "SELECT p.NOMBRE, SUM(d.CANTIDAD) as VALOR, 'Producto Más Vendido' as TITULO
                      FROM tbl_detalle_fact d
                      INNER JOIN tbl_productos p ON d.ID_PRODUCTO = p.ID_PRODUCTO
                      GROUP BY p.ID_PRODUCTO, p.NOMBRE
                      ORDER BY VALOR DESC
                      LIMIT 1";
    $resultProducto = $context->query($queryProducto);
    if ($resultProducto && $row = $resultProducto->fetch_assoc()) {
        $datos[] = $row;
    }

    // Cliente frecuente
    $queryCliente = "SELECT u.NOMBRE, COUNT(f.ID_FACTURA) as VALOR, 'Cliente Frecuente' as TITULO
                     FROM tbl_facturas f
                     INNER JOIN tbl_usuarios u ON f.ID_USUARIO = u.ID_USUARIO
                     GROUP BY u.ID_USUARIO, u.NOMBRE
                     ORDER BY VALOR DESC
                     LIMIT 1";
    $resultCliente = $context->query($queryCliente);
    if ($resultCliente && $row = $resultCliente->fetch_assoc()) {
        $datos[] = $row;
    }

    // Total recaudado
    $queryTotal = "SELECT SUM(TOTAL) as VALOR, '' as NOMBRE, 'Total Recaudado' as TITULO
                   FROM tbl_facturas";
    $resultTotal = $context->query($queryTotal);
    if ($resultTotal && $row = $resultTotal->fetch_assoc()) {
        $datos[] = $row;
    }

    CloseDatabase($context);
    return $datos;
}
?>