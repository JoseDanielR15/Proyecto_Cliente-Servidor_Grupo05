<?php
include_once "../layout.php";
include_once "../../Controllers/cSeguridad.php";

$datosUsuario = ConsultarUsuario();
?>

<!DOCTYPE html>
<html lang="es">

<?php MostrarHead(); ?>

<body class="animsition">

    <?php MostrarHeader(); ?>

    <div class="container mt-5">
        <h2>Cambiar Perfil</h2>

        <?php if (!empty($_SESSION["Mensaje"])): ?>
            <div class="alert alert-success" role="alert" style="margin-top: 15px; margin-bottom: 15px;">
                <?php
                echo htmlspecialchars($_SESSION["Mensaje"]);
                unset($_SESSION["Mensaje"]);
                ?>
            </div>
        <?php endif; ?>

        <form action="../../Controllers/cSeguridad.php" method="POST" id="formCambiarPerfil" novalidate>
            <div class="mb-3">
                <label for="Identificacion">Identificación</label>
                <input type="text" class="form-control" id="Identificacion" name="Identificacion"
                    value="<?= htmlspecialchars($datosUsuario["Identificacion"] ?? "") ?>" required>
            </div>

            <div class="mb-3">
                <label for="Nombre">Nombre</label>
                <input type="text" class="form-control" id="Nombre" name="Nombre"
                    value="<?= htmlspecialchars($datosUsuario["Nombre"] ?? "") ?>" required>
            </div>

            <div class="mb-3">
                <label for="CorreoElectronico">Correo Electrónico</label>
                <input type="email" class="form-control" id="CorreoElectronico" name="CorreoElectronico"
                    value="<?= htmlspecialchars($datosUsuario["CorreoElectronico"] ?? "") ?>" required>
            </div>

            <button type="submit" name="btnCambiarPerfil" class="btn btn-primary">
                Actualizar perfil
            </button>

            <a href="../vInicio/Inicio.php" class="btn btn-secondary ms-2">
                Volver al inicio
            </a>
        </form>
    </div>

    <?php MostrarFooter(); ?>

</body>

</html>
