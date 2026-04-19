<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Views/layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Controllers/cFacturas.php";

$facturas = ConsultarFacturasUsuario();
?>

<!DOCTYPE html>
<html lang="es">

<?php MostrarHead(); ?>

<body class="animsition">

    <?php MostrarHeader(); ?>

    <div class="container mt-5 mb-5">
        <h2 style="font-size:2rem; font-weight:700; margin-bottom:8px;">Mis Compras</h2>
        <p style="color:#666; font-size:1.05rem; margin-bottom:30px;">
            Historial de todas tus órdenes
        </p>

        <?php if (isset($_SESSION["MensajeExito"])): ?>
            <div class="alert alert-success text-center">
                <?php echo $_SESSION["MensajeExito"]; unset($_SESSION["MensajeExito"]); ?>
            </div>
        <?php endif; ?>

        <?php if (empty($facturas)): ?>
            <div class="text-center py-5">
                <p style="font-size:1.2rem; color:#666;">No tenés compras registradas aún.</p>
                <a href="/Proyecto_Cliente-Servidor_Grupo05/Views/vInicio/Inicio.php"
                   class="btn btn-dark mt-3" style="font-size:1.1rem; padding:10px 30px;">
                   Ver Productos
                </a>
            </div>
        <?php else: ?>
            <?php foreach ($facturas as $factura): ?>

            <?php
                // Badge de color según el estado
                $estadoBadge = [
                    "Pendiente"  => "warning",
                    "Pagado"     => "info",
                    "Enviado"    => "primary",
                    "Entregado"  => "success",
                    "Cancelado"  => "danger"
                ];
                $badge = $estadoBadge[$factura["ESTADO"]] ?? "secondary";
                $detalle = ConsultarDetalleFactura($factura["ID_FACTURA"]);
            ?>

            <div style="background:#fff; border-radius:12px; box-shadow:0 2px 12px rgba(0,0,0,0.10);
                        margin-bottom:30px; overflow:hidden;">

                <!-- Encabezado de la factura -->
                <div style="background:#f8f9fa; padding:18px 28px; display:flex;
                            justify-content:space-between; align-items:center;
                            border-bottom:1px solid #e9ecef;">
                    <div>
                        <span style="font-size:1rem; color:#666;">Orden #</span>
                        <strong style="font-size:1.1rem;"><?php echo $factura["ID_FACTURA"]; ?></strong>
                        <span style="margin-left:20px; color:#666; font-size:0.95rem;">
                            <?php echo date('d/m/Y H:i', strtotime($factura["FECHA_CREACION"])); ?>
                        </span>
                    </div>
                    <div style="display:flex; align-items:center; gap:20px;">
                        <span class="badge bg-<?php echo $badge; ?>"
                              style="font-size:0.95rem; padding:7px 14px;">
                            <?php echo $factura["ESTADO"]; ?>
                        </span>
                        <span style="font-size:1.3rem; font-weight:700; color:#28a745;">
                            ₡<?php echo number_format($factura["TOTAL"], 2); ?>
                        </span>
                    </div>
                </div>

                <!-- Detalle de productos -->
                <div style="padding:20px 28px;">
                    <table class="table table-borderless align-middle mb-0"
                           style="font-size:1rem;">
                        <thead style="border-bottom:1px solid #eee;">
                            <tr>
                                <th style="color:#666; font-weight:600; width:80px;">Imagen</th>
                                <th style="color:#666; font-weight:600;">Producto</th>
                                <th style="color:#666; font-weight:600; text-align:center;">Cantidad</th>
                                <th style="color:#666; font-weight:600; text-align:right;">Precio unit.</th>
                                <th style="color:#666; font-weight:600; text-align:right;">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detalle as $item): ?>
                            <tr style="border-bottom:1px solid #f0f0f0;">
                                <td>
                                    <?php if (!empty($item["IMAGEN"])): ?>
                                        <img src="<?php echo htmlspecialchars($item["IMAGEN"]); ?>"
                                             alt="<?php echo htmlspecialchars($item["NOMBRE"]); ?>"
                                             style="width:60px; height:60px; object-fit:contain;">
                                    <?php else: ?>
                                        <div style="width:60px; height:60px; background:#f0f0f0;
                                                    border-radius:6px; display:flex; align-items:center;
                                                    justify-content:center; color:#aaa;">
                                            <i class="fa fa-image"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td style="font-weight:500;">
                                    <?php echo htmlspecialchars($item["NOMBRE"]); ?>
                                </td>
                                <td style="text-align:center;">
                                    <?php echo $item["CANTIDAD"]; ?>
                                </td>
                                <td style="text-align:right;">
                                    ₡<?php echo number_format($item["PRECIO_UNITARIO_MOMENTO"], 2); ?>
                                </td>
                                <td style="text-align:right; font-weight:600;">
                                    ₡<?php echo number_format($item["SUBTOTAL"], 2); ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" style="text-align:right; font-size:1.1rem;
                                                        font-weight:700; padding-top:14px;">
                                    Total de la orden:
                                </td>
                                <td style="text-align:right; font-size:1.2rem; font-weight:700;
                                           color:#28a745; padding-top:14px;">
                                    ₡<?php echo number_format($factura["TOTAL"], 2); ?>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?php MostrarFooter(); ?>

</body>
</html>