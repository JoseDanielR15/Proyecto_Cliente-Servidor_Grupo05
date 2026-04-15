<?php
include_once "../layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Controllers/cProductos.php";

$productos = ConsultarProductosController();
?>

<!DOCTYPE html>
<html lang="es">

<?php MostrarHead(); ?>

<body class="animsition">

    <?php MostrarHeader(); ?>

    <div class="container mt-5">

        <h2 class="mb-4">Lista de Productos</h2>

        <a href="agregarProducto.php" class="btn btn-success mb-3">
            Agregar Producto
        </a>

        <?php if (isset($_GET["mensaje"])) { ?>

            <?php if ($_GET["mensaje"] == "eliminado") { ?>
                <div class="alert alert-success">
                    Producto eliminado correctamente
                </div>
            <?php } elseif ($_GET["mensaje"] == "registrado") { ?>
                <div class="alert alert-success">
                    Producto registrado correctamente
                </div>
            <?php } elseif ($_GET["mensaje"] == "editado") { ?>
                <div class="alert alert-success">
                    Producto actualizado correctamente
                </div>
            <?php } ?>

        <?php } ?>

        <table id="tProductos" class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($productos)) { ?>
                    <?php foreach ($productos as $item) { ?>
                        <tr>
                            <td><?= $item["ID_PRODUCTO"] ?></td>
                            <td><?= $item["NOMBRE"] ?></td>
                            <td>₡<?= number_format($item["PRECIO"], 2, ',', '.') ?></td>
                            <td><?= $item["CANTIDAD"] ?></td>

                            <td>
                                <a href="editarProducto.php?id=<?= $item["ID_PRODUCTO"] ?>"
                                    class="btn btn-warning btn-sm">
                                    Editar
                                </a>

                                <a href="#"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirmarEliminacion(<?= $item['ID_PRODUCTO'] ?>, '<?= htmlspecialchars($item['NOMBRE']) ?>');">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="5">No hay productos registrados</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

    <?php MostrarFooter(); ?>