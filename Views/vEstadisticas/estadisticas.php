<?php
include_once "../layout.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Controllers/EstadisticasController.php";

$datos = ConsultarEstadisticas();

// Indexar datos por TITULO
$indicadores = [];
foreach ($datos as $fila) {
    $indicadores[$fila["TITULO"]] = $fila;
}

$productoMasVendido = $indicadores["Producto Más Vendido"] ?? null;
$clienteFrecuente = $indicadores["Cliente Frecuente"] ?? null;
$totalRecaudado = $indicadores["Total Recaudado"] ?? null;
?>

<!DOCTYPE html>
<html lang="es">
<?php MostrarHead(); ?>
<link rel="stylesheet" type="text/css" href="../assets/css/estadisticas.css">
<body class="animsition">

<?php MostrarHeader(); ?>

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../assets/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Dashboard Administrativo
    </h2>
    <p class="stext-101 cl0 txt-center">
        Estadísticas y métricas clave de InfinityTech
    </p>
</section>

<!-- Content page -->
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="stats-intro">
            <h3>Panel de Estadísticas de Ventas</h3>
            <p>Información clave sobre el rendimiento de InfinityTech</p>
        </div>
        <div class="row g-4">
            <!-- CARD 1: Producto Más Vendido -->
            <div class="col-xl-4 col-md-6">
                <div class="kpi-card card scheme-gold">
                    <div class="card-body text-center">
                        <div class="icon-wrap">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h5 class="card-title">Producto Más Vendido</h5>
                        <div class="kpi-value"><?php echo $productoMasVendido ? number_format($productoMasVendido["VALOR"], 0, ",", ".") : '0'; ?></div>
                        <p class="text-muted small">Unidades vendidas</p>
                        <div class="d-flex align-items-center gap-2 pt-2 border-top">
                            <i class="fas fa-box"></i>
                            <span><?php echo $productoMasVendido ? htmlspecialchars($productoMasVendido["NOMBRE"]) : 'N/A'; ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD 2: Cliente Frecuente -->
            <div class="col-xl-4 col-md-6">
                <div class="kpi-card card scheme-blue">
                    <div class="card-body text-center">
                        <div class="icon-wrap">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h5 class="card-title">Cliente Frecuente</h5>
                        <div class="kpi-value"><?php echo $clienteFrecuente ? number_format($clienteFrecuente["VALOR"], 0, ",", ".") : '0'; ?></div>
                        <p class="text-muted small">Compras realizadas</p>
                        <div class="d-flex align-items-center gap-2 pt-2 border-top">
                            <i class="fas fa-user"></i>
                            <span><?php echo $clienteFrecuente ? htmlspecialchars($clienteFrecuente["NOMBRE"]) : 'N/A'; ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD 3: Total Recaudado -->
            <div class="col-xl-4 col-md-6">
                <div class="kpi-card card scheme-green">
                    <div class="card-body text-center">
                        <div class="icon-wrap">
                            <i class="fas fa-coins"></i>
                        </div>
                        <h5 class="card-title">Total Recaudado</h5>
                        <div class="kpi-value">₡<?php echo $totalRecaudado ? number_format($totalRecaudado["VALOR"], 2, ",", ".") : '0.00'; ?></div>
                        <p class="text-muted small">Monto total en ventas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php MostrarFooter(); ?>

</body>
</html>