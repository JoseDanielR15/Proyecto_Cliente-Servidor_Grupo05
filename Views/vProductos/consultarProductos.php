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

        <table id="tProductos" class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Miniatura</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($productos)) {
                    foreach ($productos as $item) {
                        $rutaImagen = !empty($item["IMAGEN"]) ? "/Proyecto_Cliente-Servidor_Grupo05/" . $item["IMAGEN"] : "../assets/images/no-image.png";
                ?>
                        <tr>
                            <td><?= $item["ID_PRODUCTO"] ?></td>
                            <td>
                                <img src="<?= $rutaImagen ?>" class="img-producto img-miniatura" alt="Producto">
                            </td>
                            <td><strong><?= htmlspecialchars($item["NOMBRE"]) ?></strong></td>
                            <td>₡<?= number_format($item["PRECIO"], 2, ',', '.') ?></td>
                            <td>
                                <span class="badge <?= $item["CANTIDAD"] > 5 ? 'bg-success' : 'bg-danger' ?>">
                                    <?= $item["CANTIDAD"] ?> uds
                                </span>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>

    </div>

    <?php MostrarFooter(); ?>