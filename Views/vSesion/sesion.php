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
                    <img src="../assets/images/logoInfinityTech.png"
                        alt="InfinityTech"
                        class="img-fluid"
                        style="width: 100%; height: auto; display: block; margin-bottom: 20px;">
                </div>



                <div class="login-card">
                    <form action="../../Controllers/cAutenticacion.php" method="POST" id="formLogin" novalidate>
                        <div class="form-group">
                            <label for="CorreoElectronico">Correo Electrónico</label>
                            <input type="email" class="form-control" id="CorreoElectronico" name="CorreoElectronico"
                                placeholder="Tu correo electrónico" required>
                        </div>

                        <div class="form-group">
                            <label for="Contrasenna">Contraseña</label>
                            <input type="password" class="form-control" id="Contrasenna" name="Contrasenna"
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
                        <?php if (isset($_GET["mensaje"]) && $_GET["mensaje"] === "cambio"): ?>
                            <div class="alert alert-success" role="alert" style="margin-top: 15px; margin-bottom: 15px;">
                                La contraseña se actualizó correctamente. Por favor, inicie sesión nuevamente.
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