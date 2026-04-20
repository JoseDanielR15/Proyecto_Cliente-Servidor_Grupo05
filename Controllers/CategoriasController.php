<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/CategoriasModel.php";

if (!function_exists("ConsultarCategorias")) {
    function ConsultarCategorias()
    {
        return MostrarCategorias();
    }
}