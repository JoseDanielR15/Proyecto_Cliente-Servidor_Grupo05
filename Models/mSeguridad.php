<?php
include_once "mUtilitario.php";

function ConsultarUsuarioModel($consecutivo)
{
    try {
        $context = OpenDatabase();
        $query = "SELECT ID_USUARIO AS Consecutivo, IDENTIFICACION AS Identificacion, NOMBRE AS Nombre, EMAIL AS CorreoElectronico, ROL AS Rol FROM TBL_USUARIOS WHERE ID_USUARIO = '$consecutivo'";
        $result = $context->query($query);

        $datos = null;
        if ($fila = $result->fetch_assoc()) {
            $datos = $fila;
        }

        CloseDatabase($context);
        return $datos;
    } catch (Exception $e) {
        return null;
    }
}

function ActualizarPerfilModel($identificacion, $nombre, $correoElectronico, $consecutivo)
{
    try {
        $context = OpenDatabase();
        $query = "UPDATE TBL_USUARIOS SET IDENTIFICACION = '$identificacion', NOMBRE = '$nombre', EMAIL = '$correoElectronico' WHERE ID_USUARIO = '$consecutivo'";
        $result = $context->query($query);
        CloseDatabase($context);
        return $result;
    } catch (Exception $e) {
        return false;
    }
}

function ActualizarContrasennaModel($consecutivo, $nuevaContrasenna)
{
    try {
        $context = OpenDatabase();
        $query = "UPDATE TBL_USUARIOS SET PASSWORD = '$nuevaContrasenna' WHERE ID_USUARIO = '$consecutivo'";
        $result = $context->query($query);
        CloseDatabase($context);
        return $result;
    } catch (Exception $e) {
        return false;
    }
}
