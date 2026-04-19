<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Views/layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Controllers/cCarrito.php";

if (!isset($_SESSION["Consecutivo"])) {
    header("Location: /Proyecto_Cliente-Servidor_Grupo05/Views/vSesion/sesion.php");
    exit;
}

$datosCarrito = ConsultarCarrito();
?>

<!DOCTYPE html>
<html lang="es">

<?php MostrarHead(); ?>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body class="animsition">

    <?php MostrarHeader(); ?>

    <div class="container mt-5 mb-5">
        <h2 style="font-size:2rem; font-weight:700; margin-bottom:8px;">Mi Carrito</h2>

        <?php if (isset($_SESSION["Mensaje"])): ?>
            <div class="alert alert-danger text-center">
                <?php echo $_SESSION["Mensaje"]; unset($_SESSION["Mensaje"]); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION["MensajeExito"])): ?>
            <div class="alert alert-success text-center">
                <?php echo $_SESSION["MensajeExito"]; unset($_SESSION["MensajeExito"]); ?>
            </div>
        <?php endif; ?>

        <?php if (empty($datosCarrito)): ?>

            <!-- ===== CARRITO VACÍO ===== -->
            <div style="text-align:center; padding:80px 20px;">

                <!-- Ícono del carrito -->
                <div style="margin-bottom:24px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120"
                         fill="none" viewBox="0 0 24 24" stroke="#ccc" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 6h13M7 13L5.4 5M10 21a1 1 0 100-2 1 1 0 000 2zm7 0a1 1 0 100-2 1 1 0 000 2z"/>
                    </svg>
                </div>

                <h3 style="font-size:1.8rem; font-weight:700; color:#333; margin-bottom:10px;">
                    Tu carrito está vacío
                </h3>

                <p style="font-size:1.1rem; color:#888; margin-bottom:36px; max-width:400px; margin-left:auto; margin-right:auto;">
                    Parece que todavía no agregaste ningún producto. ¡Explorá nuestro catálogo y encontrá algo que te guste!
                </p>

                <a href="/Proyecto_Cliente-Servidor_Grupo05/Views/vInicio/Inicio.php"
                   style="display:inline-block; background:#222; color:#fff; font-size:1.1rem;
                          font-weight:600; padding:16px 48px; border-radius:8px;
                          text-decoration:none; transition:background 0.2s;"
                   onmouseover="this.style.background='#444'"
                   onmouseout="this.style.background='#222'">
                    Ver productos
                </a>

            </div>

        <?php else: ?>

            <div class="table-responsive">
                <table class="table table-bordered align-middle" style="font-size:1rem;">
                    <thead class="table-dark">
                        <tr>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Fecha agregado</th>
                            <th>Cantidad</th>
                            <th>Precio unitario (₡)</th>
                            <th>Subtotal (₡)</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datosCarrito as $item): ?>
                        <tr>
                            <td>
                                <?php if (!empty($item["IMAGEN"])): ?>
                                    <img src="<?php echo htmlspecialchars($item["IMAGEN"]); ?>"
                                         alt="<?php echo htmlspecialchars($item["NOMBRE"]); ?>"
                                         width="70">
                                <?php else: ?>
                                    <span class="text-muted">—</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($item["NOMBRE"]); ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($item["FECHA_CREACION"])); ?></td>
                            <td><?php echo number_format($item["CANTIDAD"], 0); ?></td>
                            <td>₡<?php echo number_format($item["PRECIO"], 2); ?></td>
                            <td>₡<?php echo number_format($item["TOTAL"], 2); ?></td>
                            <td>
                                <form id="formEliminar_<?php echo $item["ID_ITEM"]; ?>" action="" method="POST">
                                    <input type="hidden" name="IdItem" value="<?php echo $item["ID_ITEM"]; ?>">
                                    <input type="hidden" name="btnRemoverProductoCarrito" value="1">
                                </form>
                                <button type="button"
                                        onclick="confirmarEliminar(<?php echo $item['ID_ITEM']; ?>, '<?php echo htmlspecialchars($item['NOMBRE']); ?>')"
                                        class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Eliminar
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Formularios ocultos -->
            <form id="formVaciar" action="" method="POST">
                <input type="hidden" name="btnVaciarCarrito" value="1">
            </form>
            <form id="formPagar" action="" method="POST">
                <input type="hidden" name="btnPagar" value="1">
            </form>

            <?php if ($_SESSION["TotalPago"] > 0): ?>
            <div class="d-flex justify-content-between align-items-start mt-5 flex-wrap gap-3">

                <div>
                    <button type="button" onclick="confirmarVaciar()"
                            style="padding:10px 24px; font-size:1rem; background:#dc3545; color:#fff;
                                   border:none; border-radius:8px; cursor:pointer;">
                        <i class="fa fa-trash"></i> Vaciar carrito
                    </button>
                </div>

                <div style="width:420px; background:#fff; border-radius:12px;
                            box-shadow:0 4px 18px rgba(0,0,0,0.13); padding:32px;">
                    <h4 style="font-size:1.4rem; font-weight:700; margin-bottom:20px;">Resumen del pedido</h4>

                    <div style="display:flex; justify-content:space-between; font-size:1.15rem; margin-bottom:12px;">
                        <span style="color:#666;">Artículos:</span>
                        <strong><?php echo $_SESSION["TotalCantidad"]; ?></strong>
                    </div>

                    <hr style="border-top:2px solid #eee; margin:16px 0;">

                    <div style="display:flex; justify-content:space-between; font-size:1.5rem; font-weight:700; margin-bottom:28px;">
                        <span>Total:</span>
                        <span style="color:#28a745;">₡<?php echo number_format($_SESSION["TotalPago"], 2); ?></span>
                    </div>

                    <button type="button" onclick="confirmarPago()"
                            style="width:100%; padding:16px; font-size:1.2rem; font-weight:600;
                                   background:#28a745; color:#fff; border:none; border-radius:8px;
                                   cursor:pointer; transition:background 0.2s;"
                            onmouseover="this.style.background='#218838'"
                            onmouseout="this.style.background='#28a745'">
                        ✓ &nbsp;Proceder al Pago
                    </button>
                </div>

            </div>
            <?php endif; ?>

        <?php endif; ?>
    </div>

    <?php MostrarFooter(); ?>

    <script>
        function confirmarEliminar(idItem, nombreProducto) {
            Swal.fire({
                title: '¿Eliminar producto?',
                html: `¿Querés quitar <strong>${nombreProducto}</strong> del carrito?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formEliminar_' + idItem).submit();
                }
            });
        }

        function confirmarVaciar() {
            Swal.fire({
                title: '¿Vaciar carrito?',
                text: 'Se eliminarán todos los productos del carrito.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, vaciar todo',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formVaciar').submit();
                }
            });
        }

        function confirmarPago() {
            Swal.fire({
                title: '¿Confirmar compra?',
                html: `Total a pagar: <strong style="color:#28a745;">₡<?php echo number_format($_SESSION["TotalPago"], 2); ?></strong>`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, pagar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formPagar').submit();
                }
            });
        }
    </script>

</body>
</html>