<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/mCarrito.php";

// ── Funciones disponibles para otros archivos ──────────────────────────────



if (!function_exists("ConsultarCarrito")) {
    function ConsultarCarrito()
    {
        $idUsuario = (int)$_SESSION["Consecutivo"];
        return ConsultarCarritoModel($idUsuario);
    }
}

if (!function_exists("ActualizarResumenCarrito")) {
    function ActualizarResumenCarrito()
    {
        $idUsuario = (int)$_SESSION["Consecutivo"];
        $result = ConsultarResumenCarritoModel($idUsuario);
        $_SESSION["TotalCantidad"] = $result["TotalCantidad"] ?? 0;
        $_SESSION["TotalPago"]     = $result["TotalPago"]     ?? 0;
    }
}

// ── Manejo de POST ─────────────────────────────────────────────────────────

if (isset($_POST["btnAgregarProductoCarrito"])) {
    $idProducto = (int)$_POST["IdProducto"];
    $idUsuario  = (int)$_SESSION["Consecutivo"];
    $cantidad   = (int)$_POST["Cantidad"];

    $result = AgregarProductoCarritoModel($idUsuario, $idProducto, $cantidad);

    if ($result) {
        ActualizarResumenCarrito();
        echo json_encode("Producto agregado al carrito correctamente");
    } else {
        echo json_encode("Error al agregar el producto al carrito");
    }
    exit;
}

if (isset($_POST["btnPagar"])) {
    $idUsuario = (int)$_SESSION["Consecutivo"];

    $result = PagarCarritoModel($idUsuario);

    if ($result) {
        ActualizarResumenCarrito();
        $_SESSION["MensajeExito"] = "¡Compra realizada con éxito! Pronto recibirás más información.";
        header("Location: /Proyecto_Cliente-Servidor_Grupo05/Views/vFacturas/vMisFacturas.php");
        exit;
    } else {
        $_SESSION["Mensaje"] = "El carrito no fue procesado correctamente";
        header("Location: /Proyecto_Cliente-Servidor_Grupo05/Views/vCarrito/carrito.php");
        exit;
    }
}

if (isset($_POST["btnRemoverProductoCarrito"])) {
    $idItem    = (int)$_POST["IdItem"];
    $idUsuario = (int)$_SESSION["Consecutivo"];

    $result = RemoverProductoCarritoModel($idItem);

    if ($result) {
        ActualizarResumenCarrito();
        header("Location: /Proyecto_Cliente-Servidor_Grupo05/Views/vCarrito/carrito.php");
        exit;
    } else {
        $_SESSION["Mensaje"] = "El producto no fue removido correctamente";
        header("Location: /Proyecto_Cliente-Servidor_Grupo05/Views/vCarrito/carrito.php");
        exit;
    }
}

if (isset($_POST["btnVaciarCarrito"])) {
    $idUsuario = (int)$_SESSION["Consecutivo"];

    $result = VaciarCarritoCompletoModel($idUsuario);

    if ($result) {
        ActualizarResumenCarrito();
        header("Location: /Proyecto_Cliente-Servidor_Grupo05/Views/vCarrito/carrito.php");
        exit;
    } else {
        $_SESSION["Mensaje"] = "No se pudo vaciar el carrito";
        header("Location: /Proyecto_Cliente-Servidor_Grupo05/Views/vCarrito/carrito.php");
        exit;
    }
}