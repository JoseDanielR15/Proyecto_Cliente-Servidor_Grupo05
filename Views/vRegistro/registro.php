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
                    <img src="https://i.fbcd.co/products/resized/resized-750-500/e53c5e6b6b694566ebf50ee9e7d5f4f23381e1a7ee5170287d5a88f29e9f78f3.jpg"
                        class="img-fluid" alt="InfinityTech"
                        style="width: 100%; height: auto; display: block; margin-bottom: 20px;">
                </div>

                <div class="login-card">
                    <h3 class="text-center">
                        InfinityTech
                    </h3>

                    <h5 class="text-center">
                        Crear Cuenta
                    </h5>

                    <form action="../../Controllers/cAutenticacion.php" method="POST" novalidate>

                        <div class="form-group">
                            <label for="Identificacion">Identificación</label>
                            <input type="text" class="form-control" id="Identificacion" name="Identificacion"
                                placeholder="Tu número de identificación" required>
                        </div>

                        <div class="form-group">
                            <label for="Nombre">Nombre Completo</label>
                            <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Tu nombre"
                                required>
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

                        <?php if (!empty($_SESSION["Mensaje"])): ?>
                            <div class="alert alert-danger" role="alert" style="margin-top: 15px; margin-bottom: 15px;">
                                <?php
                                echo htmlspecialchars($_SESSION["Mensaje"]);
                                unset($_SESSION["Mensaje"]);
                                ?>
                            </div>
                        <?php endif; ?>

                        <button type="submit" name="btnRegistrar" class="btn btn-success" style="margin-top: 10px;">
                            <i class="fa fa-user-plus mr-2"></i>Crear Cuenta
                        </button>

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