<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/mUtilitario.php";

function RegistrarModel($identificacion, $nombre, $contrasenna, $correoElectroncio)
{
    try {
        $context = OpenDatabase();
        $sp = "CALL SP_CREAR_USUARIO('$identificacion', '$nombre', '$correoElectroncio', '$contrasenna')";
        $result = $context->query($sp);
        CloseDatabase($context);
        return $result;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function IniciarSesionModel($correoElectronico, $contrasenna)
{
    try {
        $context = OpenDatabase();

        $sp = "CALL SP_LOGIN('$correoElectronico', '$contrasenna')";
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

        $query = "SELECT ID_USUARIO AS Consecutivo, NOMBRE AS Nombre, EMAIL AS CorreoElectronico FROM TBL_USUARIOS WHERE EMAIL = '$correoElectronico'";
        $result = $context->query($query);

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

function RecuperarAccesoModel($correoElectronico)
{
    try {
        $context = OpenDatabase();

        // Check if email exists
        $query = "SELECT ID_USUARIO FROM TBL_USUARIOS WHERE EMAIL = '$correoElectronico'";
        $result = $context->query($query);
        if ($result->num_rows == 0) {
            CloseDatabase($context);
            return false;
        }

        // Generate token
        $token = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Insert into reset table
        $insert = "INSERT INTO TBL_RESET_CONTRASENNA (EMAIL, TOKEN, EXPIRES_AT) VALUES ('$correoElectronico', '$token', '$expires')";
        $context->query($insert);

        CloseDatabase($context);
        return $token;
    } catch (Exception $e) {
        return false;
    }
}

function ResetContrasennaModel($token, $nuevaContrasenna)
{
    try {
        $context = OpenDatabase();

        // Find token
        $query = "SELECT EMAIL FROM TBL_RESET_CONTRASENNA WHERE TOKEN = '$token' AND EXPIRES_AT > NOW()";
        $result = $context->query($query);
        if ($result->num_rows == 0) {
            CloseDatabase($context);
            return "Token inválido o expirado.";
        }

        $row = $result->fetch_assoc();
        $email = $row['EMAIL'];

        // Update password
        $update = "UPDATE TBL_USUARIOS SET PASSWORD = '$nuevaContrasenna' WHERE EMAIL = '$email'";
        $context->query($update);

        // Delete token
        $delete = "DELETE FROM TBL_RESET_CONTRASENNA WHERE TOKEN = '$token'";
        $context->query($delete);

        CloseDatabase($context);
        return "Contraseña actualizada exitosamente.";
    } catch (Exception $e) {
        return "Error al actualizar la contraseña.";
    }
}

function ActualizarContrasennaModel($nuevaContrasenna, $consecutivo)
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
