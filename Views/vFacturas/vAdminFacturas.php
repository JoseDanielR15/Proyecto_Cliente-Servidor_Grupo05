<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Views/layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Controllers/cFacturas.php";

// Solo admin puede acceder
if ($_SESSION["ROL"] !== "Admin") {
    header("Location: /Proyecto_Cliente-Servidor_Grupo05/Views/vInicio/Inicio.php");
    exit;
}

$facturas = ConsultarTodasFacturas();

// Estados disponibles para el dropdown
$estados = [
    1 => "Pendiente",
    2 => "Pagado",
    3 => "Enviado",
    4 => "Entregado",
    5 => "Cancelado"
];
?>

<!DOCTYPE html>
<html lang="es">

<?php MostrarHead(); ?>

<body class="animsition">

    <?php MostrarHeader(); ?>

    <div class="container mt-5 mb-5">
        <h2 style="font-size:2rem; font-weight:700; margin-bottom:8px;">Gestión de Facturas</h2>
        <p style="color:#666; font-size:1.05rem; margin-bottom:30px;">
            Todas las órdenes del sistema
        </p>

        <?php if (isset($_SESSION["MensajeExito"])): ?>
            <div class="alert alert-success text-center">
                <?php echo $_SESSION["MensajeExito"]; unset($_SESSION["MensajeExito"]); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION["Mensaje"])): ?>
            <div class="alert alert-danger text-center">
                <?php echo $_SESSION["Mensaje"]; unset($_SESSION["Mensaje"]); ?>
            </div>
        <?php endif; ?>

        <?php if (empty($facturas)): ?>
            <div class="text-center py-5">
                <p style="font-size:1.2rem; color:#666;">No hay facturas registradas en el sistema.</p>
            </div>
        <?php else: ?>
            <?php foreach ($facturas as $factura): ?>

            <?php
                $estadoBadge = [
                    "Pendiente"  => "warning",
                    "Pagado"     => "info",
                    "Enviado"    => "primary",
                    "Entregado"  => "success",
                    "Cancelado"  => "danger"
                ];
                $badge   = $estadoBadge[$factura["ESTADO"]] ?? "secondary";
                $detalle = ConsultarDetalleFactura($factura["ID_FACTURA"]);
            ?>

            <div style="background:#fff; border-radius:12px; box-shadow:0 2px 12px rgba(0,0,0,0.10);
                        margin-bottom:30px; overflow:hidden;">

                <!-- Encabezado de la factura -->
                <div style="background:#f8f9fa; padding:18px 28px; border-bottom:1px solid #e9ecef;">
                    <div style="display:flex; justify-content:space-between; align-items:flex-start;
                                flex-wrap:wrap; gap:12px;">

                        <!-- Info del cliente y fecha -->
                        <div>
                            <div style="margin-bottom:4px;">
                                <span style="font-size:0.95rem; color:#666;">Orden #</span>
                                <strong style="font-size:1.1rem;"><?php echo $factura["ID_FACTURA"]; ?></strong>
                                <span style="margin-left:16px; color:#666; font-size:0.95rem;">
                                    <?php echo date('d/m/Y H:i', strtotime($factura["FECHA_CREACION"])); ?>
                                </span>
                            </div>
                            <div style="font-size:1rem;">
                                <i class="fa fa-user" style="color:#888; margin-right:6px;"></i>
                                <strong><?php echo htmlspecialchars($factura["CLIENTE"]); ?></strong>
                                <span style="color:#888; margin-left:8px;">
                                    <?php echo htmlspecialchars($factura["EMAIL"]); ?>
                                </span>
                            </div>
                        </div>

                        <!-- Total y cambio de estado -->
                        <div style="display:flex; align-items:center; gap:16px; flex-wrap:wrap;">
                            <span style="font-size:1.3rem; font-weight:700; color:#28a745;">
                                ₡<?php echo number_format($factura["TOTAL"], 2); ?>
                            </span>

                            <span class="badge bg-<?php echo $badge; ?>"
                                  style="font-size:0.95rem; padding:7px 14px;">
                                <?php echo $factura["ESTADO"]; ?>
                            </span>

                            <!-- Formulario para cambiar estado -->
                            <form action="" method="POST"
                                  style="display:flex; align-items:center; gap:8px;">
                                <input type="hidden" name="IdFactura"
                                       value="<?php echo $factura["ID_FACTURA"]; ?>">
                                <select name="IdEstado"
                                        style="padding:6px 10px; border-radius:6px;
                                               border:1px solid #ced4da; font-size:0.95rem;">
                                    <?php foreach ($estados as $idE => $nombreE): ?>
                                        <option value="<?php echo $idE; ?>"
                                            <?php echo ($factura["ESTADO"] === $nombreE) ? "selected" : ""; ?>>
                                            <?php echo $nombreE; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <button name="btnActualizarEstado" type="submit"
                                        style="padding:6px 14px; background:#343a40; color:#fff;
                                               border:none; border-radius:6px; font-size:0.95rem;
                                               cursor:pointer;">
                                    Actualizar
                                </button>
                            </form>
                        </div>
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