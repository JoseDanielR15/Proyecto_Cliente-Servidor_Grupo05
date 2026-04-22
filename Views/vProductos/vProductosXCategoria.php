<?php
include_once "../layout.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Controllers/cProductos.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Controllers/cCarrito.php"; // ← AGREGADO

if (session_status() === PHP_SESSION_NONE) { // ← AGREGADO
    session_start();
}

if (isset($_SESSION["Consecutivo"])) { // ← AGREGADO
    ActualizarResumenCarrito();
}
?>

<!DOCTYPE html>
<html lang="es">

<?php MostrarHead(); ?>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body class="animsition">

    <?php MostrarHeader(); ?>

    <div class="container mt-5 mb-5">

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

                // ── Botones ── CORREGIDO: diferencia sesión iniciada / no iniciada / agotado
                if (!$agotado && isset($_SESSION["Consecutivo"])) {
                    echo '<div class="d-flex align-items-center gap-2 p-t-10">';
                    echo    '<div class="input-group" style="max-width:120px;">';
                    echo        '<button class="btn btn-outline-secondary btn-sm" type="button" onclick="cambiarCantidad(' . $idProducto . ', -1)">−</button>';
                    echo        '<input type="text" id="cantidad_' . $idProducto . '" class="form-control form-control-sm text-center" value="1" maxlength="3" onkeypress="return soloNumeros(event)">';
                    echo        '<button class="btn btn-outline-secondary btn-sm" type="button" onclick="cambiarCantidad(' . $idProducto . ', 1)">+</button>';
                    echo    '</div>';
                    echo    '<button class="btn btn-dark btn-sm flex-grow-1" onclick="AgregarProductoCarrito(' . $idProducto . ', ' . $stock . ')">';
                    echo        '<i class="fa fa-shopping-cart"></i> Agregar';
                    echo    '</button>';
                    echo '</div>';
                } elseif ($agotado) {
                    echo '<div class="p-t-10">';
                    echo    '<button class="btn btn-secondary btn-sm w-100" disabled>Sin stock</button>';
                    echo '</div>';
                } else {
                    // Usuario no logueado ← AGREGADO
                    echo '<div class="p-t-10">';
                    echo    '<a href="/Proyecto_Cliente-Servidor_Grupo05/Views/vSesion/sesion.php" class="btn btn-outline-dark btn-sm w-100">Inicia sesión para comprar</a>';
                    echo '</div>';
                }

                echo '</div>'; // .block2
                echo '</div>'; // .col
            }
            ?>
            </div>

    </div>

    <?php MostrarFooter(); ?>

    <!-- ================= JS CARRITO ================= --> <!-- ← AGREGADO -->
    <script>
        function soloNumeros(event) {
            return event.charCode >= 48 && event.charCode <= 57;
        }

        function cambiarCantidad(idProducto, delta) {
            const input = document.getElementById("cantidad_" + idProducto);
            let valor = parseInt(input.value) || 1;
            valor += delta;
            if (valor < 1) valor = 1;
            input.value = valor;
        }

        function AgregarProductoCarrito(idProducto, stockDisponible) {
            const input    = document.getElementById("cantidad_" + idProducto);
            const cantidad = parseInt(input.value) || 1;

            if (cantidad > stockDisponible) {
                Swal.fire('Stock insuficiente', 'La cantidad supera el stock disponible (' + stockDisponible + ' unidades).', 'warning');
                return;
            }

            const formData = new FormData();
            formData.append("IdProducto", idProducto);
            formData.append("Cantidad", cantidad);
            formData.append("btnAgregarProductoCarrito", "1");

            fetch("/Proyecto_Cliente-Servidor_Grupo05/Controllers/cCarrito.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                Swal.fire({
                    title: '¡Listo!',
                    text: data,
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    location.reload();
                });
            })
            .catch(() => {
                Swal.fire('Error', 'No se pudo comunicar con el servidor.', 'error');
            });
        }
    </script>

</body>
</html>