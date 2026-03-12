<?php

function MostrarHeader() { 

    echo '
    <head>
	<title>InfinityTech</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="../assets/images/icons/favicon.png"/>

	<link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    </head>

    <body class="animsition">

    <!-- ================= HEADER ================= -->
    <!-- Header -->
        <header class="header-v4">
            <!-- Header desktop -->
            <div class="container-menu-desktop">
                <!-- Topbar -->
                <div class="top-bar">
                    <div class="content-topbar flex-sb-m h-full container">
                        <div class="left-top-bar">
                            InfinityTech
                        </div>

                        <div class="right-top-bar flex-w h-full">
                            <a href="../Vsesion/sesion.php" class="flex-c-m trans-04 p-lr-25">
                                Inicio Sesion
                            </a>

                            <a href="../Vregistro/registro.php" class="flex-c-m trans-04 p-lr-25">
                                Registrar
                            </a>

                            <a href="#" class="flex-c-m trans-04 p-lr-25">
                                Temporal
                            </a>

                            <a href="#" class="flex-c-m trans-04 p-lr-25">
                                Temporal
                            </a>
                        </div>
                    </div>
                </div>

                <div class="wrap-menu-desktop how-shadow1">
                    <nav class="limiter-menu-desktop container">
                        
                        <!-- Logo desktop -->							
                            <img src="../assets/images/icons/logo-01.png" alt="InfinityTech">
                        </a>
                        <!-- Menu desktop -->
                        <div class="menu-desktop">
                            <ul class="main-menu">
                                <li>
                                    <a href="../Vinicio/inicio.php">Inicio</a>							
                                </li>

                                <li>
                                    <a href="product.html">Tienda</a>
                                </li>
                        
                                <li>
                                    <a href="about.html">Nosotros</a>
                                </li>

                                <li>
                                    <a href="contact.html">Contacto</a>
                                </li>
                            </ul>
                        </div>	

                        <!-- Icon header -->
                        <div class="wrap-icon-header flex-w flex-r-m">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                                <i class="zmdi zmdi-search"></i>
                            </div>

                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>

                            <a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                                <i class="zmdi zmdi-favorite-outline"></i>
                            </a>
                        </div>
                    </nav>
                </div>	
            </div>

            <!-- Modal Search -->
            <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
                <div class="container-search-header">
                    <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                        <img src="images/icons/icon-close2.png" alt="CLOSE">
                    </button>

                    <form class="wrap-search-header flex-w p-l-15">
                        <button class="flex-c-m trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        <input class="plh3" type="text" name="search" placeholder="Search...">
                    </form>
                </div>
            </div>
        </header>';

}

