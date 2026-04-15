<?php
include_once "../layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Controllers/cProductos.php";

if (isset($_POST["btnRegistrar"])) {

    $nombre = $_POST["Nombre"];
    $descripcion = $_POST["Descripcion"];
    $precio = $_POST["Precio"];
    $cantidad = $_POST["Cantidad"];

    $imagenPath = null;
    if (isset($_FILES["Imagen"]) && $_FILES["Imagen"]["error"] == 0) {
        $targetDir = "../assets/images/productos/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0755, true);
        $fileName = uniqid() . "_" . basename($_FILES["Imagen"]["name"]);
        $targetFile = $targetDir . $fileName;
        if (move_uploaded_file($_FILES["Imagen"]["tmp_name"], $targetFile)) {
            $imagenPath = "Views/assets/images/productos/" . $fileName;
        }
    }

    $resultado = InsertarProductoController($nombre, $descripcion, $precio, $cantidad, $imagenPath);

    if ($resultado) {
        header("Location: consultarProductos.php?mensaje=registrado");
        exit;
    } else {
        $mensaje = "Error al registrar el producto";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<?php MostrarHead(); ?>

<body>

<?php MostrarHeader(); ?>

<div class="container mt-5">
    <h2>Agregar Producto</h2>

    <?php if (isset($mensaje)) { ?>
        <div class="alert alert-danger"><?= $mensaje ?></div>
    <?php } ?>

    <form method="POST" id="formProducto" enctype="multipart/form-data" onsubmit="return confirmarRegistroProducto(event);">

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" id="Nombre" name="Nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea id="Descripcion" name="Descripcion" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" id="Precio" name="Precio" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Cantidad</label>
            <input type="number" id="Cantidad" name="Cantidad" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Imagen</label>
            <input type="file" id="Imagen" name="Imagen" class="form-control" accept="image/*">
        </div>

        <button type="submit" name="btnRegistrar" class="btn btn-primary">
            Registrar
        </button>

        <a href="consultarProductos.php" class="btn btn-secondary">
            Volver
        </a>

    </form>
    
    <script>
        function confirmarRegistroProducto(event) {
            event.preventDefault();
            
            const nombre = document.getElementById('Nombre').value;
            const precio = document.getElementById('Precio').value;
            const cantidad = document.getElementById('Cantidad').value;
            
            Swal.fire({
                title: '¿Agregar producto?',
                html: `<strong>${nombre}</strong><br>Precio: ₡${parseFloat(precio).toLocaleString('es-CR', {minimumFractionDigits: 2})}<br>Cantidad: ${cantidad} unidades`,
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, agregar',
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