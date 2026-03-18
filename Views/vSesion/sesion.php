<?php
include_once "../layout.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php MostrarHead(); ?>

<body class="animsition">

    <div class="auth-wrapper">
        <div class="container d-flex align-items-flex-start justify-content-center" style="min-height: auto; padding-top: 30px;">
            <div class="col-lg-5 col-md-6 col-sm-8 col-10">
                <div class="auth-logo">
                    <img src="https://i.fbcd.co/products/resized/resized-750-500/e53c5e6b6b694566ebf50ee9e7d5f4f23381e1a7ee5170287d5a88f29e9f78f3.jpg" class="img-fluid" alt="InfinityTech" style="width: 100%; height: auto; display: block; margin-bottom: 20px;">
                </div>

                <div class="login-card">
                    <h3 class="text-center">
                        InfinityTech
                    </h3>

                    <h5 class="text-center">
                        Iniciar Sesión
                    </h5>

                    <form action="../../Controllers/cAutenticacion.php" method="POST" novalidate>

                        <div class="form-group">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="tu@email.com" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Tu contraseña" required>
                        </div>

                        <button type="submit" name="btnIniciarSesion" class="btn btn-primary">
                            <i class="fa fa-sign-in mr-2"></i>Iniciar Sesión
                        </button>



                        <div class="text-center auth-links">
                            <p class="mb-2">¿No tienes cuenta?</p>
                            <a href="../vRegistro/registro.php" class="btn btn-outline-secondary btn-sm mb-2" style="width: 100%;">
                                <i class="fa fa-user-plus mr-1"></i>Regístrate aquí
                            </a>

                            <p class="mt-4 mb-3">¿Quieres saltarte este paso?</p>
                            <a href="../vInicio/Inicio.php" class="btn btn-success btn-lg" style="width: 100%; font-weight: 700; padding: 12px 20px;">
                                <i class="fa fa-arrow-right mr-2"></i>Ir al Inicio
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php MostrarFooter(); ?>

    <style>
        .auth-links {
            padding-bottom: 70px;
        }
    </style>