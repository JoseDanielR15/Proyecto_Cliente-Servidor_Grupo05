<?php
include_once "../layout.php";
include_once "../../Controllers/cAutenticacion.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php MostrarHead(); ?>

<body class="animsition">

    <div class="auth-wrapper">
        <div class="container d-flex align-items-flex-start justify-content-center"
            style="min-height: auto; padding-top: 30px;">
            <div class="col-lg-5 col-md-6 col-sm-8 col-10">

                <div class="auth-logo">
                    <img src="../assets/images/logoInfinityTech.png"
                        alt="InfinityTech"
                        class="img-fluid"
                        style="width: 100%; height: auto; display: block; margin-bottom: 20px;">
                </div>

                <form action="../../Controllers/cAutenticacion.php" method="POST" id="formRegistro" novalidate>

                    <div class="form-group">
                        <label for="Identificacion">Identificación</label>
                        <input type="text" class="form-control" id="Identificacion" name="Identificacion"
                            onkeyup="ConsultarNombre();" placeholder="Tu número de identificación" required>
                    </div>

                    <div class="form-group">
                        <label for="Nombre">Nombre Completo</label>
                        <input type="text" id="Nombre" name="Nombre" class="form-control" readonly
                            placeholder="Tu nombre">
                    </div>

                    <div class="form-group">
                        <label for="CorreoElectronico">Correo Electrónico</label>
                        <input type="email" class="form-control" id="CorreoElectronico" name="CorreoElectronico"
                            placeholder="tu@email.com" required>
                    </div>

                    <div class="form-group">
                        <label for="Contrasenna">Contraseña</label>
                        <input type="password" class="form-control" id="Contrasenna" name="Contrasenna"
                            placeholder="Crea una contraseña segura" required>
                    </div>

                    <button type="submit" name="btnRegistrar" class="btn btn-success" style="width: 100%; margin-top: 10px;">
                        Crear Cuenta
                    </button>

                    <!-- BOTÓN VOLVER AL LOGIN -->
                    <div class="text-center auth-links" style="margin-top: 15px;">
                        <a href="../vSesion/sesion.php" class="btn btn-outline-secondary btn-sm mb-2"
                            style="width: 100%;">
                            <i class="fa fa-arrow-left mr-1"></i> Volver al inicio de sesión
                        </a>
                    </div>

                </form>

                <!-- Script -->
                <script src="../assets/funciones/registro.js"></script>

                <!-- MENSAJE DE ERROR -->
                <?php if (!empty($_SESSION["Mensaje"])): ?>
                    <div class="alert alert-danger" role="alert" style="margin-top: 15px; margin-bottom: 15px;">
                        <?php
                        echo htmlspecialchars($_SESSION["Mensaje"]);
                        unset($_SESSION["Mensaje"]);
                        ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <?php MostrarFooter(); ?>

    <?php MostrarJS(); ?>

    <style>
        .auth-links {
            padding-bottom: 70px;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .auth-wrapper {
            flex: 1;
            padding-bottom: 50px;
        }

        footer {
            margin-top: auto;
        }
    </style>

</body>

</html>