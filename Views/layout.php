<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ==================== FUNCIÓN PARA MOSTRAR HEAD (META TAGS Y FAVICON) ====================
function MostrarHead()
{


    echo '
<head>
<title>InfinityTech</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="../assets/images/icons/favicon.png"/>
';
    MostrarCSS();
    echo '
</head>
';
}

// ==================== FUNCIÓN PARA MOSTRAR CSS ====================
function MostrarCSS()
{
    echo '
<link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/material-design-iconic-font.min.css">
<link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="../assets/vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="../assets/vendor/animsition/css/animsition.min.css">
<link rel="stylesheet" type="text/css" href="../assets/vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="../assets/vendor/daterangepicker/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="../assets/vendor/slick/slick.css">
<link rel="stylesheet" href="/Proyecto_Cliente-Servidor_Grupo05/assets/css/auth.css">
<link rel="stylesheet" type="text/css" href="../assets/css/util.css">
<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
';
}

// ==================== FUNCIÓN PARA MOSTRAR HEADER (NAVBAR) ====================
function MostrarHeader()
{
    // Verificar si hay sesión activa
    $nombreUsuario = "";
    $haySession = isset($_SESSION["NombreUsuario"]);
    if ($haySession) {
        $nombreUsuario = $_SESSION["NombreUsuario"];
    }

    echo '
<header class="header-v4">
    <!-- Header desktop -->
    <div class="container-menu-desktop">

        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">

                <div class="left-top-bar">
                    InfinityTech - Tecnología para todos
                </div>

                <div class="right-top-bar flex-w h-full">';


    if ($haySession) {
        echo '
                    <span class="flex-c-m trans-04 p-lr-25">
                        Bienvenido, ' . htmlspecialchars($nombreUsuario) . '
                    </span>
                    <a href="../vSeguridad/cambiarPerfil.php" class="flex-c-m trans-04 p-lr-25">
                        Perfil
                    </a>
                    <a href="../vSeguridad/cambiarAcceso.php" class="flex-c-m trans-04 p-lr-25">
                        Seguridad
                    </a>
                    <a href="#0" onclick="CerrarSesion()" class="flex-c-m trans-04 p-lr-25">
                        Cerrar Sesión
                    </a>';
    } else {
        echo '
                    <a href="../vSesion/sesion.php" class="flex-c-m trans-04 p-lr-25">
                        Iniciar Sesión
                    </a>
                    <a href="../vRegistro/registro.php" class="flex-c-m trans-04 p-lr-25">
                        Registrarse
                    </a>';
    }

    echo '
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo -->
                <a href="../vInicio/Inicio.php" class="logo">
                    <img src="../assets/images/icons/logoInfinityTech-01.png" alt="IMG-LOGO">
                </a>

                <!-- Menu -->
                <div class="menu-desktop">
                    <ul class="main-menu">

                        <li class="active-menu">
                            <a href="../vInicio/Inicio.php">Inicio</a>
                        </li>

                        <li>
                            <a href="../vProductos/consultarProductos.php">Productos</a>
                        </li>

                        <li>
                            <a href="../vInicio/acercaDe.php">Acerca de</a>
                        </li>

                        <li>
                            <a href="../vInicio/contacto.php">Contacto</a>
                        </li>

                    </ul>
                </div>

                <!-- Iconos -->
                <div class="wrap-icon-header flex-w flex-r-m">

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>

                </div>

            </nav>
        </div>

    </div>

</header>
';
}

// ==================== FUNCIÓN PARA MOSTRAR FOOTER Y SCRIPTS ====================
function MostrarFooter()
{
    echo '
<!-- ================= FOOTER ================= -->
<footer class="bg3 p-t-75 p-b-32">
	<div class="container">
		<p class="stext-107 cl6 txt-center">
			Copyright &copy;
			<script>document.write(new Date().getFullYear());</script>
			InfinityTech. All rights reserved.
		</p>
	</div>
</footer>
';
    MostrarJS();
}

// ==================== FUNCIÓN PARA MOSTRAR JAVASCRIPT ====================
function MostrarJS()
{
    echo '
<!-- ================= JS ================= -->
<script src="../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="../assets/vendor/animsition/js/animsition.min.js"></script>
<script src="../assets/vendor/bootstrap/js/popper.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/select2/select2.min.js"></script>
<script src="../assets/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script src="../assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/vendor/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/2.3.7/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/banner.js"></script>
<script src="../assets/js/editarDatos.js"></script>

<!-- ================= VALIDACIONES ================= -->
<script src="../assets/funciones/login.js"></script>
<script src="../assets/funciones/registro.js"></script>
<script src="../assets/funciones/recuperarAcesso.js"></script>
<script src="../assets/funciones/resetContrasenna.js"></script>
<script src="../assets/funciones/cerrarSesion.js"></script>
<script src="../assets/funciones/consultarProductos.js"></script>
<script src="../assets/funciones/validacionesProductos.js"></script>
<script src="../assets/funciones/cambiarAcceso.js"></script>
<script src="../assets/funciones/cambiarPerfil.js"></script>
<script src="../assets/funciones/sweetalert-productos.js"></script>
</body>
</html>
';
}
