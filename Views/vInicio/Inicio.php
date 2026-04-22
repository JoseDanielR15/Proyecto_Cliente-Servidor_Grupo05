<?php
include_once "../layout.php";
include_once "../../Controllers/cProductos.php";
include_once "../../Controllers/cCarrito.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["Consecutivo"])) {
    ActualizarResumenCarrito();
}

$productos = ConsultarProductosController();
?>

<!DOCTYPE html>
<html lang="es">

<?php MostrarHead(); ?>

<body class="animsition">

    <?php MostrarHeader(); ?>
    <!-- El sidebar del carrito y el search modal ya vienen del layout -->

    <!-- ================= SLIDER ================= -->
    <div class="container d-flex justify-content-center my-4">
        <div id="carouselExampleIndicators" class="carousel slide w-75" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <img src="../assets/images/bannerLogitech.png" class="d-block w-100" alt="Banner Logitech">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="../assets/images/bannerSony.png" class="d-block w-100" alt="Banner Sony">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="../assets/images/bannerNvidia.png" class="d-block w-100" alt="Banner Nvidia">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="../assets/images/combosPcs.png" class="d-block w-100" alt="Combos PCs">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>

    <!-- ================= PRODUCTOS ================= -->
    <div class="sec-product bg0 p-t-100 p-b-50">
        <div class="container">
            <div class="p-b-32">
                <h3 class="ltext-105 cl5 txt-left p-b-20">Productos Destacados</h3>
                <p class="stext-102 cl3">Descubre nuestra selección de productos de tecnología</p>
            </div>

            <div class="row">
                <?php
                if (!empty($productos)) {
                    foreach ($productos as $producto) {
                        $idProducto = $producto['ID_PRODUCTO'];
                        $stock      = (int)$producto['CANTIDAD'];
                        $agotado    = $stock <= 0;

                        echo '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">';
                        echo    '<div class="block2" style="position:relative;">';

                        if ($agotado) {
                            echo '<div style="position:absolute; top:10px; left:10px; z-index:10;
                                             background:#dc3545; color:#fff; font-size:0.8rem;
                                             font-weight:700; padding:4px 10px; border-radius:20px;">
                                    Agotado
                                  </div>';
                        }

                        echo '<div class="block2-pic hov-img0" style="height:250px; display:flex; align-items:center; justify-content:center; background-color:#f8f9fa; ' . ($agotado ? 'opacity:0.5;' : '') . '">';

                        if (!empty($producto['IMAGEN'])) {
                            $rutaImagen = "/Proyecto_Cliente-Servidor_Grupo05/" . htmlspecialchars($producto['IMAGEN']);
                            echo '<img src="' . $rutaImagen . '" alt="' . htmlspecialchars($producto['NOMBRE']) . '" class="img-fit">';
                        } else {
                            echo '<img src="../assets/images/placeholder.png" alt="Sin imagen" class="img-fit">';
                        }

                        echo '</div>';
                        echo    '<div class="block2-txt flex-w flex-t p-t-14">';
                        echo        '<div class="block2-txt-child1 flex-col-l">';
                        echo            '<a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2">' . htmlspecialchars($producto['NOMBRE']) . '</a>';
                        echo            '<span class="stext-105 cl3">₡' . number_format($producto['PRECIO'], 2, ',', '.') . '</span>';

                        if ($agotado) {
                            echo '<span style="color:#dc3545; font-size:0.85rem; font-weight:600;">Sin stock disponible</span>';
                        } else {
                            echo '<span class="stext-102 cl3">Stock: ' . $stock . '</span>';
                        }

                        echo        '</div>';
                        echo        '<div class="block2-txt-child2 flex-r p-t-3">';
                        echo            '<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">';
                        echo                '<img class="icon-heart1" src="../assets/images/icons/heart.png" alt="">';
                        echo                '<img class="icon-heart2" src="../assets/images/icons/heart-filled.png" alt="">';
                        echo            '</a>';
                        echo        '</div>';
                        echo    '</div>';

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
                            echo '<div class="p-t-10">';
                            echo    '<a href="/Proyecto_Cliente-Servidor_Grupo05/Views/vSesion/sesion.php" class="btn btn-outline-dark btn-sm w-100">Inicia sesión para comprar</a>';
                            echo '</div>';
                        }

                        echo    '</div>'; // .block2
                        echo '</div>'; // .col
                    }
                } else {
                    echo '<div class="col-12 text-center">';
                    echo    '<p class="stext-102 cl3">No hay productos disponibles en este momento.</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- ================= BANNERS ================= -->
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <div class="block1 wrap-pic-w">
                        <img src='../assets/images/Monitores.jpg' alt="IMG-BANNER">
                        <a href="/Proyecto_Cliente-Servidor_Grupo05/Views/vProductos/vProductosXCategoria.php?id_cat=4"
                           class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">Monitores</span>
                            </div>
                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">Ver Monitores</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <div class="block1 wrap-pic-w" style='width:88%;'>
                        <img src='../assets/images/Ofertas.jpg' alt="IMG-BANNER">
                        <a href="/Proyecto_Cliente-Servidor_Grupo05/Views/vProductos/vProductosXCategoria.php?id_cat=1"
                           class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">Ver Ofertas</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <div class="block1 wrap-pic-w">
                        <img src='../assets/images/Mouse.jpg' alt="IMG-BANNER">
                        <a href="/Proyecto_Cliente-Servidor_Grupo05/Views/vProductos/vProductosXCategoria.php?id_cat=3"
                           class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">Perifericos</span>
                            </div>
                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">Ver</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php MostrarFooter(); ?>

    <!-- ================= JS CARRITO ================= -->
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