<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/TecnicosModel.php";


function ConsultarTecnicos() {
    return ConsultarTecnicosModel();
}


if (isset($_POST["btnInsertarTecnico"])) {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $especialidad = $_POST["especialidad"];
    $id_estado = 1; 

    $respuesta = InsertarTecnicoModel($nombre, $email, $telefono, $especialidad, $id_estado);

    if ($respuesta) {
        header("Location: ../vTecnicos/adminTecnicos.php"); 
    } else {
        echo "Error al insertar";
    }
}

if (isset($_POST["btnActualizarTecnico"])) {
    $id = $_POST["id_tecnico"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $especialidad = $_POST["especialidad"];
    $id_estado = 1; 

    $respuesta = ActualizarTecnicoModel($id, $nombre, $email, $telefono, $especialidad, $id_estado);

    if ($respuesta) {
        header("Location: ../vTecnicos/adminTecnicos.php");
    }
}

if (isset($_GET["EliminarTecnico"]) && isset($_GET["id"])) {
    $id = $_GET["id"];

    $respuesta = EliminarTecnicoModel($id);

    if ($respuesta) {
        header("Location: ../vTecnicos/adminTecnicos.php");
        exit();
    } else {
        echo "Hubo un error al intentar eliminar el registro.";
    }
}
?>