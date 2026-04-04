<?php
include_once "mUtilitario.php";

// ================= CONSULTAR =================
function ConsultarProductosModel()
{
    try {
        $context = OpenDatabase();

        $query = "SELECT IdProducto, Nombre, Precio, Cantidad FROM productos";
        $result = $context->query($query);

        $datos = [];
        while ($fila = $result->fetch_assoc()) {
            $datos[] = $fila;
        }

        CloseDatabase($context);
        return $datos;

    } catch (Exception $e) {
        return [];
    }
}

// ================= INSERTAR =================
function InsertarProductoModel($nombre, $descripcion, $precio, $cantidad, $imagen)
{
    try {
        $context = OpenDatabase();

        $query = "INSERT INTO tbl_productos (NOMBRE, DESCRIPCION, PRECIO, CANTIDAD, IMAGEN) 
                  VALUES ('$nombre', '$descripcion', '$precio', '$cantidad', '$imagen')";

        $result = $context->query($query);

        CloseDatabase($context);
        return $result;

    } catch (Exception $e) {
        return false;
    }
}


// ================= OBTENER PRODUCTO =================
function ObtenerProductoModel($idProducto)
{
    try {
        $context = OpenDatabase();

        $query = "SELECT IdProducto, Nombre, Precio, Cantidad 
                  FROM productos 
                  WHERE IdProducto = '$idProducto'";

        $result = $context->query($query);

        $dato = null;
        if ($fila = $result->fetch_assoc()) {
            $dato = $fila;
        }

        CloseDatabase($context);
        return $dato;

    } catch (Exception $e) {
        return null;
    }
}

// ================= ACTUALIZAR =================
function ActualizarProductoModel($idProducto, $nombre, $precio, $cantidad)
{
    try {
        $context = OpenDatabase();

        $query = "UPDATE productos 
                  SET Nombre='$nombre', Precio='$precio', Cantidad='$cantidad'
                  WHERE IdProducto='$idProducto'";

        $result = $context->query($query);

        CloseDatabase($context);
        return $result;

    } catch (Exception $e) {
        return false;
    }
}

// ================= ELIMINAR =================
function EliminarProductoModel($idProducto)
{
    $context = OpenDatabase();

    $query = "DELETE FROM productos WHERE IdProducto = '$idProducto'";

    $result = $context->query($query);

    CloseDatabase($context);
    return $result;
}
?>