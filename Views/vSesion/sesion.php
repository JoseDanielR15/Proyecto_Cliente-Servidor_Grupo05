<?php
include_once "../layout.php";
include_once "../../Controllers/HomeController.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php MostrarHeader(); ?>

<body class="animsition">

    <style>
        .full-center {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.2);
        }
    </style>

    <div style="text-align:center; margin-bottom:20px;">
        <img src="/InfinityTech/assets/images/infinitytech.png"
            alt="InfinityTech"
            style="width:130px;">
    </div>

    <div class="container full-center">

        <div class="login-card">

            <h3 class="text-center mb-4">
                InfinityTech
            </h3>

            <h5 class="text-center mb-4">
                Iniciar Sesión
            </h5>

            <form action="../../Controllers/HomeController.php" method="POST">

                <div class="form-group mb-3">
                    <label>Correo Electrónico</label>
                    <input type="email" name="correo" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Iniciar Sesión
                </button>

                <div class="text-center mt-3">

                    ¿No tienes cuenta?

                    <a href="../vRegistro/registro.php">
                        Regístrate aquí
                    </a>

                </div>

                <div class="text-center mt-2">

                    ¿Quieres saltarte este paso?

                    <a href="../vInicio/Inicio.php">
                        Ir al Inicio
                    </a>

                </div>

            </form>

        </div>

    </div>

    <?php MostrarFooter(); ?>

</body>

</html>