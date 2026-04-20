<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/mUtilitario.php";

function MostrarCategorias() {

    $conexion = OpenDatabase();

    $stmt = mysqli_prepare($conexion, "CALL SP_MostrarCategorias()");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $categorias = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $categorias[] = $row;
    }

    mysqli_stmt_close($stmt);
    mysqli_next_result($conexion);
    CloseDatabase($conexion);
    return $categorias;

}