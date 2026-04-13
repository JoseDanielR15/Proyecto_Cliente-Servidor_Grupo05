<?php
include_once "../layout.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Inicializar carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$carrito = $_SESSION['carrito'];
?>

<!DOCTYPE html>
<html lang="es">

<?php MostrarHead(); ?>

<body class="animsition">

    <?php MostrarHeader(); ?>

    <div class="container mt-5">
        <h1 class="mb-4">Carrito de Compras</h1>

        <?php if (empty($carrito)): ?>
            <p class="stext-102">Tu carrito está vacío.</p>
        <?php else: ?>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0;
                    foreach ($carrito as $item): 
                        $subtotal = $item['precio'] * $item['cantidad'];
                        $total += $subtotal;
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['nombre']); ?></td>
                        <td><?php echo $item['cantidad']; ?></td>
                        <td><?php echo number_format($item['precio'], 2); ?> ₡</td>
                        <td><?php echo number_format($subtotal, 2); ?> ₡</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h4>Total: <?php echo number_format($total, 2); ?> ₡</h4>
            <a href="checkout.php" class="btn btn-success">Finalizar compra</a>
        <?php endif; ?>
    </div>

    <?php MostrarFooter(); ?>