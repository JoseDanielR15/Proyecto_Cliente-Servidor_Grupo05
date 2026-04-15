<?php
include_once "../layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Controllers/cProductos.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $producto = ObtenerProductoController($id);
}

if (isset($_POST["btnActualizar"])) {

    $id = $_POST["IdProducto"];
    $nombre = $_POST["Nombre"];
    $precio = $_POST["Precio"];
    $cantidad = $_POST["Cantidad"];

    $resultado = ActualizarProductoController($id, $nombre, $precio, $cantidad);

    if ($resultado) {
        header("Location: consultarProductos.php?mensaje=editado");
        exit;
    } else {
        $mensaje = "Error al actualizar el producto";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<?php MostrarHead(); ?>

<body>

<?php MostrarHeader(); ?>

<div class="container mt-5">
    <h2>Editar Producto</h2>

    <?php if (isset($mensaje)) { ?>
        <div class="alert alert-danger"><?= $mensaje ?></div>
    <?php } ?>

    <form method="POST" id="formProducto" onsubmit="return confirmarActualizacionProducto(event);">

        <input type="hidden" name="IdProducto" value="<?= $producto["IdProducto"] ?>">

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" id="Nombre" name="Nombre" class="form-control" 
                   value="<?= $producto["Nombre"] ?>" required>
        </div>

        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" id="Precio" name="Precio" class="form-control" 
                   value="<?= $producto["Precio"] ?>" required>
        </div>

        <div class="mb-3">
            <label>Cantidad</label>
            <input type="number" id="Cantidad" name="Cantidad" class="form-control" 
                   value="<?= $producto["Cantidad"] ?>" required>
        </div>

        <button type="submit" name="btnActualizar" class="btn btn-primary">
            Actualizar
        </button>

        <a href="consultarProductos.php" class="btn btn-secondary">
            Volver
        </a>

    </form>
    
    <script>
        function confirmarActualizacionProducto(event) {
            event.preventDefault();
            
            const nombre = document.getElementById('Nombre').value;
            const precio = document.getElementById('Precio').value;
            const cantidad = document.getElementById('Cantidad').value;
            
            Swal.fire({
                title: '¿Actualizar producto?',
                html: `<strong>${nombre}</strong><br>Precio: ₡${parseFloat(precio).toLocaleString('es-CR', {minimumFractionDigits: 2})}<br>Cantidad: ${cantidad} unidades`,
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#007bff',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, actualizar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formProducto').submit();
                }
            });
        }
    </script>
</div>

<?php MostrarFooter(); ?>