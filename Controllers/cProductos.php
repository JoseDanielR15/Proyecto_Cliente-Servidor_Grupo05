<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/mProductos.php";

function ConsultarProductosController()
{
    return ConsultarProductosModel();
}

function InsertarProductoController($nombre, $precio, $cantidad)
{
    return InsertarProductoModel($nombre, $precio, $cantidad);
}

function ObtenerProductoController($idProducto)
{
    return ObtenerProductoModel($idProducto);
}

function ActualizarProductoController($idProducto, $nombre, $precio, $cantidad)
{
    return ActualizarProductoModel($idProducto, $nombre, $precio, $cantidad);
}

function EliminarProductoController($idProducto)
{
    return EliminarProductoModel($idProducto);
}
?>