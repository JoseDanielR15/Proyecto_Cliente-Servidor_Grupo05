<?php
include_once "mUtilitario.php";

// ================= CONSULTAR =================
function ConsultarProductosModel()
{
    try {
        $context = OpenDatabase();

        $sp = "CALL SP_OBTENER_PRODUCTOS()";
        $result = $context->query($sp);

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

        $query = "INSERT INTO tbl_productos (NOMBRE, DESCRIPCION, PRECIO, CANTIDAD, IMAGEN, ID_ESTADO) 
                  VALUES ('$nombre', '$descripcion', '$precio', '$cantidad', '$imagen', 1)";

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

        $query = "SELECT ID_PRODUCTO as IdProducto, NOMBRE as Nombre, PRECIO as Precio, CANTIDAD as Cantidad 
                  FROM tbl_productos 
                  WHERE ID_PRODUCTO = '$idProducto'";

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

        $query = "UPDATE tbl_productos 
                  SET NOMBRE='$nombre', PRECIO='$precio', CANTIDAD='$cantidad'
                  WHERE ID_PRODUCTO='$idProducto'";

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
    try {
        $context = OpenDatabase();

        $query = "DELETE FROM tbl_productos WHERE ID_PRODUCTO = '$idProducto'";

        $result = $context->query($query);

        CloseDatabase($context);
        return $result;

    } catch (Exception $e) {
        return false;
    }
}
?>