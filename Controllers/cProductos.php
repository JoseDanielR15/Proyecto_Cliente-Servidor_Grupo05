<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/mProductos.php";

if (!function_exists("ConsultarProductosController")) {
    function ConsultarProductosController()
    {
        return ConsultarProductosModel();
    }
}

if (!function_exists("InsertarProductoController")) {
    function InsertarProductoController($nombre, $descripcion, $precio, $cantidad, $imagen)
    {
        // Marca y categoría en 1 por defecto mientras no existan formularios para esos datos
        $marca     = 1;
        $categoria = 1;
        return InsertarProductoModel($nombre, $descripcion, $precio, $cantidad, $marca, $categoria, $imagen ?? '');
    }
}

if (!function_exists("ObtenerProductoController")) {
    function ObtenerProductoController($idProducto)
    {
        return ObtenerProductoModel($idProducto);
    }
}

if (!function_exists("ActualizarProductoController")) {
    function ActualizarProductoController($idProducto, $nombre, $precio, $cantidad, $descripcion = '', $imagen = '')
    {
        return ActualizarProductoModel($idProducto, $nombre, $descripcion, $precio, $cantidad, $imagen);
    }
}

if (!function_exists("EliminarProductoController")) {
    function EliminarProductoController($idProducto)
    {
        return EliminarProductoModel($idProducto);
    }
}

if (!function_exists("CambiarEstadoProductoController")) {
    function CambiarEstadoProductoController($idProducto)
    {
        return CambiarEstadoProductoModel($idProducto);
    }
}

function ConsultarProductosPorCategoria($idCategoria)
{
    return MostrarProductosPorCategoria($idCategoria);
}