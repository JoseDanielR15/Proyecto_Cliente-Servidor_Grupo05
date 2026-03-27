<?php
include_once "../layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Controllers/cProductos.php";

if (isset($_GET["id"])) {

    $id = $_GET["id"];
    $resultado = EliminarProductoController($id);

    if ($resultado) {
        header("Location: consultarProductos.php");
        exit;
    } else {
        echo "Error al eliminar";
    }
}
?>