<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/mUtilitario.php";

function RegistrarModel($identificacion, $nombre, $contrasenna, $correoElectroncio)
{
    try {
        $context = OpenDatabase();
        $sp = "CALL sp_Registrar('$identificacion', '$nombre', '$contrasenna', '$correoElectroncio')";
        $result = $context->query($sp);

        CloseDatabase($context);
        return $result;
    } catch (Exception $e) {
        return false;
    }
}

function IniciarSesionModel($correoElectronico, $contrasenna)
{
    try {
        $context = OpenDatabase();

        $sp = "CALL sp_IniciarSesion('$correoElectronico', '$contrasenna')";
        $result = $context->query($sp);

        $datos = null;
        while ($fila = $result->fetch_assoc()) {
            $datos = $fila;
        }

        CloseDatabase($context);
        return $datos;
    } catch (Exception $e) {
        return null;
    }
}

function ValidarCorreoModel($correoElectronico)
{
    try {
        $context = OpenDatabase();

        $sp = "CALL sp_ValidarCorreo('$correoElectronico')";
        $result = $context->query($sp);

        $datos = null;
        while ($fila = $result->fetch_assoc()) {
            $datos = $fila;
        }

        CloseDatabase($context);
        return $datos;
    } catch (Exception $e) {
        return null;
    }
}

function ActualizarContrasennaModel($nuevaContrasenna, $consecutivo)
{
    try {
        $context = OpenDatabase();

        $sp = "CALL sp_ActualizarContrasenna('$nuevaContrasenna', '$consecutivo')";
        $result = $context->query($sp);

        CloseDatabase($context);
        return $result;
    } catch (Exception $e) {
        return false;
    }
}
