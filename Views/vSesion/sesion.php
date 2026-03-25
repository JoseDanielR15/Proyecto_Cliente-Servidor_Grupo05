<?php
include_once "../layout.php";
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
                    <img src="https://i.fbcd.co/products/resized/resized-750-500/e53c5e6b6b694566ebf50ee9e7d5f4f23381e1a7ee5170287d5a88f29e9f78f3.jpg"
                        class="img-fluid" alt="InfinityTech"
                        style="width: 100%; height: auto; display: block; margin-bottom: 20px;">
                </div>
                <div class="login-card">
                    <form action="../../Controllers/cAutenticacion.php" method="POST" novalidate>
                        <div class="form-group">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo"
                                placeholder="tu@email.com" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Tu contraseña" required>
                        </div>
                        <?php if (!empty($_SESSION["Mensaje"])): ?>
                            <div class="alert alert-danger" role="alert" style="margin-top: 15px; margin-bottom: 15px;">
                                <?php
                                echo htmlspecialchars($_SESSION["Mensaje"]);
                                unset($_SESSION["Mensaje"]);
                                ?>
                            </div>
                        <?php endif; ?>
                        <div class="text-center">
                            <button type="submit" name="btnIniciarSesion" class="btn btn-primary">
                              <i class="fa fa-sign-in mr-2"></i>Iniciar Sesión
                            </button>
                        </div>
                        <div class="text-center auth-links">
                            <p class="mb-2">¿No tienes cuenta?</p>
                            <a href="../vRegistro/registro.php" class="btn btn-outline-secondary btn-sm mb-2"
                                style="width: 100%;">
                                <i class="fa fa-user-plus mr-1"></i>Regístrate aquí
                            </a>
                            <p class="mt-4 mb-3">¿Quieres saltarte este paso?</p>
                            <a href="../vInicio/Inicio.php" class="btn btn-success btn-lg"
                                style="width: 100%; font-weight: 700; padding: 12px 20px;">
                                <i class="fa fa-arrow-right mr-2"></i>Ir al Inicio
                            </a>
                        </div>
                        <div class="title text-center">
                            <div class="col-xxl-12 col-lg-12 col-md-12">
                                <div class="text-start text-md-end text-lg-start text-xxl-end mb-30" style="padding: 20px;">
                                    <a href="recuperarAcceso.php" class="hover-underline">
                                        Olvidó su contraseña?
                                    </a>
                                </div>
                            </div>
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