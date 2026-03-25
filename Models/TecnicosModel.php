<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/mUtilitario.php";

function ConsultarTecnicosModel()
{
    $context = OpenDatabase();
    $sp = "CALL SP_ConsultarTecnicos()";
    $result = $context->query($sp);

    $datos = array();
    if ($result) {
        while ($fila = mysqli_fetch_array($result)) {
            $datos[] = $fila;
        }
        $result->free();
        while($context->next_result()) { ; }
    }

    CloseDatabase($context);
    return $datos;
}

function InsertarTecnicoModel($nombre, $email, $telefono, $especialidad, $id_estado)
{
    $context = OpenDatabase();
    $sp = "CALL SP_InsertarTecnico('$nombre', '$email', '$telefono', '$especialidad', $id_estado)";
    $result = $context->query($sp);
    CloseDatabase($context);
    return $result;
}
?>