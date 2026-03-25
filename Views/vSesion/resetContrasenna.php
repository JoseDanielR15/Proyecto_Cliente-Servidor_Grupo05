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
                    <img src="../assets/images/logoInfinityTech.png"
                        alt="InfinityTech"
                        class="img-fluid"
                        style="width: 100%; height: auto; display: block; margin-bottom: 20px;">
                </div>

                <div class="login-card">
                    <form action="../../Controllers/cAutenticacion.php" method="POST" id="formResetContrasenna" novalidate>
                        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token'] ?? ''); ?>">
                        <div class="form-group">
                            <label for="nuevaContrasenna">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="nuevaContrasenna" name="nuevaContrasenna"
                                placeholder="Ingresa tu nueva contraseña" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmarContrasenna">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="confirmarContrasenna" name="confirmarContrasenna"
                                placeholder="Confirma tu contraseña" required>
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
                            <button type="submit" name="btnResetContrasenna" class="btn btn-primary">
                                <i class="fa fa-key mr-2"></i>Actualizar Contraseña
                            </button>
                        </div>
                        <div class="text-center auth-links">
                            <p class="mb-2">¿Recuerdas tu contraseña?</p>
                            <a href="sesion.php" class="btn btn-outline-secondary btn-sm mb-2"
                                style="width: 100%;">
                                <i class="fa fa-sign-in mr-1"></i>Iniciar Sesión
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