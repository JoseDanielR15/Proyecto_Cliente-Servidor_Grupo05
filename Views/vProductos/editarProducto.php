<?php
include_once "../layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Controllers/cProductos.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $producto = ObtenerProductoController($id);
}

if (isset($_POST["btnActualizar"])) {

    $id          = $_POST["IdProducto"];
    $nombre      = $_POST["Nombre"];
    $descripcion = $_POST["Descripcion"];
    $precio      = $_POST["Precio"];
    $cantidad    = $_POST["Cantidad"];

    $imagen = '';
    if (isset($_FILES["Imagen"]) && $_FILES["Imagen"]["error"] == 0) {
        $targetDir = "../assets/images/productos/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0755, true);
        $fileName   = uniqid() . "_" . basename($_FILES["Imagen"]["name"]);
        $targetFile = $targetDir . $fileName;
        if (move_uploaded_file($_FILES["Imagen"]["tmp_name"], $targetFile)) {
            $imagen = "Views/assets/images/productos/" . $fileName;
        }
    }

    $resultado = ActualizarProductoController($id, $nombre, $precio, $cantidad, $descripcion, $imagen);

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

    <form method="POST" id="formProducto" enctype="multipart/form-data">

        <!-- Hidden que garantiza que btnActualizar llegue al POST aunque SweetAlert haga submit() -->
        <input type="hidden" name="btnActualizar" value="1">
        <input type="hidden" name="IdProducto" value="<?= $producto["ID_PRODUCTO"] ?>">

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" id="Nombre" name="Nombre" class="form-control"
                   value="<?= htmlspecialchars($producto["NOMBRE"]) ?>" required>
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea id="Descripcion" name="Descripcion" class="form-control"
                      rows="3"><?= htmlspecialchars($producto["DESCRIPCION"]) ?></textarea>
        </div>

        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" id="Precio" name="Precio" class="form-control"
                   value="<?= $producto["PRECIO"] ?>" required>
        </div>

        <div class="mb-3">
            <label>Cantidad</label>
            <input type="number" id="Cantidad" name="Cantidad" class="form-control"
                   value="<?= $producto["CANTIDAD"] ?>" required>
        </div>

        <div class="mb-3">
            <?php if (!empty($producto["IMAGEN"])): ?>
                <label>Imagen actual</label><br>
                <img src="<?= htmlspecialchars($producto["IMAGEN"]) ?>" width="100" class="mb-2"><br>
            <?php endif; ?>
            <label>Cambiar imagen (opcional)</label>
            <input type="file" id="Imagen" name="Imagen" class="form-control" accept="image/*">
        </div>

        <button type="button" onclick="confirmarActualizacionProducto()" class="btn btn-primary">
            Actualizar
        </button>

        <a href="consultarProductos.php" class="btn btn-secondary">
            Volver
        </a>

    </form>

    <script>
        function confirmarActualizacionProducto() {
            const nombre   = document.getElementById('Nombre').value;
            const precio   = document.getElementById('Precio').value;
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