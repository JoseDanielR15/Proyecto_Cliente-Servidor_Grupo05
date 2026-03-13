<?php
include_once "../layout.php";
include_once "../../Controllers/HomeController.php";
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
                        Crear Cuenta
                    </h5>

                    <form action="../../Controllers/HomeController.php" method="POST" novalidate>

                        <div class="form-group">
                            <label for="nombre">Nombre Completo</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" required>
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="tu@email.com" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Crea una contraseña segura" required>
                        </div>

                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-user-plus mr-2"></i>Crear Cuenta
                        </button>

                        <div class="text-center auth-links">
                            <p class="mb-2">¿Ya tienes cuenta?</p>
                            <a href="../vSesion/sesion.php" class="btn btn-outline-secondary btn-sm mb-2" style="width: 100%;">
                                <i class="fa fa-sign-in mr-1"></i>Inicia sesión aquí
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
            padding-bottom: 100px;
        }
    </style>