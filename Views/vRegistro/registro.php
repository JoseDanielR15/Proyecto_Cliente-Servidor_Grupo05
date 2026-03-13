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

    <body class="tech-bg">

        <div class="auth-card">
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
                        Crear Cuenta
                    </h5>

                    <form action="../../Controllers/HomeController.php" method="POST">

                        <div class="form-group mb-3">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Correo Electrónico</label>
                            <input type="email" name="correo" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">
                            Registrarse
                        </button>

                        <div class="text-center mt-3">

                            ¿Ya tienes cuenta?

                            <a href="../vSesion/sesion.php">
                                Inicia sesión aquí
                            </a>

                        </div>

                    </form>

                </div>

            </div>

            <?php MostrarFooter(); ?>

    </body>

</html>