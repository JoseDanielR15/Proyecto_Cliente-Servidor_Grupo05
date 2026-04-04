<?php
include_once "../layout.php";
include_once "../../Controllers/cSeguridad.php";
?>

<!DOCTYPE html>
<html lang="es">

<?php MostrarHead(); ?>

<body class="animsition">

    <?php MostrarHeader(); ?>

    <div class="container mt-5">
        <h2>Cambiar Contraseña</h2>

        <?php if (!empty($_SESSION["Mensaje"])): ?>
            <div class="alert alert-danger" role="alert" style="margin-top: 15px; margin-bottom: 15px;">
                <?php
                echo htmlspecialchars($_SESSION["Mensaje"]);
                unset($_SESSION["Mensaje"]);
                ?>
            </div>
        <?php endif; ?>

        <form action="../../Controllers/cSeguridad.php" method="POST" id="formCambiarAcceso" novalidate>
            <div class="mb-3">
                <label for="NuevaContrasenna">Nueva Contraseña</label>
                <input type="password" class="form-control" id="NuevaContrasenna" name="NuevaContrasenna" required>
            </div>

            <div class="mb-3">
                <label for="ConfirmarContrasenna">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="ConfirmarContrasenna" name="ConfirmarContrasenna" required>
            </div>

            <button type="submit" name="btnCambiarAcceso" class="btn btn-primary">
                Cambiar contraseña
            </button>

            <a href="../vInicio/Inicio.php" class="btn btn-secondary ms-2">
                Volver al inicio
            </a>
        </form>
    </div>

    <?php MostrarFooter(); ?>

</body>

</html>
