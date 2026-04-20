<?php
include_once "../layout.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Controllers/cProductos.php";
?>

<!DOCTYPE html>
<html lang="es">

<?php MostrarHead(); ?>

<body class="animsition">

    <?php MostrarHeader(); ?>

    <div class="container mt-5">

        <?php
            $idCategoria = $_GET['id_cat'] ?? 0;

            $productos = ConsultarProductosPorCategoria($idCategoria);
            echo '<div class="row">';
            foreach ($productos as $producto) {

                $idProducto = $producto['ID_PRODUCTO'];
                $stock      = (int)$producto['CANTIDAD'];
                $agotado    = $stock <= 0;

                echo '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35">';
                echo    '<div class="block2" style="position:relative;">';

                // Badge agotado
                if ($agotado) {
                    echo '<div style="position:absolute; top:10px; left:10px; z-index:10;
                                    background:#dc3545; color:#fff; font-size:0.8rem;
                                    font-weight:700; padding:4px 10px; border-radius:20px;">
                            Agotado
                        </div>';
                }

                echo '<div class="block2-pic hov-img0" style="height:250px; display:flex; align-items:center; justify-content:center; background:#f8f9fa; ' . ($agotado ? 'opacity:0.5;' : '') . '">';

                if (!empty($producto['IMAGEN'])) {
                    $rutaImagen = "/Proyecto_Cliente-Servidor_Grupo05/" . htmlspecialchars($producto['IMAGEN']);
                    echo '<img src="' . $rutaImagen . '" class="img-fit">';
                } else {
                    echo '<img src="../assets/images/placeholder.png" class="img-fit">';
                }

                echo '</div>';

                echo '<div class="block2-txt flex-w flex-t p-t-14">';
                echo    '<div class="block2-txt-child1 flex-col-l">';
                echo        '<span class="stext-104 cl4">' . htmlspecialchars($producto['NOMBRE']) . '</span>';
                echo        '<span class="stext-105 cl3">₡' . number_format($producto['PRECIO'], 2, ',', '.') . '</span>';

                if ($agotado) {
                    echo '<span style="color:#dc3545; font-size:0.85rem;">Sin stock</span>';
                } else {
                    echo '<span class="stext-102 cl3">Stock: ' . $stock . '</span>';
                }

                echo    '</div>';
                echo '</div>';

                // Botones
                if (!$agotado) {
                    echo '<div class="d-flex align-items-center gap-2 p-t-10">';
                    echo    '<div class="input-group" style="max-width:120px;">';
                    echo        '<button class="btn btn-outline-secondary btn-sm" onclick="cambiarCantidad(' . $idProducto . ', -1)">−</button>';
                    echo        '<input type="text" id="cantidad_' . $idProducto . '" class="form-control text-center" value="1">';
                    echo        '<button class="btn btn-outline-secondary btn-sm" onclick="cambiarCantidad(' . $idProducto . ', 1)">+</button>';
                    echo    '</div>';
                    echo    '<button class="btn btn-dark btn-sm w-100" onclick="AgregarProductoCarrito(' . $idProducto . ', ' . $stock . ')">Agregar</button>';
                    echo '</div>';
                } else {
                    echo '<button class="btn btn-secondary btn-sm w-100 mt-2" disabled>Sin stock</button>';
                }

                echo '</div>';
                echo '</div>';
            }
            ?>
            </div>

    </div>

<?php MostrarFooter(); ?>