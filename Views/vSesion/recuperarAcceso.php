<?php
include_once "../layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Models/mUtilitario.php";
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
                    <form action="../../Controllers/cAutenticacion.php" method="POST" id="formRecuperarAcceso" novalidate>
                        <div class="form-group">
                            <label for="CorreoElectronico">Correo Electrónico</label>
                            <input type="email" class="form-control" id="CorreoElectronico" name="CorreoElectronico"
                                placeholder="tu@email.com" required>
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
                            <button type="submit" name="btnRecuperarAcceso" class="btn btn-primary">
                              
                            <i class="fa fa-envelope mr-2"></i>Enviar Correo de Recuperación
                            </button>
                        </div>
                        <div class="text-center auth-links">
                            <p class="mb-2">¿Recuerdas tu contraseña?</p>
                            <a href="sesion.php" class="btn btn-outline-secondary btn-sm mb-2"
                                style="width: 100%;">
                                <i class="fa fa-sign-in mr-1"></i>Iniciar Sesión
                            </a>
                            <p class="mt-4 mb-3">¿No tienes cuenta?</p>
                            <a href="../vRegistro/registro.php" class="btn btn-success btn-lg"
                                style="width: 100%; font-weight: 700; padding: 12px 20px;">
                                <i class="fa fa-user-plus mr-2"></i>Regístrate aquí
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